<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'user_id',
        'latitude',
         'longitude',
         'text',
         'description',
         'url_instagram',
         'url',
         'category_id',
         'image',
         'phone_number',
         'whatsapp',
         'rating',
         'age',
         'bday',
         'gender'
    ];
    protected $guarded =[];

    public function category()
    {
        return $this->hasOne('App\Category');
    }
    public function user()
    {
      return $this->belongsTo(User::class);
    }
}
