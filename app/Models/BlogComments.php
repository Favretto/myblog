<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogComments extends Model
{
    use HasFactory;

    // Nome della tabella
    protected $table = 'comments';

    // Colonne assegnabili in massa
    protected $fillable = [
        'blog_id',
        'user_id',
        'testo',
    ];

    // Timestamp (created_at, updated_at) attivi
    public $timestamps = true;
	
	 /**
     * Relazione: un commento appartiene a un Blog
     */
    public function blog()
    {
        return $this->belongsTo(MyBlog::class, 'blog_id');
    }

    /**
     * Relazione: un commento appartiene a un Utente
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

