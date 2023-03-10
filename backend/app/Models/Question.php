<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $fillable = ['question', 'subject_id', 'answer_id', 'option_id', 'status'];

    public function option()
    {
        return $this->belongsTo(Option::class);
    }

    public function options()
    {
        return $this->hasMany(Option::class);
    }

    public function answer()
    {
        return $this->hasOne(Answer::class);
    }
}
