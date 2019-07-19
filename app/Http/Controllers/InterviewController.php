<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InterviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('interview.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function loker(){
        $loker= \App\Loker::findOrFail(1);
        if ($loker->status==1) {
            $loker->status=0;
        }
        else{
            $loker->status=1;
        }

        $loker->save();
        return $loker;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $interview=new \App\Interview;
        $interview->tgl=$request->get('tgl_interview');
        $interview->id_lamaran=$request->get('id_lamaran');
        $interview->save();
        return $interview;
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
        $interview=\App\Interview::findOrFail($id);
        return view('interview.edit',['interview'=>$interview]);
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
        $interview=\App\Interview::findOrFail($id);
        $interview->tgl=$request->get('tgl_interview');
        $interview->save();
        return $interview;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $interview=\App\Interview::findOrFail($id);
        $interview->delete();
        return 'berhasil';
    }

    public function tindakan(Request $request){
        $lamaran=\App\Lamaran::findOrFail($request->get('id'));
        $lamaran->status=$request->get('status');
        $lamaran->save();
        return $lamaran;
    }

    public function data(Request $request){
        if ($request->get('filter')) {
           $now = \Carbon\Carbon::now()->format('Y-m-d');
            $interview=\App\Interview::whereDate('tgl',$now)->get();
        }
        else{
            $interview=\App\Interview::query();
        }
        
        return \DataTables::of($interview)
        ->addColumn('tgl',function($interview){
            return $interview->tgl->format('d-m-Y');
        })
        ->addColumn('action', function($interview){
            return view('action.action',
                ['url_edit' => route('interview.edit',['id'=>$interview->id]),
                 'url_delete' => route('interview.destroy',['id'=>$interview->id]),
                 'data'=>'interview'
                ]);
        })
        ->addColumn('nik',function($interview){
            return $interview->lamaran->calon->nik;
        })
        ->addColumn('kelamin',function($interview){
            return $interview->lamaran->calon->kelamin;
        })
        ->addColumn('nama',function($interview){
            return $interview->lamaran->calon->nama;
        })
        ->addColumn('status',function($interview){
            return $interview->lamaran->status;
        })
        ->addColumn('tindakan',function($interview){
           
              $tindakan = '<a href="'.route('interview.tindakan').'" class="btn btn-sm btn-outline-success shadow-sm tindakan" data-id="'. $interview->lamaran->id .'" data-tindak="1">Terima</a>
<a href="'.route('interview.tindakan').'" class="btn btn-sm btn-outline-danger shadow-sm tindakan" data-id="'. $interview->lamaran->id .'" data-tindak="2">Tolak</a>';
            return $tindakan;
         
        })

        ->rawColumns(['action','tindakan'])
        ->make(true);
    }

}
