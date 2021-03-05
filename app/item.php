<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class item extends Model
{
	use SoftDeletes;

    protected $fillable = ['id', 'nama'];
    protected $hidden 	= ['created_at', 'updated_at', 'deleted_at'];
	
	public function pajak(){
		return $this->belongsToMany('App\pajak', 'pajak_items', 'item_id', 'pajak_id');
    }
}
