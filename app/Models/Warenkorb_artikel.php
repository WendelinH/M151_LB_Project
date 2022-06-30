<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warenkorb_artikel extends Model
{
    use HasFactory;

    protected $fillable = [
        'warenkorb_id',
        'artikel_id',
    ];
}
