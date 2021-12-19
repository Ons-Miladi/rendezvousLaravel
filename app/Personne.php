<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personne extends Model
{
    protected $fillable=['name','email','date_naissance','numero_tel','sexe'];
    
}
