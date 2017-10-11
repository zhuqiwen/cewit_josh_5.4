<?php

namespace App\Http\Controllers;

use App\Models\CtContact;
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
		return view('admin.dataImport.index');
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

	private function importStudents($csv_file)
	{

		$excel = App::make('excel');
		$excel->filter('chunk')->load($csv_file)->chunk(100, function($reader){

		    DB::beginTransaction();
		    try
            {
                foreach($reader->toArray() as $row)
                {
                    $this->importOneStudent($row);
                }

                DB::commit();
                $success = true;
            }
            catch (\Exception $e)
            {
                $success = false;
                DB::rollback();
            }

            if($success)
            {
                return true;
            }

            return false;


		});

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

        if($contact->where('iu_username', $row['iu_username'])->count() == 0)
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

            $contact = $contact->create($contact_data);


            $student_data = [
                "contact_id" => $contact->id,
                "school" => $row['school'],
                "academic_career" => $row['academic_career'],
                "academic_standing" => $row['academic_standing'],
                "ethnicity" => $row['ethnicity'],
            ];

            $student = $student->create($student_data);

        }
    }
}
