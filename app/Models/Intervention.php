<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Intervention extends Model
{
    use HasFactory;
    protected $table = 'interventions';
    protected $fillable = [

        'prix_intervention',
        'id_specialiste',
        'id_patient',
        'id_service',
        'date_intervention',
    ];

    public function patient(){
        return $this->belongsTo(Patient::class,'id_patient');
    }
    public function service(){
        return $this->belongsTo(Service::class,'id_service');
    }

    public function specialiste(){
        return $this->belongsTo(Specialiste::class,'id_specialiste');
    }

    public function specialistes()
    {
        return $this->hasMany(Specialiste::class, 'id_medecin');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
