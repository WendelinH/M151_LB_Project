<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int id
 * @property int artikel_id
 * @property int bestellung_id
 */
class BestellPosition extends Model
{
    use HasFactory;

    protected $fillable = [];
}
