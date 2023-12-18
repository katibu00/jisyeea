<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->belongsTo(ProgramCategory::class);
    }

    public function getStartDateFormattedAttribute()
    {
        return Carbon::parse($this->attributes['start_date'])->format('M d, Y');
    }

    public function getEndDateFormattedAttribute()
    {
        return Carbon::parse($this->attributes['end_date'])->format('M d, Y');
    }

    public function questions()
    {
        return $this->hasMany(ProgramQuestion::class);
    }




}
