<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operator extends Model
{
    use HasFactory;

    protected $table = 'operator';
    protected $primaryKey = 'operator_id';
    public $timestamps = false;
    protected $fillable = [
        'nama_lengkap',
        'username',
        'password'
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
