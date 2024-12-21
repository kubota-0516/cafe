<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Toast extends Model
{
    use HasFactory;
    protected $guarded = array('id');

    public static $rules = array(
        'shop_name' => 'required',
        'shop_introduction' => 'required',
        'officialsite'=> 'required',
        'pets_allowed'=> 'required',
        'reservations_allowed'=> 'required',
        'shop_address'=> 'required',
    );

}