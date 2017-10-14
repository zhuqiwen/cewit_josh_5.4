<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateCtStudentRequest;
use App\Http\Requests\UpdateCtStudentRequest;
use App\Repositories\CtStudentRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Lang;
use App\Models\CtStudent;
use App\Models\CtContact;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Yajra\Datatables\Html\Builder;


class CtStudentController extends InfyOmBaseController
{
    /** @var  CtStudentRepository */
    private $ctStudentRepository;

    private $schools;
    private $academic_careers;
    private $academic_standings;
    private $ethnicities;



    public function __construct(CtStudentRepository $ctStudentRepo)
    {
        $this->ctStudentRepository = $ctStudentRepo;
        $this->schools = $this->getDistinct('CtStudent', 'school');
        $this->academic_careers = $this->getDistinct('CtStudent', 'academic_career');
        $this->academic_standings = $this->getDistinct('CtStudent', 'academic_standing');
        $this->ethnicities = $this->getDistinct('CtStudent', 'ethnicity');
    }

    /**
     * Display a listing of the CtStudent.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->ctStudentRepository->pushCriteria(new RequestCriteria($request));
//        $ctStudents = $this->ctStudentRepository->all();

        $ctStudents = $this->ctStudentRepository
	        ->with('contact')
	        ->paginate(config('constants.records_per_page.default'));

        return view('admin.ctStudents.index')
            ->with('ctStudents', $ctStudents)
            ->with('schools', $this->schools)
            ->with('academic_standings', $this->academic_standings)
            ->with('academic_careers', $this->academic_careers)
            ->with('ethnicities', $this->ethnicities);
    }

    /**
     * Show the form for creating a new CtStudent.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.ctStudents.create');
    }

    /**
     * Store a newly created CtStudent in storage.
     *
     * @param CreateCtStudentRequest $request
     *
     * @return Response
     */
    public function store(CreateCtStudentRequest $request)
    {
        $input = $request->all();

        $ctStudent = $this->ctStudentRepository->create($input);

        Flash::success('CtStudent saved successfully.');

        return redirect(route('admin.ctStudents.index'));
    }

    /**
     * Display the specified CtStudent.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $ctStudent = $this->ctStudentRepository->findWithoutFail($id);

        if (empty($ctStudent)) {
            Flash::error('CtStudent not found');

            return redirect(route('admin.ctStudents.index'));
        }

        return view('admin.ctStudents.show')->with('ctStudent', $ctStudent);
    }

    /**
     * Show the form for editing the specified CtStudent.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $ctStudent = $this->ctStudentRepository->findWithoutFail($id);

        if (empty($ctStudent)) {
            Flash::error('CtStudent not found');

            return redirect(route('admin.ctStudents.index'));
        }

        return view('admin.ctStudents.edit')->with('ctStudent', $ctStudent);
    }

    /**
     * Update the specified CtStudent in storage.
     *
     * @param  int              $id
     * @param UpdateCtStudentRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCtStudentRequest $request)
    {
        $ctStudent = $this->ctStudentRepository->findWithoutFail($id);



        if (empty($ctStudent)) {
            Flash::error('CtStudent not found');

            return redirect(route('admin.ctStudents.index'));
        }

        $ctStudent = $this->ctStudentRepository->update($request->all(), $id);

        Flash::success('CtStudent updated successfully.');

        return redirect(route('admin.ctStudents.index'));
    }

    /**
     * Remove the specified CtStudent from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
	public function getModalDelete($id = null)
    {
      $error = '';
      $model = '';
      $confirm_route =  route('admin.ctStudents.delete',['id'=>$id]);
      return View('admin.layouts/modal_confirmation', compact('error','model', 'confirm_route'));

    }

	public function getDelete($id = null)
    {
       $sample = CtStudent::destroy($id);

       // Redirect to the group management page
       return redirect(route('admin.ctStudents.index'))->with('success', Lang::get('message.success.delete'));

    }

    public function filter(Request $request)
    {
        $query = CtStudent::with('contact');

        //contact relationship
        if($request->has('first_name'))
        {
            $query->whereHas('contact', function ($q) use($request){
                return $q->where('first_name', 'LIKE', '%' . $request->first_name . '%');
            });
        }

        if($request->has('last_name'))
        {
            $query->whereHas('contact', function ($q) use($request){
                return $q->where('last_name', 'LIKE', '%' . $request->last_name . '%');
            });
        }

        if($request->has('gender'))
        {
            $query->whereHas('contact', function ($q) use($request){
                return $q->where('gender', 'LIKE', '%' . $request->gender . '%');
            });
        }

        if($request->has('email'))
        {
            $query->whereHas('contact', function ($q) use($request){
                return $q->where('email', 'LIKE', '%' . $request->email . '%');
            });
        }

        if($request->has('iu_username'))
        {
            $query->whereHas('contact', function ($q) use($request){
                return $q->where('iu_username', 'LIKE', '%' . $request->iu_username . '%');
            });
        }

        if($request->has('join_date'))
        {
            $query->whereHas('contact', function ($q) use($request){
                return $q->where('join_date', $request->join_date);
            });
        }

        //End contact relationship


        if($request->has('school'))
        {
            $query->where('school', 'like', $request->school);
        }

        if($request->has('ethnicity'))
        {
            $query->where('ethnicity', 'like', $request->ethnicity);

        }

        if($request->has('academic_career'))
        {
            $query->where('academic_career', 'like', $request->academic_career);

        }

        if($request->has('academic_standing'))
        {
            $query->where('academic_standing', 'like', $request->academic_standing);

        }

        // Major type
	    if($request->has('major_type'))
	    {
		    if($request->major_type == 'stem')
		    {
			    $operand = '=';
		    }
		    else
		    {
			    $operand = '<>';
		    }

		    $query->whereHas('majors', function($q) use($operand){
			    return $q->where('type', $operand, 'stem' );
		    });

	    }



	    $ctstudents = $query->paginate(config('constants.records_per_page.default'));
        return view('admin.ctStudents.index')
            ->with('ctStudents', $ctstudents)
            ->with('schools', $this->schools)
            ->with('academic_standings', $this->academic_standings)
            ->with('academic_careers', $this->academic_careers)
            ->with('ethnicities', $this->ethnicities);

    }





    /**
    * helpers
    */

    /**
     * @param string $model, string $field
     * @return array
     */
    private function getDistinct($model, $field)
    {
        $model = 'App\Models'.'\\'.$model;
        $model = new $model();
        $objs = $model->select($field)->distinct()->orderBy($field, 'asc')->get()->toArray();
        $results = [];
        foreach ($objs as $obj)
        {
            $results[$obj[$field]] = $obj[$field];
        }
        return $results;
    }



}
