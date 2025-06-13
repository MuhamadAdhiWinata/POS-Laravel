<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = 'transaksi';
    protected $primaryKey = 'transaksi_id';
    public $timestamps = false;
    protected $fillable = [
        'operator_id',
        'tanggal_transaksi',
    ];

    public function details():HasMany
    {
        return $this->hasMany(TransaksiDetail::class,'transaksi_id', 'transaksi_id');
    }

    public function operator()
    {
        return $this->belongsTo(Operator::class, 'operator_id','operator_id');
    }
}
