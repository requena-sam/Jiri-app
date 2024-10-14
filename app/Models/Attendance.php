<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = [
        "role"
    ];

    public function jiri()
    {
        return $this->belongsTo(Jiri::class);
    }
}
