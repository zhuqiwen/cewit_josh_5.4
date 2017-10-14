<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateCtMajorRequest;
use App\Http\Requests\UpdateCtMajorRequest;
use App\Repositories\CtMajorRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use App\Models\CtMajor;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class CtMajorController extends InfyOmBaseController
{
    /** @var  CtMajorRepository */
    private $ctMajorRepository;

    public function __construct(CtMajorRepository $ctMajorRepo)
    {
        $this->ctMajorRepository = $ctMajorRepo;
    }

    /**
     * Display a listing of the CtMajor.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {

        $this->ctMajorRepository->pushCriteria(new RequestCriteria($request));
        $ctMajors = $this->ctMajorRepository->paginate(20);
        return view('admin.ctMajors.index')
            ->with('ctMajors', $ctMajors);
    }

    /**
     * Show the form for creating a new CtMajor.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.ctMajors.create');
    }

    /**
     * Store a newly created CtMajor in storage.
     *
     * @param CreateCtMajorRequest $request
     *
     * @return Response
     */
    public function store(CreateCtMajorRequest $request)
    {
        $input = $request->all();

        $ctMajor = $this->ctMajorRepository->create($input);

        Flash::success('CtMajor saved successfully.');

        return redirect(route('admin.ctMajors.index'));
    }

    /**
     * Display the specified CtMajor.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $ctMajor = $this->ctMajorRepository->findWithoutFail($id);

        if (empty($ctMajor)) {
            Flash::error('CtMajor not found');

            return redirect(route('ctMajors.index'));
        }

        return view('admin.ctMajors.show')->with('ctMajor', $ctMajor);
    }

    /**
     * Show the form for editing the specified CtMajor.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $ctMajor = $this->ctMajorRepository->findWithoutFail($id);

        if (empty($ctMajor)) {
            Flash::error('CtMajor not found');

            return redirect(route('ctMajors.index'));
        }

        return view('admin.ctMajors.edit')->with('ctMajor', $ctMajor);
    }

    /**
     * Update the specified CtMajor in storage.
     *
     * @param  int              $id
     * @param UpdateCtMajorRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCtMajorRequest $request)
    {
        $ctMajor = $this->ctMajorRepository->findWithoutFail($id);



        if (empty($ctMajor)) {
            Flash::error('CtMajor not found');

            return redirect(route('ctMajors.index'));
        }

        $ctMajor = $this->ctMajorRepository->update($request->all(), $id);

        Flash::success('CtMajor updated successfully.');

        return redirect(route('admin.ctMajors.index'));
    }

    /**
     * Remove the specified CtMajor from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
      public function getModalDelete($id = null)
      {
          $error = '';
          $model = '';
          $confirm_route =  route('admin.ctMajors.delete',['id'=>$id]);
          return View('admin.layouts/modal_confirmation', compact('error','model', 'confirm_route'));

      }

       public function getDelete($id = null)
       {
           $sample = CtMajor::destroy($id);

           // Redirect to the group management page
           return redirect(route('admin.ctMajors.index'))->with('success', Lang::get('message.success.delete'));

       }


	public function filter(Request $request)
	{
		$query = CtMajor::query();

		//contact relationship
		if($request->has('major'))
		{
			$query->where('major', 'LIKE', '%'. $request->major .'%');

		}

		if($request->has('type'))
		{
			if($request->type == 'unknown')
			{
				$query->whereNull('type');
			}
			else
			{
				$query->where('type', $request->type);
			}
		}

		$ctMajors = $query->paginate(config('constants.records_per_page.default'));


		return view('admin.ctMajors.index')
			->with(compact('ctMajors'));

	}

}
