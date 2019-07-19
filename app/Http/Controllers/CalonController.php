<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Gate;

class CalonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::allows('admin')) {
           return view('pelamar.index');
        }
        else
        {
            return redirect()->route('login');
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('interview.create');
    }

    public function lamaran(){
        $loker = \App\Loker::findOrFail(1);
        return view('uiuser.lamaran',['loker'=>$loker]);
    }

    public function seleksi(Request $request){
        $calon=\App\Calon::where('nik',$request->get('nik'))->first();
        if ($calon){
             return view('uiuser.hasil',['calon'=>$calon]);
        }
        else {
            return '<div style="margin-bottom: 100px" class="alert alert-danger text-center data-hasil"><h5>NIK yang anda masukkan tidak ada, silakan masukkan NIK dengan benar....</h5></div>';
        }
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
   
        $validation=\Validator::make($request->all(),[
            "nik"=>"required|unique:calon_karyawan,nik|digits_between:0,20",
            "nama"=>"required|regex:/(^[A-Za-z ]+$)+/|min:5|max:40",
            "email"=>"required|email|unique:calon_karyawan,email",
            "nohp"=>"required|digits_between:0,13",
            "tgl"=>"required|date|before:-17 years|after:-40 years",
            "berkas"=>"required|mimes:pdf|file|max:3124"

            ],[
            "nik.required"=>'NIK tidak boleh kosong',
            "nik.unique"=>'NIK sudah terdaftar',
            'nik.digits_between'=>'NIK harus angka dan tidak boleh lebih dari 20',
            "nama.required"=>"Nama Tidak Boleh Kosong",
            "nama.min"=>"Tidak Boleh kurang dari 5",
            "nama.max"=>"Tidak Boleh Lebih dari 40",
            "nama.regex"=>"Nama Tidak Valid",
            "email.required"=>'Email tidak boleh kosong',
            "email.unique"=>'Email sudah terdaftar',
            'email.email'=>'Format email salah',
            "berkas.mimes"=>"Format file harus pdf",
            "berkas.max"=>"File tidak boleh lebih dari 3mb",
            "nohp.required"=>"No HP tidak boleh kosong",
            "nohp.digits_between"=>"No hp harus angka dan tidak boleh lebih dari 13",
            "tgl.before"=>"Umur harus diatas 17 tahun",
            "tgl.after"=>"Umur tidak boleh lebih dari 40 tahun",
            "tgl.required"=>"Tanggal lahir tidak boleh kosong",
            "berkas.required"=>'File tidak boleh kosong'
            ]

           )->validate();
        $calon= new \App\Calon;
        $calon->nik=$request->get('nik');
        $calon->nama=$request->get('nama');
        $calon->email=$request->get('email');
        $calon->kelamin=$request->get('kelamin');
        $calon->nohp=$request->get('nohp');
        $calon->tgl_lahir=$request->get('tgl');
        $file=$request->file('berkas')->store('berkas','public');
        $calon->berkas=$file;
        $calon->save();

        $lamaran = new \App\Lamaran;
        $lamaran->id_calon=$calon->id;
        $lamaran->save();

        return $calon;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $calon=\App\Calon::findOrFail($id);
        if($calon->berkas and file_exists(storage_path('app/public/'.$calon->berkas))){
                \Storage::delete('public/'.$calon->berkas);
        }
        $calon->delete();
        return "berhasil";
    }

    public function data(){
        $calon=\App\Calon::with('lamaran')->get();
        return DataTables::of($calon)
        ->addColumn('action', function($calon){
            return view('action.actiondua',
                ['url_edit' => route('calon.edit',['id'=>$calon->id]),
                 'url_delete' => route('calon.destroy',['id'=>$calon->id]),
                    'calon'=>$calon
                ]);
        })
        ->addColumn('berkas',function($calon){
            $url_download=route('download',['id'=>$calon->id]);
            return '<a href="'.$url_download.'" class="btn btn-sm btn-warning shadow-sm">Download</a>';
        })
        ->addColumn('umur',function($calon){
            $tgl_lahir= \Carbon\Carbon::parse($calon->tgl_lahir);
            return \Carbon\Carbon::now()->diffInYears($tgl_lahir);
        })
       
        ->addColumn('tgl_lahir',function($calon){
            return $calon->tgl_lahir->format('d-m-Y');
        })
        ->rawColumns(['action','berkas','interview'])
        ->make(true);
    }

    public function download($id){
        $calon=\App\Calon::findOrFail($id);
        $name=$calon->nik .' - '.$calon->nama;
        //return \Response::download($url);
        return \Storage::download('public/'.$calon->berkas,$name);
    }
}
