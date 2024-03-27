<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resultat extends Model
{
    use HasFactory;
 

    protected $fillable = ['resultat'];
    public function analyse()
    {
        return $this->belongsTo(Analyse::class);
    }

}
