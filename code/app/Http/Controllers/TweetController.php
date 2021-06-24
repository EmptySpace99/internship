<?php

require_once(__DIR__ . '/../../Models/Tweet.php');

class TweetController
{
    /*
    * Return all tweets
    */
    public function allTweets()
    {
        return Tweet::all();
    }

    /*
    * Redirect to allTweets view
    */
    public function showTweets(){
        return new View('viewTweets.php', ['allTweets' => self::allTweets()]);
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

        if(is_null($content) || $content=="") return;

        return Tweet::create([
            'content' => $content,
        ]);

    }

    /*
    * Find tweet by id
    */
    public function readTweet(Request $request, $id){
        if(is_null($id)) return;

        return Tweet::first("id",$id);
    }


    /*
    * Update tweet by id
    */
    public function updateTweet(Request $request){
        $vars = $request->query;
        $content = trim($vars->get('content'));
        $id = $vars->get('id');

        if(is_null($id) || is_null($content) || $content=="") return Response::code(Response::HTTP_NOT_FOUND);

        return Tweet::update(array(
            "id"=>$id,
            "content"=>$content
        ));
    }


    /*
    * Delete tweet by id
    */
    public function deleteTweet(Request $request, $id){
        if(is_null($id)) return Response::code(Response::HTTP_NOT_FOUND);

        Tweet::delete("id",$id);
        return Response::code(Response::HTTP_NO_CONTENT);
    }
}