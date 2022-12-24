<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Installation extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function client() {
        return $this->belongsTo(User::class);
    }

    public function installator() {
        return $this->belongsTo(User::class);
    }

}
