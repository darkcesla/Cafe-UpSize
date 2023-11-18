<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KritikSaran extends Model
{
    use HasFactory;
    protected $table = 'kritiksaran';
    protected $guarded = [''];

    public function user(){
        return $this->belongsTo(User::class);
    }
}