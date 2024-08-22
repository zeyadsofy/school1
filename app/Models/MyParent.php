<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Foundation\Auth\User as Authenticatable;

class MyParent extends Authenticatable
{
    use HasTranslations;
    public $translatable = ['Name_Father',"Job_Father"];

    protected $fillable=[
    "Name_Father" ,
    "Name_Father_en" , 
    "Email",
    "Password",
    'National_ID_Father',
    'Phone_Father',
    'Job_Father',
    'Job_Father_en',
    'Address_Father'];
    protected $table = 'my__parents';
    public $timestamps = true;


}
