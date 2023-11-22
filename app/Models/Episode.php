<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Builder;

class Episode extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $fillable = ['number'];

    public function season()
    {
        return $this->belongsTo(Season::class, 'series_id');
    }
}
