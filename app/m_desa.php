<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class m_desa extends Model
{
	protected $table = 'm_wil_desa';
	protected $fillable = ['wd_id', 'wd_kecamatan', 'wd_name'];
}
