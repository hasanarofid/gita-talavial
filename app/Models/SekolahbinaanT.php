<?php

namespace App\Models;

use App\SekolahM;
use Illuminate\Database\Eloquent\Model;

class SekolahbinaanT extends Model
{
    protected $table = 'sekolahbinaan_t';
    public function sekolah()
    {
        return $this->hasOne(SekolahM::class, 'id', 'id_sekolah');

    }
}
