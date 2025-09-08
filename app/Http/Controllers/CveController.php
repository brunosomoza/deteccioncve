<?php

namespace App\Http\Controllers;

use App\Models\Cve;
use Illuminate\Http\Request;

class CveController extends Controller
{
    // Mostrar listado de CVEs
    public function index()
    {
        $cves = Cve::orderBy('created_at', 'ASC')->get(); // Paginación opcional
        return view('cves.index', compact('cves'));
    }

    // Mostrar formulario para crear un nuevo CVE
    public function create()
    {
        return view('cves.create');
    }

    // Guardar un nuevo CVE en la base de datos
    public function store(Request $request)
    {
        $request->validate([
            'cve_id' => 'required|unique:cves,cve_id',
            'descripcion' => 'required',
            'cvss' => 'required|numeric|min:0|max:10',
            'criticidad' => 'required|in:baja,media,alta,critica',
        ]);

        Cve::create($request->all());

        return redirect()->route('cves.index')->with('success', 'CVE creada correctamente.');
    }

    // Mostrar un CVE
    public function show(Cve $cve)
    {
        return view('cves.show', compact('cve'));
    }

    // Mostrar formulario para editar un CVE
    public function edit(Cve $cfe)
    {
        return view('cves.edit', compact('cfe'));
    }

    // Actualizar un CVE
    public function update(Request $request, Cve $cve)
    {
        $request->validate([
            'cve_id' => 'required|unique:cves,cve_id,' . $cve->id,
            'descripcion' => 'required',
            'cvss' => 'required|numeric|min:0|max:10',
            'criticidad' => 'required|in:baja,media,alta,critica',
        ]);

        $cve->update($request->all());

        return redirect()->route('cves.index')->with('success', 'CVE actualizada correctamente.');
    }

    // Eliminar un CVE
    public function destroy(Cve $cve)
    {
        $cve->delete();
        return redirect()->route('cves.index')->with('success', 'CVE eliminada correctamente.');
    }
}
