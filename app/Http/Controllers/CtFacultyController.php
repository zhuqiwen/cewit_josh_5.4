<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateCtFacultyRequest;
use App\Http\Requests\UpdateCtFacultyRequest;
use App\Repositories\CtFacultyRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use App\Models\CtFaculty;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class CtFacultyController extends InfyOmBaseController
{
    /** @var  CtFacultyRepository */
    private $ctFacultyRepository;

    public function __construct(CtFacultyRepository $ctFacultyRepo)
    {
        $this->ctFacultyRepository = $ctFacultyRepo;
    }

    /**
     * Display a listing of the CtFaculty.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {

        $this->ctFacultyRepository->pushCriteria(new RequestCriteria($request));
        $ctFaculties = $this->ctFacultyRepository->all();
        return view('admin.ctFaculties.index')
            ->with('ctFaculties', $ctFaculties);
    }

    /**
     * Show the form for creating a new CtFaculty.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.ctFaculties.create');
    }

    /**
     * Store a newly created CtFaculty in storage.
     *
     * @param CreateCtFacultyRequest $request
     *
     * @return Response
     */
    public function store(CreateCtFacultyRequest $request)
    {
        $input = $request->all();

        $ctFaculty = $this->ctFacultyRepository->create($input);

        Flash::success('CtFaculty saved successfully.');

        return redirect(route('admin.ctFaculties.index'));
    }

    /**
     * Display the specified CtFaculty.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $ctFaculty = $this->ctFacultyRepository->findWithoutFail($id);

        if (empty($ctFaculty)) {
            Flash::error('CtFaculty not found');

            return redirect(route('ctFaculties.index'));
        }

        return view('admin.ctFaculties.show')->with('ctFaculty', $ctFaculty);
    }

    /**
     * Show the form for editing the specified CtFaculty.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $ctFaculty = $this->ctFacultyRepository->findWithoutFail($id);

        if (empty($ctFaculty)) {
            Flash::error('CtFaculty not found');

            return redirect(route('ctFaculties.index'));
        }

        return view('admin.ctFaculties.edit')->with('ctFaculty', $ctFaculty);
    }

    /**
     * Update the specified CtFaculty in storage.
     *
     * @param  int              $id
     * @param UpdateCtFacultyRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCtFacultyRequest $request)
    {
        $ctFaculty = $this->ctFacultyRepository->findWithoutFail($id);

        

        if (empty($ctFaculty)) {
            Flash::error('CtFaculty not found');

            return redirect(route('ctFaculties.index'));
        }

        $ctFaculty = $this->ctFacultyRepository->update($request->all(), $id);

        Flash::success('CtFaculty updated successfully.');

        return redirect(route('admin.ctFaculties.index'));
    }

    /**
     * Remove the specified CtFaculty from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
      public function getModalDelete($id = null)
      {
          $error = '';
          $model = '';
          $confirm_route =  route('admin.ctFaculties.delete',['id'=>$id]);
          return View('admin.layouts/modal_confirmation', compact('error','model', 'confirm_route'));

      }

       public function getDelete($id = null)
       {
           $sample = CtFaculty::destroy($id);

           // Redirect to the group management page
           return redirect(route('admin.ctFaculties.index'))->with('success', Lang::get('message.success.delete'));

       }

}
