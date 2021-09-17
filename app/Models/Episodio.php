<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Temporada;
use App\Serie;

class Episodio extends Model
{
    protected $fillable = ['numero'];
    public $timestamps = false;

    public function temporada()
    {
        return $this->belongsTo(Temporada::class);
    }
}
