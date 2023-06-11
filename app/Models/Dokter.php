<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use App\Models\Spesialis;
use App\Models\Faskes;

class Dokter extends Model implements Authenticatable
{
    use AuthenticatableTrait;
    use HasFactory, HasRoles;

    protected $table = "dokter";

    protected $primaryKey = "id";

    public $guard_name = 'api';


    public $fillable = [
        'name',
        'phone',
        'email',
        'jam_praktek',
        'password',
    ];


    public function spesialis()
    {
        return $this->belongsTo(Spesialis::class, 'spesialis_id');
    }

    public function faskes()
    {
        return $this->belongsTo(Faskes::class, 'faskes_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
