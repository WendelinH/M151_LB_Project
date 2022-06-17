<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int id
 * @property Date kunde_seit
 * @property string nachname
 * @property string ort
 * @property string plz
 * @property string strasse
 * @property string tel
 * @property string vorname
 */
class Kunde extends Model
{
    use HasFactory;

    protected $fillable = [];
}
