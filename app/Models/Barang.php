<?php

namespace App\Models;

use Cache;
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
    const CACHE_KEY = 'barang:all'; // Gunakan format key yang jelas
    public static function getAllWithKategori()
    {
        try {
            return Cache::remember(
                self::CACHE_KEY,
                now()->addHours(1), // TTL lebih eksplisit
                function () {
                    $data = self::with('kategori')->get();
                    if ($data->isEmpty()) {
                        return collect([]); // Hindari cache null
                    }
                    return $data;
                }
            );
        } catch (\Exception $e) {
            \Log::error('Cache error: '.$e->getMessage());
            return self::with('kategori')->get(); // Fallback ke DB
        }
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
