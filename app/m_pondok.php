<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class m_pondok extends Model
{
	protected $table = 'm_pondok';
	protected $primaryKey = 'p_id';

	public function review(){
  	return $this->hasMany('App\m_review', 'r_pondok', 'p_id');
  }
}
