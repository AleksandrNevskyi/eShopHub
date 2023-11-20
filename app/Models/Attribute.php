<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function attribute_values(){
        return $this->hasMany(Attribute_value::class);
    }

    public function features(){
        return $this->belongsToMany(Feature::class);
    }
}
