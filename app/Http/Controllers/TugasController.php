<?php

namespace App\Http\Controllers;

use App\Http\Resources\TugasResource;
use App\Models\Tugas;
use Illuminate\Http\Request;

class TugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $tugas = Tugas::all();
      $tugasTransformed = $tugas->map(function($item) {
          return [
              'id' => $item->id,
              'nama_project' => $item->project->nama_project,
              'name' => $item->user->name,
              'nama_tugas' => $item->nama_tugas,
              'deskripsi' => $item->deskripsi,
              'prioritas' => $item->prioritas,
              'status' => $item->status,
              'tgl_mulai' => $item->tgl_mulai,
              'tgl_selesai' => $item->tgl_selesai,
              'created_at' => $item->created_at,
              'updated_at' => $item->updated_at,
          ];
      });
  
      return ['data_tugas' => $tugasTransformed];
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
      $tugas = Tugas::create($request->all());
      return ['data_tugas' => new TugasResource($tugas)];
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
      $tugas = Tugas::findOrFail($id);
      return ['data_tugas' => new TugasResource($tugas)];
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
      $tugas = Tugas::findOrFail($id);
      $tugas->update($request->all());
      return ['data_tugas' => new TugasResource($tugas)];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
      $tugas = Tugas::findOrFail($id);
      $tugas->delete();
      return response()->json(null, 204);
    }
}
