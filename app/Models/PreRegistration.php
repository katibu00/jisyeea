<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreRegistration extends Model
{
    use HasFactory;


    // public function preferred_category()
    // {
    //     return $this->belongsTo(ProgramCategory::class, 'preferred_category','id');
    // }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
