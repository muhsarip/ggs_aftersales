<?php

namespace App\Models;

use App\Models\Models\Brand;
use App\Models\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warranty extends Model
{
    use HasFactory;

    protected $fillable = [
        "category_id",
        "brand_id",
        "type",
        "case_id",
        "rma_id",
        "ser_id",
        "distributor_id",
        "status",

        "name",
        "address",
        "phone",
        "email",
        "merk_barang",
        "nama_barang",
        "serial_number",
        "detail_kerusakan",
        "foto_barang_1",
        "foto_barang_2",
        "file_nota_pembelian",
    ];

    protected $appends = ['no'];


    public function distributor()
    {
        return $this->belongsTo(Distributor::class, "distributor_id");
    }

    public function getNoAttribute()
    {
        return $this->ser_id == '' ? $this->rma_id : $this->ser_id;
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
