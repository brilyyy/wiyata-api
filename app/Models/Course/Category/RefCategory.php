<?php

namespace App\Models\Course\Category;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefCategory extends Model
{
    use HasFactory;

    protected $table = 'ref_categories';

    protected $fillable = [
        'name'
    ];

    public function ref_sub_categories()
    {
        return $this->hasMany(RefSubCategory::class, 'ref_categories_id');
    }
}
