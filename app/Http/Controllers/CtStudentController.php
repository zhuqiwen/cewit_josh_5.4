<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateCtStudentRequest;
use App\Http\Requests\UpdateCtStudentRequest;
use App\Repositories\CtStudentRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use App\Models\CtStudent;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;


class CtStudentController extends InfyOmBaseController
{
    /** @var  CtStudentRepository */
    private $ctStudentRepository;

    public function __construct(CtStudentRepository $ctStudentRepo)
    {
        $this->ctStudentRepository = $ctStudentRepo;
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
        $ctStudents = $this->ctStudentRepository->paginate(20);
        return view('admin.ctStudents.index')
            ->with('ctStudents', $ctStudents);
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

            return redirect(route('ctStudents.index'));
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

            return redirect(route('ctStudents.index'));
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

            return redirect(route('ctStudents.index'));
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

}
