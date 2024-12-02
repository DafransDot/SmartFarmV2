<?php

namespace App\Http\Controllers;

use App\Models\HewanTernak;
use Illuminate\Http\Request;

class HewanTernakController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    $hewan = new HewanTernak();
    $hewan->nomor_id = $request->input('nomor_id');
    $hewan->jenis = $request->input('jenis');
    $hewan->vaksin = $request->input('vaksin');
    $hewan->jenis_kelamin = $request->input('jenis_kelamin');
    $hewan->save();

    return redirect()->route('hewan_ternak.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(HewanTernak $hewanTernak)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HewanTernak $hewanTernak)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HewanTernak $hewanTernak)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HewanTernak $hewanTernak)
    {
        //
    }
}
