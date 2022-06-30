<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use \App\Models\User;

/**
 * @property int id
 * @property int user_id
 * @property Carbon kunde_seit
 * @property string nachname
 * @property string ort
 * @property string plz
 * @property string strasse
 * @property string tel
 * @property string vorname
 * @property Carbon created_at
 * @property Carbon updated_at
 */
class Kunde extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'kunde_seit',
        'nachname',
        'ort',
        'plz',
        'strasse',
        'tel',
        'vorname'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
