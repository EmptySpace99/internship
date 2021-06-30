<?php

require_once(__DIR__ . '/../../libs/Model/Model.php');

class Comment extends Model{

    /**
     * Get the tweet that owns the comment.
    */
    public function tweet() {
        return $this->hasOne(Tweet::class);
    }
}