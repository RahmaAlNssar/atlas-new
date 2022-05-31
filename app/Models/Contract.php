<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;
    public $table = "contracts";
    protected $fillable = ['name','cat_id','exist'];

    public function category(){
        return $this->belongsTo(Category::class,'cat_id');
    }

    public function sections(){
        return $this->belongsToMany(section::class,'contruct_section');
    }

    public function status(){
        return $this->exist == 1
            ? '<a href="' . route('admin.contracts.status', $this->id) . '"class="btn btn-success btn-sm visibility-toggle"> <span class="badge bg-success"> مرئي</span></a>'
            : '<a href="' . route('admin.contracts.status', $this->id) . '"class="btn btn-danger btn-sm visibility-toggle">  <span class="badge bg-danger"> غير مرئي</span></a>';
    }
}
