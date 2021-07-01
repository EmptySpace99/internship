<?php

require_once(__DIR__ . '/../../Models/Tweet.php');

class TweetController
{
    /*
    * Return all tweets
    */
    public function allTweets()
    {
        return  Response::json(Tweet::all());
    }

    public function allComments(Request $request, $id){
        if(is_null($id) || !is_numeric($id)) return Response::code(Response::HTTP_NOT_FOUND);
        $tweet = Tweet::first("id",$id);

        return Response::json($tweet->comments());
    }


    /*
    * Redirect to allTweets view
    */
    public function showTweets(){
        return new View('viewTweets.php', ['allTweets' => Tweet::all()]);
    }


    /*
    * Redirect to createTweet view
    */
    public function createTweet(){
        return new View("createTweet.php");
    }


    /*
    * Store tweet
    */
    public function storeTweet(Request $request){
        $content = trim($request->request->get('content'));

        if(is_null($content) || $content=="") return Response::code(Response::HTTP_NO_CONTENT);

        return Response::json(Tweet::create([
            'content' => $content,
        ]));
    }


    /*
    * Find tweet by id
    */
    public function readTweet(Request $request, $id){
        if(is_null($id) || !is_numeric($id)) return Response::code(Response::HTTP_NOT_FOUND);

        return Response::json(Tweet::first("id",$id));
    }


    /*
    * Update tweet by id (a request with patch method has paramters in the raw body data)
    */
    public function updateTweet(Request $request, $id){
        $content = json_decode($request->content, true)["content"];

        if(is_null($id) || !is_numeric($id) || is_null($content) || $content=="") return Response::code(Response::HTTP_NOT_FOUND);

        $tweet = Tweet::first("id",$id);
        $tweet->content = $content;

        if($tweet->save()) return  Response::json(Tweet::first("id",$id));
        
        return Response::code(Response::HTTP_NOT_FOUND);
    }


    /*
    * Delete tweet by id
    */
    public function deleteTweet(Request $request, $id){
        if(is_null($id) || !is_numeric($id)) return Response::code(Response::HTTP_NOT_FOUND);

        if(Tweet::destroy("id","=",$id)) return Response::code(Response::HTTP_NO_CONTENT);

        return Response::code(Response::HTTP_NOT_FOUND);
    }
}