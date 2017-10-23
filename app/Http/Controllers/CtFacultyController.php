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
use Maatwebsite\Excel\Facades\Excel;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class CtFacultyController extends InfyOmBaseController
{
    /** @var  CtFacultyRepository */
    private $ctFacultyRepository;
    private $ranks;
    private $administrative_titles;
    private $schools;
    private $departments;

    public function __construct(CtFacultyRepository $ctFacultyRepo)
    {
        $this->ctFacultyRepository = $ctFacultyRepo;
        $this->schools = $this->getDistinct('CtFaculty', 'school');
        $this->ranks = $this->getDistinct('CtFaculty', 'rank');
        $this->departments = $this->getDistinct('CtFaculty', 'department');
        $this->administrative_titles = $this->getDistinct('CtFaculty', 'administrative_title');

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

        $ctFaculties = $this->ctFacultyRepository
            ->with('contact')
            ->paginate(config('constants.records_per_page.default'));

        return view('admin.ctFaculties.index')
            ->with('ctFaculties', $ctFaculties)
            ->with('schools', $this->schools)
            ->with('ranks', $this->ranks)
            ->with('departments', $this->departments)
            ->with('administrative_titles', $this->administrative_titles);
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


    /**
     * @param Request $request
     * @return mixed
     */
    public function filter(Request $request)
    {
        $query = $this->getFilterQuery($request);

        $ctFaculties = $query->paginate(config('constants.records_per_page.default'));


        return view('admin.ctFaculties.index')
            ->with('ctFaculties', $ctFaculties)
            ->with('schools', $this->schools)
            ->with('ranks', $this->ranks)
            ->with('departments', $this->departments)
            ->with('administrative_titles', $this->administrative_titles);

    }


    /**
     *
     * @param Request $request
     * @return \Illuminate\Database\Eloquent\Builder|static
     */
    private function getFilterQuery(Request $request)
    {
        $query = CtFaculty::with('contact');

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

            if($request->has('rank'))
            {
                $query->where('rank', 'like', $request->rank);

            }

            if($request->has('administrative_title'))
            {
                $query->where('administrative_title', 'like', $request->administrative_title);

            }

            if($request->has('department'))
            {
                $query->where('department', 'like', $request->department);

            }

            if($request->has('stem'))
            {
                if($request->stem == 'unknown')
                {
                    $query->whereNull('stem');

                }
                else
                {
                    $query->where('stem', 'like', $request->stem);

                }

            }
        }


        return $query;
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
