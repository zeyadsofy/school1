<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parentt extends Model
{
    use HasFactory;
    public $translatable = ['Name_Father','Job_Father'];
    protected $table = 'parentt';

    protected $fillable = [
        'Email',
        'Password',
        'Name_Father',
        'National_ID_Father',
        'Phone_Father',
        'Job_Father',
        'Address_Father'
    ];
}
