<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function SectionContent(){
        return $this->hasMany(SectionContent::class,'section_id');
    }

    public function contracts(){
        return $this->belongsToMany(Contract::class,'contruct_section');
    }
}
