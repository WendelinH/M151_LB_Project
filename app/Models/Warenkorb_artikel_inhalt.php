<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warenkorb_artikel_inhalt extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'warenkorb_artikel_id',
        'inhalt_id',
    ];
}
