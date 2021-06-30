<?php

require_once(__DIR__ . '/../../libs/Model/Model.php');

class Tweet extends Model{
    
    /**
     * Get the comments for the tweet
    */
    public function comments() {
        return $this->hasMany(Comment::class);
    }
}