<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelaporan extends Model
{
    protected $table = 'pelaporan';

    public function tugaskerja()
    {
        return $this->hasOne(TugaskerjaT::class, 'id', 'id_tugas');
    }
}
