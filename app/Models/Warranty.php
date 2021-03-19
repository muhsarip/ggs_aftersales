<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warranty extends Model
{
    use HasFactory;

    protected $fillable = [
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


    public function distributor(){
        return $this->belongsTo(Distributor::class,"distributor_id");
    }

    public function getNoAttribute(){
        return $this->ser_id == ''?$this->rma_id:$this->ser_id;
    }


}
