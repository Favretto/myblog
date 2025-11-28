<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MyBlog extends Model
{
    use HasFactory;

    // Nome della tabella esistente
    protected $table = 'messaggi';

    // Colonne che possono essere assegnate in massa
    protected $fillable = [
        'nome',
        'email',
        'oggetto',
        'codice_componente',
        'messaggio',
    ];

    // Se vuoi gestire i timestamp automaticamente (created_at, updated_at)
    public $timestamps = true;
}
