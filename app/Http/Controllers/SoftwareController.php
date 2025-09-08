<?php

namespace App\Http\Controllers;

use App\Models\Software;
use App\Models\Asset;
use Illuminate\Http\Request;

class SoftwareController extends Controller
{
    public function index()
    {
        $softwares = Software::with('asset')->get();
        return view('softwares.index', compact('softwares'));
    }

    public function create()
    {
        $assets = Asset::all();
        return view('softwares.form', compact('assets'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'asset_id' => 'required|exists:assets,id',
            'nombre' => 'required|string|max:255',
            'version' => 'required|string|max:100',
        ]);

        Software::create($request->all());
        return redirect()->route('softwares.index')->with('success', 'Software registrado correctamente.');
    }

    public function edit(Software $software)
    {
        $assets = Asset::all();
        return view('softwares.form', compact('software', 'assets'));
    }

    public function update(Request $request, Software $software)
    {
        $request->validate([
            'asset_id' => 'required|exists:assets,id',
            'nombre' => 'required|string|max:255',
            'version' => 'required|string|max:100',
        ]);

        $software->update($request->all());
        return redirect()->route('softwares.index')->with('success', 'Software actualizado correctamente.');
    }

    public function destroy(Software $software)
    {
        $software->delete();
        return redirect()->route('softwares.index')->with('success', 'Software eliminado correctamente.');
    }
}
