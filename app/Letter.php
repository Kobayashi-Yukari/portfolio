<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Letter extends Model
{
	use SoftDeletes;

	protected $table = 'letters';
	protected $fillable = [
		'body', 'user_id', 'member_id', 'read_flag', 'status_flag', 'from_name', 'letter_avatar'
	];
	public function user() {
		return $this->belongsTo('App\User', 'user_id');
	}
	protected $dates = ['deleted_at'];
	
	public function getMemberNameAttribute() {
	    return config('member.'.$this->member_id);
	}
}
