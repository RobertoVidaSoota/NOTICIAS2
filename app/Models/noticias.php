<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Noticias extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'link_imagem',
        'informacao_adicional',
        'conteudo_total',
        'fk_id_users'
    ];

    protected $casts = [
        "fk_id_users"
    ];

    public function user()
	{
		return $this->belongsTo(User::class, 'fk_id_users');
	}

	public function comentarios()
	{
		return $this->hasMany(Comentario::class, 'fk_id_noticias');
	}
}
