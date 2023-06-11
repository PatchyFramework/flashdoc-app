<?php

namespace App\Models;

use App\Models\User;
use App\Models\Dokter;
use App\Models\Spesialis;
use App\Models\Faskes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class JanjiDokter extends Model
{
    use HasFactory, HasApiTokens, HasRoles;

    public $guard_name = 'api';



    protected $table = "janji";


    protected $foreignKey = 'id';


    public $fillable = [
        'user_id',
        'dokter_id',
        'tanggal_janji',
    ];


    // Relation to table/model User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }



    // Relation to table/model Dokter
    public function dokter()
    {
        return $this->belongsTo(Dokter::class, 'dokter_id');
    }



    // Relation to table/model Spesialis
    public function spesialis()
    {
        return $this->belongsTo(Spesialis::class, 'spesialis_id');
    }



    // Relation to table/model Faskes
    public function faskes()
    {
        return $this->belongsTo(Faskes::class, 'faskes_id');
    }
}
