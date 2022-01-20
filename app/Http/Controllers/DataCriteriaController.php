<?php

namespace App\Http\Controllers;

use App\Models\Criteria;
use App\Models\Data_criteria;
use App\Models\Employe;
use Illuminate\Http\Request;

class DataCriteriaController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return view
     */
    public function index()
    {
        $employe = Employe::all()->toArray();
        $criteria = Criteria::all()->toArray();
        $data_criteria = Data_criteria::leftJoin('employes', 'employes.id', '=', 'data_criterias.employe_id')
                                        ->leftJoin('criterias', 'criterias.id', '=', 'data_criterias.criteria_id')
                                        ->select('data_criterias.*' , 'employes.name as karyawan' , 'criterias.name as kriteria')->get();
        $listData = array();
        foreach ($data_criteria as $key => $value) {
            $nama = $value['karyawan'];
            $kriteria = $value['kriteria'];
            $listData[$nama][$kriteria] = $value['value'];
        };
        // dd($listData);
        $data = [
            'employe' => $employe ,
            'criteria' => $criteria ,
            'listData' => $listData
        ];


        return view('pages.criteriaData')->with('data', $data);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // dd($request->all());
        foreach ($request->except(['_token', 'employe_id']) as $key => $value) {
            Data_criteria::updateOrCreate(
                ['employe_id' => $request->employe_id, 'criteria_id' => $key],
                ['value' => $value]
            );
        };

        return redirect()->back()->with('message', 'Input Data Sukses');
    }

}
