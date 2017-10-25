<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateCtContactRequest;
use App\Http\Requests\UpdateCtContactRequest;
use App\Repositories\CtContactRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use App\Models\CtContact;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class CtContactController extends InfyOmBaseController
{
    /** @var  CtContactRepository */
    private $ctContactRepository;

    public function __construct(CtContactRepository $ctContactRepo)
    {
        $this->ctContactRepository = $ctContactRepo;
    }

    /**
     * Display a listing of the CtContact.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {

        $this->ctContactRepository->pushCriteria(new RequestCriteria($request));
        $ctContacts = $this->ctContactRepository->all();
        return view('admin.ctContacts.index')
            ->with('ctContacts', $ctContacts);
    }

    /**
     * Show the form for creating a new CtContact.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.ctContacts.create');
    }

    /**
     * Store a newly created CtContact in storage.
     *
     * @param CreateCtContactRequest $request
     *
     * @return Response
     */
    public function store(CreateCtContactRequest $request)
    {
        $input = $request->all();

        $ctContact = $this->ctContactRepository->create($input);


        Flash::success('CtContact saved successfully.');

        return redirect(route('admin.ctContacts.index'));
    }

    /**
     * Display the specified CtContact.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $ctContact = $this->ctContactRepository->findWithoutFail($id);

        if (empty($ctContact)) {
            Flash::error('CtContact not found');

            return redirect(route('ctContacts.index'));
        }

        return view('admin.ctContacts.show')->with('ctContact', $ctContact);
    }

    /**
     * Show the form for editing the specified CtContact.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $ctContact = $this->ctContactRepository->findWithoutFail($id);

        if (empty($ctContact)) {
            Flash::error('CtContact not found');

            return redirect(route('ctContacts.index'));
        }

        return view('admin.ctContacts.edit')->with('ctContact', $ctContact);
    }

    /**
     * Update the specified CtContact in storage.
     *
     * @param  int              $id
     * @param UpdateCtContactRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCtContactRequest $request)
    {
        $ctContact = $this->ctContactRepository->findWithoutFail($id);

        
                        if($request->has('is_test')){
	                    $request->merge(['is_test' => 1]);
	                    }
                        else{
                        $request->merge(['is_test' => 0]);
                         }

        if (empty($ctContact)) {
            Flash::error('CtContact not found');

            return redirect(route('ctContacts.index'));
        }

        $ctContact = $this->ctContactRepository->update($request->all(), $id);

        Flash::success('CtContact updated successfully.');

        return redirect(route('admin.ctContacts.index'));
    }

    /**
     * Remove the specified CtContact from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
      public function getModalDelete($id = null)
      {
          $error = '';
          $model = '';
          $confirm_route =  route('admin.ctContacts.delete',['id'=>$id]);
          return View('admin.layouts/modal_confirmation', compact('error','model', 'confirm_route'));

      }

       public function getDelete($id = null)
       {
           $sample = CtContact::destroy($id);

           // Redirect to the group management page
           return redirect(route('admin.ctContacts.index'))->with('success', Lang::get('message.success.delete'));

       }

}
