<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Analyse extends Model
{
    use HasFactory;
    protected $table = 'analyses';
    protected $fillable = [
        'provenance',
        'prix_analyse',
        'type_analyse',
        'date_analyse',
        'id_patient',
        'id_medecin',
        'id_examen',
        'id_ser'
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

    public function examen()
    {
        return $this->belongsTo(Examen::class, 'examen_id');
    }


}
