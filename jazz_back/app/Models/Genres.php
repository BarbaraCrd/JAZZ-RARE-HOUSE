<?php

namespace App\Models;


use App\Models\Products;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Genres extends Model
{
    use HasFactory;

    protected $fillable = [

        'genreName',
    ];

    public function products(){

        return $this->hasMany(Products::class);
    }

    public $timestamps = false;

}
