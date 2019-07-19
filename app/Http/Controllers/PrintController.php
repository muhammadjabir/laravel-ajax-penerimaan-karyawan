<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class PrintController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function jadwal(Request $request){
    	$interview=\App\Interview::whereDate('tgl',$request->get('tgl'))->get();
    	$pdf=PDF::loadView('print.jadwal',['interview'=>$interview])->setPaper('a4' , 'portrait');
    	return $pdf->stream('jadwal-interview.pdf');
    }

    public function karyawan(Request $request){
    	$karyawan=\App\Lamaran::where('status',1)->whereDate('created_at','>=',$request->get('awal'))->whereDate('created_at','<=',$request->get('akhir'))->get();
    	$awal=\Carbon\Carbon::parse($request->get('awal'))->format('d-m-Y');
    	$akhir=\Carbon\Carbon::parse($request->get('akhir'))->format('d-m-Y');
    	$pdf=PDF::loadView('print.karyawan',['karyawan'=>$karyawan,'awal'=>$awal,'akhir'=>$akhir])->setPaper('a4' , 'portrait');
    	    	return $pdf->stream('karyawan-baru.pdf');
    }
}
