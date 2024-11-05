<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory; // factory 사용을 위해 넣어야 함

    protected $guarded = []; // <-> $fillable
}
