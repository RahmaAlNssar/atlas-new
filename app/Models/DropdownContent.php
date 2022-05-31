<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DropdownContent extends Model
{
    use HasFactory;

    protected $table = "dropdown_content";

   protected $fillable = ['dropdown_id','name','section_id'];

   public function section(){
    return $this->belongsTo(Section::class,'section_id');
}

public function section_content(){
    return $this->belongsTo(SectionContent::class,'dropdown_id');
}
}
