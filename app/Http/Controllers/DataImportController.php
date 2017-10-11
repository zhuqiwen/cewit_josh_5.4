<?php

namespace App\Http\Controllers;

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
		$excel = App::make('excel');
		$excel->load($csv_file, function($reader){

			dd($reader->toArray());
		});

	}
}
