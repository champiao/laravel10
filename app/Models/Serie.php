<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Prompts\Table;

class Serie extends Model
{
    use HasFactory;
    protected $table = 'serie';
    public $timestamp = true;
    protected $fillable = ['name'];
}
