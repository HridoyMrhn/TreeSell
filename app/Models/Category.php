<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function subCategory(){
        return $this->hasMany(Category::class, 'id', 'parent_id')->with('subCategory');
    }

    public function trees(){
        return $this->hasMany(Tree::class);
    }
}
