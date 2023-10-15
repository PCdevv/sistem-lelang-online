<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lelang extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $guarded = [];
    protected $primaryKey = 'id_lelang';

    public function data_barang()
    {
        return $this->hasOne(Barang::class, 'id_barang');
    }
    public function data_masyarakat()
    {
        return $this->hasOne(User::class, 'id', 'id_masyarakat');
    }
}
