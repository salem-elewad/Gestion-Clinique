<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soins extends Model
{
    use HasFactory;

    protected $table = 'soins';
    protected $fillable = [
        'prix_soins',
        'type_soins',
        'id_patient',
        'date_soins',
       
    ];


    public function patient()
    {
        return $this->belongsTo(Patient::class, 'id_patient');
    }



        public function typeSoins()
    {
        return $this->belongsTo(TypeSoins::class, 'id_type_soins');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
