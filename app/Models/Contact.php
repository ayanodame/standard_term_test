<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable =['last_name','first_name','gender','email','postcode','address','building_name','opinion'];
    public static $rules =array(
        'last_name'=>'required|max:255',
        'first_name'=>'required|max:255',
        'gender'=>'required',
        'email'=>'required|email',
        'postcode'=>'required',
        'address'=>'required',
        'opinion'=>'required|max:120',
    );
}
