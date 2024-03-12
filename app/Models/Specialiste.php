<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialiste extends Model
{
    use HasFactory;

    protected $table = 'specialistes';
    protected $fillable = [
        'nom_specialite',
        'id_patient',
        'id_medecin',
        'id_service'
    ];



        public function medecin(){
            return $this->belongsTo(Medecin::class,'id_medecin');
        }
        public function service(){
            return $this->belongsTo(Service::class,'id_service');
        }


    }
