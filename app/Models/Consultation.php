<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    use HasFactory;
    protected $table = 'consultations'; // Nom de la table associée au modèle

    protected $fillable = [
        'prix_consultation',
        'id_patient',
        'id_medecin',
        'date_consultation'
    ];

        public function patient(){
            return $this->belongsTo(Patient::class,'id_patient');
        }


        public function medecin(){
            return $this->belongsTo(Medecin::class,'id_medecin');
        }


        public function user()
        {
            return $this->belongsTo(User::class, 'id_user');
        }
}
