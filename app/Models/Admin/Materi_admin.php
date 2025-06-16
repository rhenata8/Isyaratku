<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Materi_admin extends Model
{
    protected $table = 'materi';

    protected $fillable = [
        'judul',
        'isi',
        'gambar'
    ];
}
