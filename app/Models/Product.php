<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categ;
use App\Models\Avi;

class Product extends Model

{  protected $table = 'products';
     protected $fillable = [
     'id',
    'name',
    'adresse',
    'pays',
    'ville',
    'entreprise',
      'image',
    'category_id',
];

public function category()
{
    return $this->belongsTo(Categ::class);
}



public function reviews()
{
    return $this->hasMany(Review::class ,'product_id','id');
}


}
