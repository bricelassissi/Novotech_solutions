<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MessageClient extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function artisan()
    {
        return $this->belongsTo(Artisan::class);
    }

    public function metier()
    {
        return $this->belongsTo(Metier::class);
    }
}
