<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invitation extends Model
{
    protected $fillable = [
        'name',
        'quota',
        'attendance',
        'identifier',
    ];

    protected $casts = [
        'quota' => 'string',
    ];

    public function search($search)
    {
        return $this->where('name', 'like', "%{$search}%");
    }
}
