<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\emp1Export;
use App\Imports\emp1Import;
use App\Models\Datepicker;
use App\Models\CourtMaster;
class emp1Controller extends Controller
{
   /**
    * @return \Illuminate\Support\Collection
    */
    public function fileImportExport()
    {
       return view('fileimport');
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function fileImportPost(Request $request)
    {
    Excel::import(new emp1Import, $request->file);
    return redirect('/')->with('success', 'All good!');
    }

    public function export()
    {
        return Excel::download(new emp1Export, 'emp1.xlsx');
    }

    public function datepickercreate()
    {
        return view ('datepicker');
    }
    public function datepickerdone(Request $request)
    {
        $datepicker= new Datepicker;
        $datepicker->name=$request->get('name');
        $datepicker->date=$request->get('date');
        $datepicker->save();
        return redirect('home')->with('success', 'Name and Date has been added in database');
    }
    public function courtdisplay()
    {
        // Do something here.

        $courtlist = CourtMaster::all();
        return view('datepicker',compact('courtlist'));

    }
}
