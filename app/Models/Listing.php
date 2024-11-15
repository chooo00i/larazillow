<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Listing extends Model
{
    use HasFactory; // factory 사용을 위해 넣어야 함

    protected $guarded = []; // <-> $fillable
    
    // User 모델과 관계 설정
    public function owner(): BelongsTo 
    {
        return $this->belongsTo(
            \App\Models\User::class,
            'by_user_id'
        );
    }
}
