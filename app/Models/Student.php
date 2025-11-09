<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre', 'correo', 'career_id', 'semestre'
    ];

    public function career()
    {
        return $this->belongsTo(Career::class);
    }
}
