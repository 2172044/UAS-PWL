<?php

namespace App\Http\Controllers;

use App\Models\Program_studi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProgramStudiController extends Controller
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
    public function index()
    {
        $prodis = Program_studi::all();
        return view('prodi.index', compact('prodis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('prodi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|string',
        ]);
        Program_studi::create(['nama' => $request->input('nama')]);

        return redirect()->route('prodis.index')
            ->with('success', 'Prodi created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $prodi = DB::table("program_studis")->where("program_studis.kode_jurusan", $id)
            ->first();
        ;
        // dd($prodi);
        return view('prodi.show', compact('prodi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $prodi = Program_studi::find($id);
        // dd($prodi);
        return view('prodi.edit', compact('prodi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'nama' => 'required',
        ]);

        $prodi = Program_studi::find($id);
        $prodi->nama = $request->input('nama');
        $prodi->save();

        return redirect()->route('prodis.index')
            ->with('success', 'Prodi updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Program_studi::destroy($id);
        return redirect()->route('prodis.index')
            ->with('success', 'Prodi Delete successfully');
    }
}