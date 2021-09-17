<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Serie;
use App\Models\Episodio;

class Temporada extends Model
{
    public $timestamps = false;
    protected $fillable = ['numero'];

    public function episodios()
    {
        return $this->hasMany(Episodio::class);
    }

    public function serie()
    {
        return $this->belongsTo(Serie::class);
    }
}
