<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'max_users',
        'status',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

}
