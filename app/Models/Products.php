<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'category',
        'price',
        'stock'
    ];

    public function images()
    {
        return $this->hasMany('App\Models\Images', 'productId', 'id');
    }

    public function reviews() {
        return $this->hasMany('App\Models\Reviews', 'productId', 'id');
    }

    public function avgScore() {
        $reviews = $this->reviews()->get();

        $avgScore = 0.0;
        if (count($reviews) > 0) {
            foreach ($reviews as $review) {
                $avgScore += $review->score;
            }
            
            return $avgScore/count($reviews);
        } else {
            return $avgScore;
        }
    }
}
