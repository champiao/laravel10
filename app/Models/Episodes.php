<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Season as Seasons;
class Episodes extends Model
{
    use HasFactory;
    protected $timestamps = false;

    public function seasons()
    {
        return $this->belongsTo(Seasons::class);
    }
}
