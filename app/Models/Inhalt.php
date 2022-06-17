<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 * @property int id
 * @property string bezeichnung
 * @property float preis
 * @property string image_path
 */
class Inhalt extends Model
{
    use HasFactory;

    protected $fillable = [];
}