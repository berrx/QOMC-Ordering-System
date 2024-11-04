<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasDateTimeFormatter;
    protected $table = 'category';
    public $timestamps = false;

    public function products()
    {
        return $this->hasMany(Product::class, 'cate_id');
    }
}
