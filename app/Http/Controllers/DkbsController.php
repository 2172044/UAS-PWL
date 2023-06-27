<?php

namespace App\Http\Controllers;

use App\Models\Matkul;
use App\Models\Dkbs;
use App\Models\Program_studi;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Spatie\Permission\Models\Permission;

use DB;

class DkbsController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request): View
    {
        // dd("index");

        $dkbs = Dkbs::all();
        // dd($dkbs);
        $user = Auth::user();
        $matkuls = [];
        foreach ($dkbs as $key => $value) {
            // dd($value->matkul_kode_matkul);
            $matkuls[$key] = Matkul::find($value->matkul_kode_matkul);
        }
        // dd($matkuls);
        // $matkuls = Matkul::all();
        return view('dkbs.index', compact('matkuls'));
    }
    public function create(Request $request): View
    {
        // dd("index");
        $matkuls = Matkul::all();
        return view('dkbs.create', compact('matkuls'));
    }
    public function store(Request $request): RedirectResponse
    {
        // dd($request->all());
        $this->validate($request, [
            'matkulAmbil' => 'required',
        ]);
        $matkulAmbil = $request->input("matkulAmbil");
        // dd($matkulAmbil);
        // dd(Auth::user()->id);
        $totalSks = 0;
        foreach ($matkulAmbil as $value) {
            $matkul = Matkul::find($value);
            // dd($matkul);
            $totalSks += $matkul->sks;
        }
        // dd($totalSks);
        if($totalSks > 24){
            return redirect()->route('dkbs.index')
            ->with('error', 'SKS Melebihi');
        }
        foreach ($matkulAmbil as $key => $value) {
            Dkbs::create([
                'user_id' => Auth::user()->id,
                'matkul_kode_matkul' => $value
            ]);
        }
        return redirect()->route('dkbs.index')
            ->with('success', 'Matkul sukses diambil');
    }
}