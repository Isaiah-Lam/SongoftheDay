<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory;

    protected $fillable = [
        "id",
        "date",
        "posted",
        "title",
        "explicit",
        "artist",
        "album",
        "length"
    ];


}
