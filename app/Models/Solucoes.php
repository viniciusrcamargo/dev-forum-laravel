<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solucoes extends Model
{
    use HasFactory;
    protected $fillable = ['titulo', 'descricao', 'status', 'duvida_id', 'user_id' ];

    public function duvida(): BelongsTo
    {
        return $this->belongsTo(Duvida::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
