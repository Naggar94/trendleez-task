<?php

namespace App\Models;

use App\Models\CreatedByModel;

class Articles extends CreatedByModel
{
	public $timestamps = false;
	protected $fillable = ['content','category_id'];
	protected $table = 'articles';

	public function user(){
		return $this->hasOne('App\Models\Users', 'id', 'created_by');
	}

	public function category(){
		return $this->hasOne('App\Models\Categories', 'id', 'category_id');
	}
}