<?php

namespace App\Models;

use App\Models\User;
use App\Models\Image;
use App\Models\Category;
use App\Models\Favorite;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use Searchable;
    use HasFactory;

    protected $fillable = ['title', 'price', 'body', 'user_id', 'category_id', 'previous_approval_status' ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getDet()
    {
        if (strlen($this->body) > 50) {
            return substr($this->body, 0, 50) . "...";
        } else {
            return $this->body;
        }
    }

    public static function toBeRevisedCount()
    {
        return Product::where('is_approved', 0)->count();
    }

    public function toSearchableArray(){

        return [
            'id' => $this->id,
            'title' => $this->title,
            'body' => $this->body,
            'category' => $this->category,
        ];
    }

    public function images():HasMany{
        return $this->hasMany(Image::class);
    }

    public function favoritedBy()
    {
        return $this->belongsToMany(User::class, 'favorite_products')->withTimestamps();
    }
}
