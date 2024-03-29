<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    protected $tables = 'patients';
    protected $fillable = [
        'nom_patient',
        'cnam',
        'nni',
        'id_service',
        'analyse_id'
    ];

            public function consultations()
            {
                return $this->hasMany(Consultation::class, 'id_patient');
            }

            
            public function service(){
                return $this->belongsTo(Service::class,'id_service');
            }
            public function analyses()
            {
                return $this->belongsToMany(Analyse::class);
            }

            public function soins(){
                return $this->hasMany(Soins::class, 'id_patient');
            }

        
          
            public function resultats()
            {
                return $this->hasMany(Resultat::class, 'patient_id');
            }
}
