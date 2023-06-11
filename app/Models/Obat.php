<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class Obat extends Model
{
    use HasFactory, HasApiTokens, HasRoles;

    public $guard_name = 'api';

    protected $table = "obat";


    protected $foreignKey = 'id';


    public $fillable = [
        'nama_obat',
        'harga_obat',
        'img_obat',
    ];

}
