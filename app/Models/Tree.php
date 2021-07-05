<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tree extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function treeWithCategeoy(){
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function multipleImage(){
        return $this->hasMany(MultipleImage::class);
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
