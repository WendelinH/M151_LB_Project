<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int id
 * @property string bemerkungen
 * @property Date datum
 * @property int kunde_id
 */
class Bestellung extends Model
{
    use HasFactory;

    protected $fillable = [];
}
