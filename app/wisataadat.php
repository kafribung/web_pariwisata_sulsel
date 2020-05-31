<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class wisataadat extends Model
{
    protected $table = 'tempatwisatas';
    protected $fillable = ['nama','sejarah','gambar','slug'];
}
