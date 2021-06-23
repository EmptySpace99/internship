<?php

require_once(__DIR__ . '/../../libs/Model/Model.php');

class Tweet extends Model{

    //The fillable property is used to represent mass assignable attributes for our model
    protected $fillable = [
        'content',
    ];

    
}