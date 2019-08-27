<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Session;

class CreatedByModel extends Model
{
	public static function boot()
	{
		parent::boot();

		static::creating(function($model)
		{
			$model->created_by = Session::get('userid');
		});
	}
}
