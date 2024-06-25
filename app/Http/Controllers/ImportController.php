<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UsersAndVehiclesImport;
use Illuminate\Support\Facades\Mail;
use App\Mail\ImportResultMail;

class ImportController extends Controller
{
    public function importExcel(Request $request)
    {
        $request->validate([
            'excel_file' => 'required|file|mimes:xlsx,xls',
        ]);

        try {
            Excel::import(new UsersAndVehiclesImport, $request->file('excel_file'));

            // Send success email
            Mail::to('bastian.vivar@sansano.usm.cl')->send(new ImportResultMail('Success', 'The import was successful.'));

            return redirect()->back()->with('success', 'The import was successful.');
        } catch (\Exception $e) {
            // Send failure email
            Mail::to('bastian.vivar@sansano.usm.cl')->send(new ImportResultMail('Failure', $e->getMessage()));

            return redirect()->back()->with('error', 'There was an error during the import.');
        }
    }
    
}
