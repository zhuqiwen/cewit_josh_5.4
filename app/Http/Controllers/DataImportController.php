<?php

namespace App\Http\Controllers;

use App\Models\CtContact;
use App\Models\CtFaculty;
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
	    $num_faculty = CtFaculty::count();
		return view('admin.dataImport.index')
            ->with(compact('num_majors', 'num_students', 'num_faculty'));
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
            elseif ($request->category == 'faculty')
            {
                $success = $this->importFaculty($file);

                if($success)
                {
                    Flash::success('Data imported successfully');
                    return redirect(route('admin.ctFaculties.index'));
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
		$excel->filter('chunk')->load($csv_file)->chunk(25, function($reader) use (&$success, &$cnt){

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
        $excel->filter('chunk')->load($csv_file)->chunk(25, function($reader) use (&$success){

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


    private function importFaculty($csv_file)
    {
        $excel = App::make('excel');
        $success = TRUE;
        $excel->filter('chunk')->load($csv_file)->chunk(25, function($reader) use (&$success){

            DB::beginTransaction();
            try
            {
                foreach($reader->toArray() as $row)
                {
                    $this->importOneFaculty($row);
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


        $contact = $contact->where('iu_username', 'LIKE', strtolower($row['iu_username']))->first();

        if(!$contact)
        {
            $contact_data = [
                "first_name" => $row['first_name'],
                "last_name" => $row['last_name'],
                "email" => $row['email'],
                "iu_username" => $row['iu_username'],
                "gender" => $row['gender'],
                "join_date" => '2017-06-21',
                "is_active" => true,
                "is_affiliate" => true,
                "is_test" => false,
            ];

            $contact = CtContact::create($contact_data);
        }

        $student = $student->where('contact_id', $contact->id)->first();

        if(!$student)
        {
            $student_data = [
                "contact_id" => $contact->id,
                "school" => $row['school'],
                "academic_career" => $row['academic_career'],
                "academic_standing" => $row['academic_standing'],
                "ethnicity" => $row['ethnicity'],
            ];

            $student = CtStudent::create($student_data);
        }

        foreach ($majors_array as $value)
        {
            $major = CtMajor::where('major', 'LIKE', strtolower($value))->first();

            if(!$major)
            {
                //insert new major
                $major = CtMajor::create([
                    'major' => $value,
                ]);

            }
            $student->majors()->attach($major->id);


        }
    }


    private function importOneMajor($row = [])
    {
        $major = new CtMajor();

        $major = $major->where('major', 'LIKE', strtolower($row['major']))->first();

        if(!$major)
        {
            $data = [
                'major' => strtolower($row['major']),
                'type' => strtolower($row['type']),
            ];

            $major = CtMajor::create($data);
        }

    }


    private function importOneFaculty($row = [])
    {
        $contact = new CtContact();
        $faculty = new CtFaculty();


        $contact = $contact->where('iu_username', 'LIKE', strtolower($row['iu_username']))->first();

        if(!$contact)
        {
            $contact_data = [
                "first_name" => $row['first_name'],
                "last_name" => $row['last_name'],
                "email" => $row['email'],
                "iu_username" => $row['iu_username'],
                "gender" => $row['gender'],
                "join_date" => $row['join_date'],
                "is_active" => true,
                "is_affiliate" => true,
                "is_test" => false,
            ];

            $contact = CtContact::create($contact_data);
        }

        $faculty = $faculty->where('contact_id', $contact->id)->first();

        if(!$faculty)
        {
            $faculty_data = [
                "contact_id" => $contact->id,
                "rank" => $row['rank'],
                "administrative_title" => $row['administrative_title'],
                "school" => $row['school'],
                "school_code" => $row['school_code'],
                "department" => $row['department'],
                "department_code" => $row['department_code'],
                "campus_code" => $row['campus_code'],
                "stem" => $row['stem'],
                "campus_phone" => $row['campus_phone'],
            ];
            $faculty = CtFaculty::create($faculty_data);
        }

        unset($contact);
        unset($faculty);
    }
}
