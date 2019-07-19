<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lamaran extends Model
{
    protected $table='lamaran';
	public function calon()
	{
	    return $this->belongsTo('App\Calon','id_calon','id');
	}
    
    public function interview()
    {
         return $this->hasOne('App\Interview','id_lamaran','id');
   	}
}
