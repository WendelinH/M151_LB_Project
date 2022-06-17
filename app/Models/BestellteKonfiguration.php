<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int id
 * @property int bestell_position_id
 * @property int inhalt_id
 */
class BestellteKonfiguration extends Model
{
    use HasFactory;

    protected $fillable = [];
}