<?php namespace CodeComerce;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {

	protected $fillable = [
        'name',
        'description'
    ];

}
