<?php

namespace App\Models\Models;

use App\Models\Warranty;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function services()
    {
        return $this->hasMany(Warranty::class);
    }
}
