<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $table = 'services';

    protected $fillable = [
        'nom_service'
    ];
          public function specilistes()
        {
            return $this->hasMany(Specialiste::class, 'id_service');
        }
        public function patients()
        {
            return $this->hasMany(Patient::class, 'id_patient');
        }

}
