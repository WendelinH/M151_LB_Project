<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int id
 * @property int artikel_id
 * @property int inhalt_id
 */
class Konfiguration extends Model
{
    use HasFactory;

    protected $fillable = [];
}
