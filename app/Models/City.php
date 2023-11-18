<?php

namespace App\Models;

use App\Models\User;
use App\Models\Subdistrict;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function subdistricts()
    {
        return $this->hasMany(Subdistrict::class);
    }


    public function user()
    {
        return $this->hasMany(User::class);
    }
}
