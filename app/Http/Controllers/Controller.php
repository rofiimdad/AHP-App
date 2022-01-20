<?php

namespace App\Http\Controllers;

use App\Models\Data_criteria;
use App\Models\Employe;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        $karyawan = Employe::all();
        $user     = User::all();
        $data = (object)[
            'user' => $user,
            'karyawan' => $karyawan,
        ];

        return view('pages.UserList')->with('data' , $data);
    }

    public function dashboard()
    {
        $user = Auth::user();
        if ($user->is_admin) {
            return view('dashboard');
        }

        $karyawan = Employe::where('name', $user->name)->first();
        $data_criteria = Data_criteria::where('employe_id', $karyawan->id)
                                        ->leftJoin('criterias', 'criterias.id', '=', 'data_criterias.criteria_id')
                                        ->select('data_criterias.*', 'criterias.name')
                                        ->get();

        $rank = RankController::show();
        $data = (object)[
            'user' => $user,
            'karyawan' => $karyawan,
            'target' => $data_criteria,
            'rank' => $rank[$user->name]
        ];

        return view('dashboard')->with('data' , $data);
    }


    public function save(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'password' => 'required',
        ]);

        User::updateOrCreate(
            ['name' => $request->name],
            [
                'password' => Hash::make($request->password),
                'role' => $request->role,
            ]
            );

        return redirect()->back()->with('message', 'Insert Data Success');

    }

}
