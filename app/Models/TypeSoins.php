<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeSoins extends Model
{
    use HasFactory;
    protected $table = 'type_soins';
    protected $fillable = [
        'type_soins',
    ];

    public function soins(){
        return $this->hasMany(Soins::class, 'soins');
    }
}
