<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use mikehaertl\pdftk\Pdf;
use \App\Solicitud as Solicitud;

class SolicitudController extends Controller
{
  public function __construct() {
    $this->middleware('maestro');
  }

  public function crea() {
    \Carbon\Carbon::setLocale('es');
    $dir = 'C:/Users/Bryan/JustLaravelThings/sam/';
    $pdf = new Pdf($dir . 'public/pdf/SAR-008.pdf');
    $ubi = explode(' ', request('ubicacion'));
    $piso = ($ubi[1] == 'P/A') ? 'Planta Alta' : 'Planta Baja';

    $this->validate(request(), [
      'nombre' => 'required',
      'ubicacion' => 'required',
      'extension' => 'required',
      'correo' => 'required|email',
      'equipo' => 'required',
      'dirIp' => 'required',
      'password' => 'required',
      'marca' => 'required',
      'modelo' => 'required',
      'fecha_cita' => 'required',
      'descProblema' => 'required'
    ]);

    $soli = \App\Solicitud::create(
      request(['maestro_id']) +
      ['fecha_cita' => date('Y-m-d H:i:s')] +
      ['estado' => 0] +
      ['tipo_solicitud' => 1] +
      ['ruta_sar' => 'pdf/mantenimientos/'. date('Y') . '/' . $ubi[0].'/'.$piso]
    );
    if(!file_exists('pdf/mantenimientos/'. date('Y') . '/' . $soli->created_at->format('F') . '/' . $ubi[0].'/'.$piso.'/'.request('nombre'))) mkdir('pdf/mantenimientos/'. date('Y') . '/' . $soli->created_at->format('F') . '/' . $ubi[0].'/'.$piso.'/'.request('nombre'), 0777, true);

    $pdf->fillForm([
      'nombre'=> request('nombre'),
      'ubicacion' => request('ubicacion'),
      'extension' => request('extension'),
      'correo' => request('correo'),
      'equipo' => request('equipo'),
      'dirip' => request('dirIp'),
      'password' => request('password'),
      'marca' => request('marca'),
      'modelo' => request('modelo'),
      'fechasolicitud' => request('fecha_cita'),
      'descripcion' => request('descProblema')
    ])
    ->needAppearances()
    ->saveAs('pdf/mantenimientos/'. date('Y') . '/' . $soli->created_at->format('F') . '/' . $ubi[0].'/'.$piso.'/'.request('nombre').' '.request('ap_pat'). '/'. $soli->created_at->toDateString().'.pdf');
    
    \Mail::to($soli->maestro)->send(new \App\Mail\MantenimientoAsignado($soli));

    return back()->with([
      'message' => 'Se ha enviado la solicitud bien chidobai'
    ]);
  }
}
