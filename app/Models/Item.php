<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
	use HasFactory;

    protected $fillable = [
        'name',
        'category_id'
    ];

    public function category()
    {
	    return $this->belongsTo(Category::class);
    }

    public function locations() {
        return $this->belongsToMany(Location::class, 'item_location');
    }

    public function features() {
        return $this->belongsToMany(Feature::class, 'item_feature');
    }
}
