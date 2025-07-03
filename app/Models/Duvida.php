<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Duvida extends Model
{
    use HasFactory;
    protected $fillable = ['titulo', 'descricao', 'status', 'categoria_id', 'user_id'];

    public function categorias(): HasMany
    {
        return $this->hasMany(Categoria::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
