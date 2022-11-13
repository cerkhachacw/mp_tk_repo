<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryGroup extends Model
{
    use HasFactory;

    protected $table = 'category_groups';
    protected $guarded = ['id'];

    public function categories()
    {
        return $this->hasMany(Category::class, 'category_group_id');
    }
}
