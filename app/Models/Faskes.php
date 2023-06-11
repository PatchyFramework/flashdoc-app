<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faskes extends Model
{
    protected $table = "faskes";

    protected $primaryKey = "id";


    public $fillable = [
        'nama_faskes',
        'phone_hotline',
        'alamat_faskes',
        'img_faskes',
    ];
}
