<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;

class KaryawanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
    	return view('pelamar.karyawan');
    }

    public function data(){
    	$karyawan = \App\Lamaran::with('calon')->where('status',1)->get();
    	return \DataTables::of($karyawan)
    	->addColumn('calon.tgl_lahir',function($karyawan){
    	    return $karyawan->calon->tgl_lahir->format('d-m-Y');
    	})
    	->make(true);
    }
}
