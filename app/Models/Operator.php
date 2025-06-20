<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Cache;

class Operator extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'operator';
    protected $primaryKey = 'operator_id';
    public $timestamps = false;

    protected $fillable = [
        'nama_lengkap',
        'username',
        'password',
    ];

    protected $hidden = [
        'password',
    ];

    const CACHE_KEY = 'operator:all';
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

    public static function findById($id)
    {
        return self::find($id);
    }

    public static function createOperator($data)
    {
        Cache::forget(self::CACHE_KEY);
        return self::create($data);
    }

    public static function updateById($id, $data)
    {
        Cache::forget(self::CACHE_KEY);
        return self::where('operator_id', $id)->update($data);
    }

    public static function deleteById($id)
    {
        Cache::forget(self::CACHE_KEY);
        return self::where('operator_id', $id)->delete();
    }
}
