<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

use Sqits\UserStamps\Concerns\HasUserStamps;

class Category extends Model {
    use Translatable;
    protected $guarded = [];
    public $translatedAttributes = [ 'name' ];

    public function products() {
        return $this->hasMany( Product::class );
    }
}
