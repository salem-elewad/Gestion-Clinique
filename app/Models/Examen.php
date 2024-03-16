<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Examen extends Model
{
    use HasFactory;
    protected $fillable = ['id_patient', 'id_analyse'];

    // Relation avec le modèle Patient
    public function patient()
    {
        return $this->belongsTo(Patient::class, 'id_patient');
    }

    // Relation avec le modèle Analyse
   /* public function analyse()
    {
        return $this->belongsTo(Analyse::class, 'id_analyse');
    } */

  // Dans le modèle Examen
public function analyses()
{
    return $this->hasMany(Analyse::class);
}


}
