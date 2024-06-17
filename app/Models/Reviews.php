<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reviews extends Model
{
    use HasFactory;

    protected $fillable = [
        'userId',
        'productId',
        'score',
        'comment'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function getUserName() {
        return User::where('id', $this->userId)->first()->name;
    }
}
