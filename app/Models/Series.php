<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Prompts\Table;
use App\Models\Season as Season;
use Illuminate\Database\Query\Builder;

class series extends Model
{
    use HasFactory;
    protected $table = 'series';
    public $timestamp = true;
    protected $fillable = ['name'];
    public  function seasons(){
        return $this->hasMany(Season::class, 'id');
    }
}