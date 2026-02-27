<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'description',
        'specs',
        'technical_specs',
        'price',
        'is_free_shipping',
        'has_installment',
        'rating',
        'review_count',
        'sold_count',
        'brand'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function favoritedBy()
    {
        return $this->belongsToMany(User::class, 'favorites')->withTimestamps();
    }

    public function reviews()
    {
        return $this->hasMany(Review::class)->latest();
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function isFavoritedBy(?User $user)
    {
        if (!$user) return false;
        return $this->favoritedBy()->where('user_id', $user->id)->exists();
    }
}
