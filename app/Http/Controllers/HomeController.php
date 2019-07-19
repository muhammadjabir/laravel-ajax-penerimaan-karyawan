<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $now = \Carbon\Carbon::now()->format('Y-m-d');
        $interview=\App\Interview::whereDate('tgl',$now)->get();
        $karyawan=\App\Lamaran::where('status',1)->get();
        $loker=\App\Loker::findOrFail(1);
        $data=[
        'pelamar' => count(\App\Lamaran::where('status',0)->get()),
        'interview'=>count($interview),
        'karyawan'=>count($karyawan)

        ];

        return view('home',['data'=>$data,'loker'=>$loker]);
    }
}
