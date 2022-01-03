<?php

namespace App\Http\Controllers;

use App\Models\Criteria;
use App\Models\Ratio_criteria;
use Illuminate\Http\Request;

class CriteriaController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $criteria = Criteria::all()->toArray();
        $ratio    = RatioCriteriaController::data();
        $data = (object)[
            'criteria'  => $criteria,
            'ratio'     => $ratio,
        ];
        
        // dd($data);
        return view('pages.criteria')->with('data', $data);
        
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
        ]);

        Criteria::create([
            'name' => $request->name,
        ]);

        return redirect()->back()->with('message', 'Insert Data Criteria Success');
    }

    public function storeRatio(Request $request)
    {
        $request->validate([
            'v_criteria' => 'required|different:h_criteria',
            'h_criteria' => 'required|different:V_criteria',
            'value' => 'numeric',
        ]);

        if (Ratio_criteria::where('v_criteria_id', $request->v_criteria)
                            ->where('h_criteria_id', $request->h_criteria)
                            ->count() 
        ) {
            return redirect()->back()->with('message', 'Data Sudah Pernah disimpan');
        }

        Ratio_criteria::create(
            [
                'v_criteria_id' => $request->v_criteria,
                'h_criteria_id' => $request->h_criteria,
                'value' => $request->value,
            ]);
        Ratio_criteria::create([
                'h_criteria_id' => $request->v_criteria,
                'v_criteria_id' => $request->h_criteria,
                'value' => (1 / $request->value),
            ]);
        return redirect()->back()->with('message', 'Input Data Sukses');
    }

    public function destroy(Criteria $criteria)
    {
        $existance = Ratio_criteria::where('v_criteria_id', $criteria->id)
            ->orWhere('h_criteria_id', $criteria->id)
            ->count();
        if ($existance > 1) {
            return redirect()->back()->with(["message" => "Info : Kriteria memiliki relasi perbandingan!"]);
        } else {
            $criteria->delete();
            return redirect()->back()->with(["message" => "Delete Data sukses"]);
        }
    }
}
