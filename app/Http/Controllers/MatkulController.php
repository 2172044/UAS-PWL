<?php

namespace App\Http\Controllers;

use App\Models\Matkul;
use App\Models\Mk_tawars;
use App\Models\Program_studi;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Spatie\Permission\Models\Permission;

use DB;

class MatkulController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:prodi-list|prodi-create|prodi-edit|prodi-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:prodi-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:prodi-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:prodi-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request): View
    {
        // dd("index");
        // $tahunAjaran = 0;
        $user = Auth::user();
        if ($user->hasRole('Admin')) {
            $matkuls = Matkul::all();
        } else {
            $matkuls = Matkul::where('program_studi_kode_jurusan', $user->program_studi_kode_jurusan)->get();
        }
        // dd($user->program_studi_kode_jurusan);
        return view('matkul.index', compact('matkuls'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $prodis = Program_studi::all();
        return view('matkul.create', compact("prodis"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'nama_matkul' => 'required|string',
            'sks' => 'required|integer',
            'semester' => 'required|integer',
            'status' => 'required',
            'prodi' => 'required',
        ]);

        Matkul::create([
            'nama_matkul' => $request->input('nama_matkul'),
            'sks' => $request->input('sks'),
            'semester' => $request->input('semester'),
            'status' => $request->input('status'),
            'program_studi_kode_jurusan' => $request->input('prodi')
        ]);
        return redirect()->route('matkuls.index')
            ->with('success', 'Matkul created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $matkul = Matkul::find($id);
        $mk_Tawars = Mk_tawars::all();
        return view('matkul.show', compact('matkul', 'mk_Tawars'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $matkul = Matkul::find($id);
        $prodis = Program_studi::all();
        return view('matkul.edit', compact('matkul', 'prodis'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $this->validate($request, [
            'nama_matkul' => 'required|string',
            'sks' => 'required|integer',
            'semester' => 'required|integer',
            'status' => 'required',
            'prodi' => 'required',
        ]);

        $matkul = Matkul::find($id);
        $matkul->nama_matkul = $request->input('nama_matkul');
        $matkul->sks = $request->input('sks');
        $matkul->semester = $request->input('semester');
        $matkul->status = $request->input('status');
        $matkul->program_studi_kode_jurusan = $request->input('prodi');
        $matkul->save();

        return redirect()->route('matkuls.index')
            ->with('success', 'Matkul updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Matkul::destroy($id);
        return redirect()->route('matkuls.index')
            ->with('success', 'Matkul Delete successfully');
    }
}