<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
	use SoftDeletes;

	protected $table = 'contacts';
	protected $fillable = [
		'body', 'user_id', 'title_id', 'reply'
	];
	public function user() {
		return $this->belongsTo('App\User', 'user_id');
	}
	protected $dates = ['deleted_at'];

	public function getContactTitleAttribute() {
	    return config('title.'.$this->title_id);
	}
}
