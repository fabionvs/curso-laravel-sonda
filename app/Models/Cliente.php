<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use  App\Models\User;

class Cliente extends Model
{
    use HasFactory;

    protected $table = 'tb_cliente';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'cpf',
        'endereco',
        'user_id'
    ];

    /**
     * Get the user record associated with the cliente.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
