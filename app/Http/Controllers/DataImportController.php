<?php

namespace App\Http\Controllers;

use App\Models\CtContact;
use App\Models\CtStudent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
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
				$this->importStudents($file);
                Flash::success('Data imported successfully');
                return redirect(route('admin.ctStudents.index'));

            }
		}
		else
		{
			Flash::error('Only csv file is supported');
			return redirect(route('admin.dataImport'));
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
	    $contact_importer = new CtContact();
	    $student_importer = new CtStudent();

		$excel = App::make('excel');
		$excel->load($csv_file, function($reader){

		    foreach($reader->toArray() as $row)
            {
                $contact = new CtContact();
                $student = new CtStudent();
                foreach ($contact->import_fields as $field)
                {
                    $contact[$field] = $row[$field];
                }

                $contact->save();

                $student->contact_id = $contact->id;

                foreach ($student->import_fields as $field)
                {
                    $student[$field] = $row[$field];
                }

                $student->save();
            }

		});

	}
}
