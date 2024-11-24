<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pudding extends Model
{
    use HasFactory;
    protected $guarded = array('id');

    public static $rules = array(
        'shop_name' => 'required',
        'shop_introduction' => 'required',
        'officialsite'=> 'required',
        'googlemaplink'=> 'required',
        'pets_allowed'=> 'required',
        'reservations_allowed'=> 'required',
        'shop_address'=> 'required',
    );

     // Pudding Modelに関連付けを行う
     public function histories()
     {
         return $this->hasMany('App\Models\History');
     }
}