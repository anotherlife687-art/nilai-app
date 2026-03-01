<?php

namespace App\Models;

use App\Models\Nilai;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $fillable = ['nama','kelas','nis'];

    public function nilais()
    {
        return $this->hasMany(Nilai::class);
    }
}
