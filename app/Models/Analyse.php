<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Analyse extends Model
{
    use HasFactory;
    protected $table = 'analyses';
    protected $fillable = [
       
       
        'type_analyse',
        'prix_analyse',
        'unites',
        'valeur_normale',
       
    ];

   
    public function patients()
    {
        return $this->belongsToMany(Patient::class);
    }




}
