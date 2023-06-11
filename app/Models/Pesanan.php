<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use App\Models\Obat;
use App\Models\User;

class Pesanan extends Model
{
    use HasFactory, HasApiTokens, HasRoles;

    public $guard_name = 'api';

    protected $table = "pesanan";


    protected $foreignKey = 'id';


    public $fillable = [
        'user_id',
        'obat_id',
        'kuantitas_obat',
        'total',
        'status_pesanan',
        'created_at',
    ];


    // Relation to table/model Obat
    public function obat()
    {
        return $this->belongsTo(Obat::class, 'obat_id');
    }


    // Relation to table/model User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
