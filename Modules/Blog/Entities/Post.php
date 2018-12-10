<?php

namespace Modules\Blog\Entities;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	protected $table = 'posts';
    protected $fillable = ['titulo', 'descricao', 'imagem'];
}
