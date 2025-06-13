<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public static function getAll()
    {
        return self::all();
    }

    public static function findById($id)
    {
        return self::find($id);
    }

    public static function createOperator($data)
    {
        return self::create($data);
    }

    public static function updateById($id, $data)
    {
        return self::where('operator_id', $id)->update($data);
    }

    public static function deleteById($id)
    {
        return self::where('operator_id', $id)->delete();
    }
}
