<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int id
 * @property int artikel_id
 * @property int inhalt_id
 * @property Carbon created_at
 * @property Carbon updated_at
 */
class Konfiguration extends Model
{
    use HasFactory;

    protected $fillable = [
        'artikel_id',
        'inhalt_id'
    ];
}
