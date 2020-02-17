<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'user_id','latitude', 'longitude','text','description','url','category_id','image'
    ];
    protected $guarded =[];

    public function category()
    {
        return $this->hasOne('App\Category');
    }
}
