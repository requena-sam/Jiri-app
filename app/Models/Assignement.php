<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignement extends Model
{
    use HasFactory;
    public function jiri()
    {
        return $this->belongsTo(Jiri::class);
    }
}
