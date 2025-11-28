<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogLog extends Model
{
    use HasFactory;

    // Nome della tabella
    protected $table = 'blog_logs';

    // Colonne assegnabili in massa
    protected $fillable = [
        'user_id',
        'blog_id',
        'azione',
        'dati',
    ];

    // Cast automatico del JSON in array (per il log)
    protected $casts = [
        'dati' => 'array',
    ];

    // Timestamp (created_at, updated_at) attivi
    public $timestamps = true;
}
