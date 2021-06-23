<?php

require_once(__DIR__ . '/../../Models/Tweet.php');

class TweetController
{
    public function allTweets()
    {
        $tweets = Tweet::all();

        return new View('viewTweets.php', ['allTweets' => $tweets]);
    }

    /*
    * Redirect to createTweet view
    */
    public function createTweet(){
        return new View("createTweet.php");
    }

    /*
    * Store tweet in db and redirect to visualize all tweets
    */
    public function storeTweet(Request $request){
        $content = trim($request->request->get('content'));

        if(is_null($content) || (!is_null($content) && $content=="")) return;

        Tweet::create([
            'content' => $content,
        ]);
  
        return Response::redirect(explode("/",$request->uri)[0]."/tweets");
    }

    /*
    * Find tweet by id
    */
    public function readTweet(Request $request){
        $id = $request->request->get("id");
        if(is_null($id)) return;

        $tweet = Tweet::first("id",$request->query->get($id));

        return new View('viewTweets.php', ['allTweets' => compact($tweet)]);
    }

    /*
    * Update tweet just for content value
    */
    public function updateTweet(Request $request){
        $vars = $request->request;
        $content = trim($vars->get('content'));
        $id = $vars->get('id');

        if(is_null($id) || is_null($content) || (!is_null($content) && $content=="")) return;

        $tweet = Tweet::update(array("id","content"=>$content,"modified_at"=>"CURRENT_TIMESTAMP()"));

        return Response::redirect(explode("/",$request->uri)[0]."/tweets");
    }

    /*
    * Delete tweet by id
    */
    public function deleteTweet(Request $request){
        if(is_null($request->request->get($id))) return;

        $tweet = Tweet::delete("id",$request->query->get("id"));

        return Response::redirect(explode("/",$request->uri)[0]."/tweets");
    }
}