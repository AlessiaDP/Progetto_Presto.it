<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function favoriteProducts()
    {
        return $this->belongsToMany(Product::class, 'favorite_products')->withTimestamps();
    }

    public function addFavorite(Product $product)
    {
        $this->favoriteProducts()->attach($product->id);
    }

    public function removeFavorite(Product $product)
    {
        $this->favoriteProducts()->detach($product->id);
    }

    public function hasFavorite(Product $product)
    {
        return $this->favoriteProducts()->where('product_id', $product->id)->exists();
    }
}
