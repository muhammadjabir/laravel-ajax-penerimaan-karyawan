<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Interview extends Model
{
    protected $table='test_interview';
    protected $dates=['tgl'];
    public function lamaran()
    {
        return $this->belongsTo('App\Lamaran','id_lamaran','id');
    }
}
