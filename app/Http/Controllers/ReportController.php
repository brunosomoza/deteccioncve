<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Report;
use App\Models\Vulnerability;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF; // usa barryvdh/laravel-dompdf

class ReportController extends Controller
{
    public function index()
    {
        //$vulnerabilities = Vulnerability::latest()->paginate(10);
        //return view('reports.index', compact('vulnerabilities'));
        $assets = Asset::withCount('vulnerabilities')->get();

        return view('reports.index', compact('assets'));
    }



    public function generatePDF()
    {
        // Obtenemos todas las vulnerabilidades con relaciones
        $vulnerabilities = Vulnerability::with(['asset', 'software', 'cve', 'asset'])->get();

        // Generamos el PDF
        $pdf = PDF::loadView('reports.pdf', compact('vulnerabilities'));

        return $pdf->download('Reporte_Vulnerabilidades.pdf');
    }

    public function generatePDFIDVul($idvul)
    {
        // Obtenemos todas las vulnerabilidades con relaciones
        $vulnerabilities = Vulnerability::where('asset_id', $idvul)->with(['asset', 'software', 'cve', 'asset'])->get();
        $asset =  $vulnerabilities[0]->asset['nombre_equipo'] ;
        $usuario = Auth::user();

        // Generamos el PDF
        $pdf = PDF::loadView('reports.asset', compact('vulnerabilities', 'asset', 'usuario'));

        return $pdf->download('Reporte_Vulnerabilidades.pdf');
    }
}
