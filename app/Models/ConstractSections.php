<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConstractSections extends Model
{
    use HasFactory;

    public $table = "contruct_section";
    protected $fillable = ['contruct_id','section_id'];
}
