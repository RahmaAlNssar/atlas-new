<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name','parent_id','has_data','exist'];
    protected $parentColumn = 'parent_id';

    public function contract(){
        return $this->hasMany(Contract::class,'cat_id');
    }

    public function someFunction()
    {
        return $this->table();

    }

    public function parent()
    {
        return $this->belongsTo(Category::class,$this->parentColumn);
    }

    public function children()
    {
        return $this->hasMany(Category::class, $this->parentColumn);
    }

    public function allChildren()
    {
        return $this->children()->with('allChildren');
    }

    public function status(){
        return $this->exist == 1
            ? '<a href="' . route('admin.categories.status', $this->id) . '"class="btn btn-success btn-sm visibility-toggle"> <span class="badge bg-success"> مرئي</span></a>'
            : '<a href="' . route('admin.categories.status', $this->id) . '"class="btn btn-danger btn-sm visibility-toggle">  <span class="badge bg-danger"> غير مرئي</span></a>';
    }
}
