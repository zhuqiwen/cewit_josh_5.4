<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateCtStudentMajorRequest;
use App\Http\Requests\UpdateCtStudentMajorRequest;
use App\Repositories\CtStudentMajorRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use App\Models\CtStudentMajor;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class CtStudentMajorController extends InfyOmBaseController
{
    /** @var  CtStudentMajorRepository */
    private $ctStudentMajorRepository;

    public function __construct(CtStudentMajorRepository $ctStudentMajorRepo)
    {
        $this->ctStudentMajorRepository = $ctStudentMajorRepo;
    }

    /**
     * Display a listing of the CtStudentMajor.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {

        $this->ctStudentMajorRepository->pushCriteria(new RequestCriteria($request));
        $ctStudentMajors = $this->ctStudentMajorRepository->all();
        return view('admin.ctStudentMajors.index')
            ->with('ctStudentMajors', $ctStudentMajors);
    }

    /**
     * Show the form for creating a new CtStudentMajor.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.ctStudentMajors.create');
    }

    /**
     * Store a newly created CtStudentMajor in storage.
     *
     * @param CreateCtStudentMajorRequest $request
     *
     * @return Response
     */
    public function store(CreateCtStudentMajorRequest $request)
    {
        $input = $request->all();

        $ctStudentMajor = $this->ctStudentMajorRepository->create($input);

        Flash::success('CtStudentMajor saved successfully.');

        return redirect(route('admin.ctStudentMajors.index'));
    }

    /**
     * Display the specified CtStudentMajor.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $ctStudentMajor = $this->ctStudentMajorRepository->findWithoutFail($id);

        if (empty($ctStudentMajor)) {
            Flash::error('CtStudentMajor not found');

            return redirect(route('ctStudentMajors.index'));
        }

        return view('admin.ctStudentMajors.show')->with('ctStudentMajor', $ctStudentMajor);
    }

    /**
     * Show the form for editing the specified CtStudentMajor.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $ctStudentMajor = $this->ctStudentMajorRepository->findWithoutFail($id);

        if (empty($ctStudentMajor)) {
            Flash::error('CtStudentMajor not found');

            return redirect(route('ctStudentMajors.index'));
        }

        return view('admin.ctStudentMajors.edit')->with('ctStudentMajor', $ctStudentMajor);
    }

    /**
     * Update the specified CtStudentMajor in storage.
     *
     * @param  int              $id
     * @param UpdateCtStudentMajorRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCtStudentMajorRequest $request)
    {
        $ctStudentMajor = $this->ctStudentMajorRepository->findWithoutFail($id);

        

        if (empty($ctStudentMajor)) {
            Flash::error('CtStudentMajor not found');

            return redirect(route('ctStudentMajors.index'));
        }

        $ctStudentMajor = $this->ctStudentMajorRepository->update($request->all(), $id);

        Flash::success('CtStudentMajor updated successfully.');

        return redirect(route('admin.ctStudentMajors.index'));
    }

    /**
     * Remove the specified CtStudentMajor from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
      public function getModalDelete($id = null)
      {
          $error = '';
          $model = '';
          $confirm_route =  route('admin.ctStudentMajors.delete',['id'=>$id]);
          return View('admin.layouts/modal_confirmation', compact('error','model', 'confirm_route'));

      }

       public function getDelete($id = null)
       {
           $sample = CtStudentMajor::destroy($id);

           // Redirect to the group management page
           return redirect(route('admin.ctStudentMajors.index'))->with('success', Lang::get('message.success.delete'));

       }

}
