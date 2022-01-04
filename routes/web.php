<?php

use App\Http\Controllers\BonusController;
use App\Http\Controllers\CriteriaController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\PayoutController;
use App\Http\Controllers\RatioAlternativeController;
use App\Http\Controllers\RatioCriteriaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::middleware(['auth'])->group(function () {
    Route::get('/',function () {
        return view('auth')->name('dashboard');
    });
    
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/karyawan', [EmployeController::class, 'index'])->name('karyawan');
    Route::post('/inputKaryawan', [EmployeController::class, 'store'])->name('inputKaryawan');
    Route::post('/updateKaryawan', [EmployeController::class, 'update'])->name('updateKaryawan');
    Route::post('/inputKaryawan', [EmployeController::class, 'store'])->name('inputKaryawan');
    Route::get('/deleteKaryawan/{employe}', [EmployeController::class, 'destroy'])->name('deleteKaryawan');
    
    Route::get('/ratioAlternative', [RatioAlternativeController::class, 'index'])->name('ratioAlternative');
    Route::post('/addRatioAlternative', [RatioAlternativeController::class, 'store'])->name('addRatioAlternative');
    Route::get('/resultAlternative', function(){
        $data = RatioAlternativeController::showAlternative();
        return view('pages.ratioAlternative')->with('data', $data);
    })->name('resultAlternative');
    Route::get('/deleteRatioAlternative/{criterias_id}/{v_id}/{h_id}', [RatioAlternativeController::class, 'destroy'])->name('deleteRatioAlternative');
    
    Route::get('/criteria', [CriteriaController::class, 'index'])->name('criteria');
    Route::post('/addCriteria', [CriteriaController::class, 'store'])->name('addCriteria');
    Route::get('/deleteCriteria/{criteria}', [CriteriaController::class, 'destroy'])->name('deleteCriteria');
    
    Route::get('/ratioCriteria', [RatioCriteriaController::class, 'index'])->name('ratioCriteria');
    Route::post('/addRatioCriteria', [CriteriaController::class, 'storeRatio'])->name('addRatioCriteria');
    Route::get('/deleteRatioCriteria/{v_id}/{h_id}', [RatioCriteriaController::class, 'destroy'])->name('deleteRatioCriteria');
    
    Route::get('/payout', [PayoutController::class, 'index'])->name('payout');
    Route::post('/payout', [PayoutController::class, 'show'])->name('payout');
    Route::post('/addPayout', [PayoutController::class, 'store'])->name('addPayout');
    Route::post('/updatePayout', [PayoutController::class, 'update'])->name('updatePayout');
    Route::get('/deletePayout/{id}', [PayoutController::class, 'destroy'])->name('deletePayout');
    Route::post('/addBonus', [BonusController::class, 'store'])->name('addBonus');
    
    Route::get('/print/{date}/{id}', function ($date, $id) {
        $data = App\Models\Payout::whereYear('period',  date("Y", strtotime($date)))
        ->whereMonth('period', date("m", strtotime($date)))
        ->where('payouts.id', $id)
        ->leftjoin('bonuses', 'bonuses.id', 'bonus_id')
        ->join('employes', 'employes.id', 'employe_id')
        ->leftjoin('positions', 'positions.id', 'employes.position_id')
        ->select('payouts.*', 'employes.*', 'bonuses.name as bonus_name', 'bonuses.value as bonus_value', 'positions.name as position')
        ->first();
        // dd($data);
        return view('layouts.print')->with('data', $data);
    })->name('print');
});
    
    
    require __DIR__.'/auth.php';
    