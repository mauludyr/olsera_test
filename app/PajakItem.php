<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PajakItem extends Model
{
	use SoftDeletes;

	protected $fillable = ['id', 'pajak_id', 'item_id'];
    protected $hidden 	= ['created_at', 'updated_at', 'deleted_at'];
    
    public function getPajak(){
        return $this->belongsTo('App\pajak', 'pajak_id');
    }

    public function getItem(){
        return $this->belongsTo('App\item', 'item_id');
    }
}
