<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function attributes(){
        return $this->belongsToMany(Attribute::class, 'feature_attribute')->withPivot('value_id');
    }

    public function items(){
        return $this->belongsToMany(Item::class);
    }
}
