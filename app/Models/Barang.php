<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'barang';
    protected $primaryKey = 'barang_id';
    protected $fillable = ['kategori_id', 'nama_barang', 'harga'];
    public $timestamps = false;

    // Relasi ke Kategori (barang -> belongsTo kategori)
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id', 'kategori_id');
    }

    // Ambil semua data barang dengan kategori
    public static function getAllWithKategori()
    {
        return self::with('kategori')->get();
    }

    public static function createBarang($data)
    {
        return self::create($data);
    }

    public static function findById($id)
    {
        return self::find($id);
    }

    public static function updateById($id, $data)
    {
        return self::where('barang_id', $id)->update($data);
    }

    public static function deleteById($id)
    {
        return self::where('barang_id', $id)->delete();
    }
}
