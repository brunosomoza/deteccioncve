<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use Illuminate\Http\Request;

class AssetController extends Controller
{
    public function index()
    {
        $assets = Asset::orderBy('id', 'asc')->get();
        return view('assets.index', compact('assets'));
    }

    public function create()
    {
        return view('assets.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_equipo' => 'required|string|max:255',
            'tipo' => 'required|in:PC,laptop,servidor',
            'sistema_operativo' => 'required|string|max:255',
            'estado' => 'required|in:activo,inactivo',
        ]);

        Asset::create($request->all());
        return redirect()->route('assets.index')->with('success', 'Activo registrado correctamente.');
    }

    public function edit(Asset $asset)
    {
        return view('assets.form', compact('asset'));
    }

    public function update(Request $request, Asset $asset)
    {
        $request->validate([
            'nombre_equipo' => 'required|string|max:255',
            'tipo' => 'required|in:PC,laptop,servidor',
            'sistema_operativo' => 'required|string|max:255',
            'estado' => 'required|in:activo,inactivo',
        ]);

        $asset->update($request->all());
        return redirect()->route('assets.index')->with('success', 'Activo actualizado correctamente.');
    }

    public function destroy(Asset $asset)
    {
        $asset->delete();
        return redirect()->route('assets.index')->with('success', 'Activo eliminado correctamente.');
    }
}
