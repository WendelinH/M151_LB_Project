<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int id
 * @property int bestell_position_id
 * @property int inhalt_id
 * @property Carbon created_at
 * @property Carbon updated_at
 */
class BestellteKonfiguration extends Model
{
    use HasFactory;

    protected $fillable = [
        'bestell_position_id',
        'inhalt_id'
    ];
}