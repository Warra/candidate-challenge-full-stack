<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Listing;

class Category extends Model
{
    use HasFactory;

    public function listings()
    {
        return $this->hasMany(Listing::class);
    }
}