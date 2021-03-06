<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateCtStudentRequest;
use App\Http\Requests\UpdateCtStudentRequest;
use App\Repositories\CtContactRepository;
use App\Repositories\CtStudentRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Lang;
use App\Models\CtStudent;
use App\Models\CtContact;
use Flash;
use Maatwebsite\Excel\Facades\Excel;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Yajra\Datatables\Html\Builder;


class CtStudentController extends InfyOmBaseController
{
    /** @var  CtStudentRepository */
    private $ctStudentRepository;
    private $ctContactRepository;

    private $schools;
    private $academic_careers;
    private $academic_standings;
    private $ethnicities;



    public function __construct(CtStudentRepository $ctStudentRepo, CtContactRepository $ctContactRepo)
    {
        $this->ctStudentRepository = $ctStudentRepo;
        $this->ctContactRepository = $ctContactRepo;
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
        return view('admin.ctStudents.create')
            ->with('schools', $this->schools)
            ->with('academic_standings', $this->academic_standings)
            ->with('academic_careers', $this->academic_careers)
            ->with('ethnicities', $this->ethnicities);
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

        $contact_data = $input['contact'];

        $ctContact = $this->ctContactRepository->create($contact_data);
        $input['contact_id'] = $ctContact->id;
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
        $ctStudent = $this->ctStudentRepository
            ->with('contact')
            ->findWithoutFail($id);

        if (empty($ctStudent)) {
            Flash::error('CtStudent not found');

            return redirect(route('admin.ctStudents.index'));
        }

        return view('admin.ctStudents.edit')
            ->with('ctStudent', $ctStudent)
            ->with('schools', $this->schools)
            ->with('academic_standings', $this->academic_standings)
            ->with('academic_careers', $this->academic_careers)
            ->with('ethnicities', $this->ethnicities);
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
        $ctStudent = $this->ctStudentRepository
            ->with('contact')
            ->findWithoutFail($id);

        if (empty($ctStudent)) {
            Flash::error('CtStudent not found');

            return redirect(route('admin.ctStudents.index'));
        }

        $contact_data = $request->input('contact');
        $ctContact = $this->ctContactRepository->update($contact_data, $ctStudent->contact->id);
        $ctStudent = $this->ctStudentRepository->update($request->all(), $id);

        $contact_name = $ctContact->first_name . ' ' . $ctContact->last_name;
        Flash::success($contact_name . ' updated successfully.');

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

	/**
	 * @param Request $request
	 * @return $this
	 */
    public function filter(Request $request)
    {
	    $query = $this->getFilterQuery($request);



	    $ctstudents = $query->paginate(config('constants.records_per_page.default'));
        return view('admin.ctStudents.index')
            ->with('ctStudents', $ctstudents)
            ->with('schools', $this->schools)
            ->with('academic_standings', $this->academic_standings)
            ->with('academic_careers', $this->academic_careers)
            ->with('ethnicities', $this->ethnicities);
    }

    /**
     * @param Request $request
     * @param string $export_type
     */
	public function export(Request $request, $export_type = 'csv')
	{
		$result = $this->getFilteredData($request);

		$result = $result->toArray();
		$data = [];
		$excludes = [
			'id',
			'contact_id',
			'created_at',
			'updated_at',
			'deleted_at',
			'contact.id',
			'contact.created_at',
			'contact.updated_at',
			'contact.deleted_at',
			'contact.is_test',
			'contact.is_active',
			'contact.is_affiliate',
		];
		foreach ($result as $value)
		{
			$value = collect($value)
				->except($excludes)
				->toArray();
			$data[] = $this->flattenAndKeepKeys('', $value);
		}

        $filename = str_replace('App\Http\Controllers\Ct', 'CEWiT_',static::class);
        $filename = str_replace('Controller', '', $filename);
        $filename = date('Y-m-d') . '_' . $filename;
        foreach($request->except('_token') as $key => $value)
        {
            if($value)
            {
                $filename .= '_' . $key . '_' . $value;
            }
        }
		Excel::create($filename, function($excel) use ($data, $request){

			$excel->sheet('exported', function($sheet) use ($data, $request){

				$sheet->fromArray($data);

			});

		})->download($export_type);

	}

	/**
	 * @param Request $request
	 * @return array
	 */
	public function getFilteredData(Request $request)
	{
		//sqlite has max variable limit set to 999
		//if no input value, need to chunk query

		$query = $this->getFilterQuery($request);

		$result = [];
		$query->chunk(50, function($records) use (&$result){
			foreach($records as $record)
			{
				$result[] = $record;
			}
		});

		return collect($result);

    }


	/**
	 * @param Request $request
	 * @return \Illuminate\Database\Eloquent\Builder|static
	 */
	private function getFilterQuery(Request $request)
	{
		$query = CtStudent::with('contact');

		if(!array_filter($request->all()))
		{
			return $query;
		}

		if($request->all() != [])
		{
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
					if($request->gender == 'unknown')
					{
						return $q->whereNull('gender');
					}

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
		}


		return $query;
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


	/**
	 * flatten multi dimension array and keep keys
	 * @param $prefix
	 * @param $array
	 * @return array
	 */
	private function flattenAndKeepKeys($prefix, $array)
	{
		$result = [];
		foreach ($array as $key => $value)
		{
			if (is_array($value))
				$result = array_merge($result, $this->flattenAndKeepKeys($prefix . $key . '_', $value));
			else
				$result[$prefix . $key] = $value;
		}
		return $result;

    }

}
