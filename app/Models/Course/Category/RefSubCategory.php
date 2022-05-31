<?php

namespace App\Models\Course\Category;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefSubCategory extends Model
{
    use HasFactory;

    protected $table = 'ref_sub_categories';

    protected $fillable = [
        'ref_categories_id',
        'name'
    ];

    public function ref_categories()
    {
        return $this->belongsTo(RefCategory::class, 'ref_categories_id');
    }
}
