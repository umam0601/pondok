<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class m_prov extends Model
{
	protected $table = 'm_wil_provinsi';
	protected $fillable = ['wp_id', 'wp_name'];
}
