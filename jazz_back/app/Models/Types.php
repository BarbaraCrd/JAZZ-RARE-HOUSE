<?php

namespace App\Models;


use App\Models\Products;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Types extends Model
{
    use HasFactory;

    protected $fillable = [

        'typeName',
    ];

    public function products(){

        return $this->hasMany(Products::class);
    }

    public $timestamps = false;

}
