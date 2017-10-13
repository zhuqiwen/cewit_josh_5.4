<?php

namespace App\Http\Controllers;

use App\Models\CtContact;
use App\Models\CtMajor;
use App\Models\CtStudent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Laracasts\Flash\Flash;

class DataImportController extends Controller
{
    //
	public function index()
	{
	    $num_majors = CtMajor::count();
	    $num_students = CtStudent::count();
		return view('admin.dataImport.index')
            ->with(compact('num_majors', 'num_students'));
	}


	public function import(Request $request)
	{

		$file = $request->file('data-file')->getRealPath();
		$correct_format = $this->checkFormat($file);

		if($correct_format)
		{
			if($request->category == 'student')
			{
				$success = $this->importStudents($file);

				if($success)
                {
                    Flash::success('Data imported successfully');
                    return redirect(route('admin.ctStudents.index'));
                }
                else
                {
                    Flash::error('Data not imported for some reason; please try again later');
                    return redirect(route('admin.dataImport.index'));
                }

            }
            elseif ($request->category == 'major')
            {
                $success = $this->importMajors($file);

                if($success)
                {
                    Flash::success('Data imported successfully');
                    return redirect(route('admin.ctMajors.index'));
                }
                else
                {
                    Flash::error('Data not imported for some reason; please try again later');
                    return redirect(route('admin.dataImport.index'));
                }

            }
		}
		else
		{
			Flash::error('Only csv file is supported');
			return redirect(route('admin.dataImport.index'));
		}

	}

	private function checkFormat($file)
	{
		return TRUE;
	}





	/**
	 * importers
	 */

    /**
     * @param string $csv_file: path to file
     * @return bool
     */
	private function importStudents($csv_file)
	{

		$excel = App::make('excel');
		$success = TRUE;
		$cnt = 0;
		$excel->filter('chunk')->load($csv_file)->chunk(50, function($reader) use (&$success, &$cnt){

		    DB::beginTransaction();
		    try
            {
                foreach($reader->toArray() as $row)
                {
                    $this->importOneStudent($row);
                }

                DB::commit();
            }
            catch (\Exception $e)
            {
	            dd($e);
                DB::rollback();
	            $success = FALSE;
            }
		});

		return $success;

	}

    /**
     * @param string $csv_file: path to file
     * @return bool
     */
	private function importMajors($csv_file)
    {
        $excel = App::make('excel');
        $success = TRUE;
        $excel->filter('chunk')->load($csv_file)->chunk(100, function($reader) use (&$success){

            DB::beginTransaction();
            try
            {
                foreach($reader->toArray() as $row)
                {
                    $this->importOneMajor($row);
                }

                DB::commit();
            }
            catch (\Exception $e)
            {
                dd($e);
                DB::rollback();
                $success = FALSE;
            }
        });

        return $success;
    }


	/**
     * helpers
     */

    /**
     * @param array $row
     */
	private function importOneStudent($row = [])
    {
        $contact = new CtContact();
        $student = new CtStudent();
        $majors_array = [];
        for($i = 0; $i < 3; $i++)
        {
            $n = $i + 1;
            if($row['major'.$n])
            {
                $majors_array[] = strtolower($row['major'.$n]);
            }
        }



        if($contact->where('iu_username', strtolower($row['iu_username']))->count() == 0)
        {

            $contact_data = [
                "first_name" => strtolower($row['first_name']),
                "last_name" => strtolower($row['last_name']),
                "email" => strtolower($row['email']),
                "iu_username" => strtolower($row['iu_username']),
                "gender" => strtolower($row['gender']),
                "join_date" => '2017-06-21',
                "is_active" => true,
                "is_affiliate" => true,
                "is_test" => false,
            ];

            $contact = $contact->create($contact_data);

            $student_data = [
                "contact_id" => $contact->id,
                "school" => strtolower($row['school']),
                "academic_career" => strtolower($row['academic_career']),
                "academic_standing" => strtolower($row['academic_standing']),
                "ethnicity" => strtolower($row['ethnicity']),
            ];

            $student = $student->create($student_data);

            foreach ($majors_array as $value)
            {
                $major = CtMajor::where('major', strtolower($value))->first();

                if(!$major)
                {
                    //insert new major
                    $major = CtMajor::create([
                        'major' => strtolower($value),
                    ]);

                }
                $student->majors()->attach($major->id);


            }


        }
    }


    private function importOneMajor($row = [])
    {
        $major = new CtMajor();

        if($major->where('major', strtolower($row['major']))->count() == 0)
        {
            $data = [
                'major' => strtolower($row['major']),
                'type' => strtolower($row['type']),
            ];

            $major->create($data);
        }
    }
}
