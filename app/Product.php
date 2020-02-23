<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

use Sqits\UserStamps\Concerns\HasUserStamps;

class Product extends Model
{
    use Translatable;
    //   use HasUserStamps;


    protected $guarded = ['id'];

    public $translatedAttributes = ['name', 'description'];

    public function category()
    {
        return $this->belongsTo(Category::class);

    }

    public function getImagePathAttribute()
    {
        return asset('uploads/product_images/' . $this->image);

    }//end of image path attribute
}
