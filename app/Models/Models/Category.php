<?php

namespace App\Models\Models;

use App\Models\Warranty;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function brands()
    {
        return $this->belongsToMany(Brand::class);
    }

    public function services()
    {
        return $this->hasMany(Warranty::class);
    }
}
