<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int id
 * @property int artikel_id
 * @property int bestellung_id
 * @property Carbon created_at
 * @property Carbon updated_at
 */
class BestellPosition extends Model
{
    use HasFactory;

    protected $fillable = [
        'artikel_id',
        'bestellung_id'
    ];
}
