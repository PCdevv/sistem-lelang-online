<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryLelang extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $guarded = [];
    protected $primaryKey = 'id_history';

    public function data_penawar()
    {
        return $this->hasOne(User::class, 'id', 'id_masyarakat');
    }
    public function data_barang()
    {
        return $this->hasOne(Barang::class, 'id_barang');
    }
}
