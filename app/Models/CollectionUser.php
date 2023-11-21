<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CollectionUser extends Model
{
    use HasFactory;

    protected $table = 'collection_user';

    public function collection()
{
    return $this->belongsTo(Collection::class, 'collection_id'); // Assuming 'collection_id' is the foreign key in your collection_user table
}
}
