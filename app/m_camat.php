<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class m_camat extends Model
{
	protected $table = 'm_wil_kecamatan';
	protected $fillable = ['wk_id', 'wk_kota', 'wk_name'];
}
