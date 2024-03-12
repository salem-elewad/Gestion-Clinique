<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medecin extends Model
{
    use HasFactory;
    protected $table = 'medecins';
    protected $fillable = [
        'nom_medecin',
        'phone',
    ];

        public function consultations()
        {
            return $this->hasMany(Consultation::class, 'id_medecin');
        }
        public function specialistes()
        {
            return $this->hasMany(Specialiste::class, 'id_medecin');
        }


        public function analyses(){
            return $this->hasMany(Analyse::class, 'id_medecin');
        }

}
