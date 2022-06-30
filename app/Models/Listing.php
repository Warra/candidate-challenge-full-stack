<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Listing extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "slug",
        "description",
        "online_at",
        "offline_at",
        "amount",
        "currency",
        "mobile",
        "email",
        "category_id"
     ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}