<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comentarios extends Model
{
    use HasFactory;

    protected $fillable = [
        'texto_comentario',
        'fk_id_users',
        'fk_id_noticias'
    ];

    protected $casts = [
		'fk_id_noticias' => 'int',
        'fk_id_users' => 'int'
	];

    public function noticia()
	{
		return $this->belongsTo(Noticia::class, 'fk_id_noticias');
	}

    public function user()
    {
        return $this->belongsTo(User::class, 'fk_id_users');
    }
}
