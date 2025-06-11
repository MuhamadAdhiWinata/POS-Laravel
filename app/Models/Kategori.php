<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategori_barang';
    protected $primaryKey = 'kategori_id';
    protected $fillable = ['nama_kategori'];
    public $timestamps = false;

    // Ambil semua kategori
    public static function getAll()
    {
        return self::all();
    }

    // Simpan kategori baru
    public static function createKategori($data)
    {
        return self::create($data);
    }

    // Ambil kategori by ID
    public static function findById($id)
    {
        return self::find($id);
    }

    // Update kategori
    public static function updateById($id, $data)
    {
        return self::where('kategori_id', $id)->update($data);
    }

    // Hapus kategori
    public static function deleteById($id)
    {
        return self::where('kategori_id', $id)->delete();
    }
}
