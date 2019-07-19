<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calon extends Model
{
    protected $table='calon_karyawan';
    protected $dates=['tgl_lahir'];

    public function lamaran()
    {
        return $this->hasOne('App\Lamaran','id_calon','id');
   	}

   	public function umur(){
   		return \Carbon\Carbon::now()->diffInYears($this->attributes['tgl_lahir']);
   	}
}
