<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Produit;
class Produit extends Model
{
    protected $table = 'produits';
    protected $fillable =['name',	'adresse',	'pays',	'ville',	'entreprise',	'image','category_id'];
}
