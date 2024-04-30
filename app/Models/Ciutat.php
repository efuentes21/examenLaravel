<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ciutat extends Model
{
    use HasFactory;

    protected $table = "ciutats";

    protected $fillable = [
        "nom",
        "n_habitants",
    ];

    public function casals()
    {
        return $this->hasMany(Casal::class);
    }
}
