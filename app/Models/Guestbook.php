<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guestbook extends Model
{
    protected $fillable = [
        'name',
        'message'
    ];

    public function search($search)
    {
        return $this->where('name', 'like', "%{$search}%")
            ->orWhere('message', 'like', "%{$search}%");
    }
}
