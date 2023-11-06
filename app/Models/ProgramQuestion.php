<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramQuestion extends Model
{
    use HasFactory;

    public function options()
    {
        return $this->hasMany(QuestionOption::class);
    }

    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    protected $fillable = ['question', 'field_type', 'options', 'program_id'];


}
