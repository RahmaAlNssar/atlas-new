<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SectionContent extends Model
{
    use HasFactory;

    protected $fillable = ['id','name','section_id','type','new_line','is_title'];

    public function section(){
        return $this->belongsTo(Section::class,'section_id');
    }
    public function dropDown(){
        return $this->belongsTo(DropdownContent::class,'dropdown_id');
    }
   
}
