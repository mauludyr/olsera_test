<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class pajak extends Model
{
	use SoftDeletes;

    protected $fillable = ['id', 'rate', 'nama'];
    protected $hidden 	= ['created_at', 'updated_at', 'deleted_at','pivot'];
    
    public function item(){
    	return $this->belongsToMany('App\item')->withPivot('column1','column2');
    }
}
