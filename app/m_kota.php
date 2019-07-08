<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class m_kota extends Model
{
	protected $table = 'm_wil_kota';
	protected $fillable = ['wc_id', 'wc_provinsi', 'wc_name'];
}
