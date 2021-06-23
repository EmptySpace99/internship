<?php

require_once(__DIR__ . '/../../Models/TweetModel.php');

class TweetController
{
    public function createTweet(Request $request){
        
        $result = TweetModel::create($request->request);
        echo json_encode($result);
    }

    public function readTweet(Request $request){
        #$result = TweetModel::read();

        #return new View('read.php','result');
    }

    public function updateTweet(Request $request){
        #$result = TweetModel::update();

        #return new View('update.php','result');
    }

    public function deleteTweet(Request $request){
        #$result = TweetModel::delete();

        #return new View('delete.php','result');
    }
}