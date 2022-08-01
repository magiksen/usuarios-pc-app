<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Usuario extends Model
{
    use HasFactory, Searchable;

    protected $fillable = [
        'usuario',
        'pcnombre',
        'departamento',
        'mac',
        'ip'
    ];

    public function toSearchableArray()
    {
        return [
            'usuario' => $this->usuario,
            'pcnombre' => $this->pcnombre,
            'departamento' => $this->departamento,
            'mac' => $this->mac,
            'ip' => $this->ip
        ];
    }
}
