<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $guarded = ['id'];

    public function categoryGroup()
    {
        return $this->belongsTo(CategoryGroup::class, 'category_group_id');
    }

    public function books()
    {
        return $this->hasMany(Book::class, 'category_id');
    }
}
