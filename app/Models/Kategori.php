<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategori_barang';
    protected $primaryKey = 'kategori_id';
    protected $fillable = ['nama_kategori'];
    public $timestamps = false;

    // Ambil semua kategori
    const CACHE_KEY = 'kategori:all';
    public static function getAll()
    {
        // return self::all();
        try {
            return Cache::remember(
                self::CACHE_KEY,
                now()->addHours(1),
                function () {
                    $data = self::all();
                    if ($data->isEmpty()) {
                        return collect([]);
                    }
                    return $data;
                }
            );
        } catch (\Exception $e) {
            \Log::error('Cache error: '.$e->getMessage());
            return self::with('kategori')->get(); // Fallback ke DB
        }
    }

    // Simpan kategori baru
    public static function createKategori($data)
    {
        Cache::forget(self::CACHE_KEY);
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
        Cache::forget(self::CACHE_KEY);
        return self::where('kategori_id', $id)->update($data);
    }

    // Hapus kategori
    public static function deleteById($id)
    {
        Cache::forget(self::CACHE_KEY);
        return self::where('kategori_id', $id)->delete();
    }
}
