<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Casal extends Model
{
    use HasFactory;

    protected $table = "casals";

    protected $fillable = [
        "nom",
        "data_inici",
        "data_final",
        "n_places",
        "ciutat_id",
    ];

    protected $casts = [
        "data_inici" => "datetime:d-m-Y",
        "data_final" => "datetime:d-m-Y",
    ];

    public function ciutat()
    {
        return $this->belongsTo(Ciutat::class, 'ciutat_id');
    }
}
