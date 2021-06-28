<?php

require_once(__DIR__ . "/../../Models/Comment.php");
require_once(__DIR__ . "/../../Models/Tweet.php");

class CommentController
{
    /*
    * Return all comments
    */
    public function allComments(Request $request, $tweet_id)
    {

        if(is_null($tweet_id)) return Response::code(Response::HTTP_NOT_FOUND);

        Comment::innerJoin(Tweet::class,"tweet_id","=","id");
        return  Response::json(Comment::whereWithQuery("tweet_id","=", $tweet_id));
    }


    /*
    * Store comment
    */
    public function storeComment(Request $request){
        $vars = $request->request;
        $content = trim($vars->get("content"));
        $tweet_id = $vars->get("tweet_id");

        if(is_null($tweet_id) || is_null($content) || $content=="") return Response::code(Response::HTTP_NO_CONTENT);

        return Response::json(Comment::create([
            "tweet_id" => $tweet_id,
            "content" => $content,
        ]));
    }


    /*
    * Find comment by id
    */
    public function readComment(Request $request, $id){
        if(is_null($id)) return Response::code(Response::HTTP_NOT_FOUND);

        $comment = Comment::first("id",$id);
        return Response::json(is_null($comment) ? compact("") : $comment);
    }


    /*
    * Update comment by id (a request with patch method has paramters in the raw body data)
    */
    public function updateComment(Request $request, $id){
        $content = json_decode($request->content, true)["content"];

        if(is_null($id) || is_null($content) || $content=="") return Response::code(Response::HTTP_NOT_FOUND);

        $comment = Comment::first("id",$id);
        $comment->content = $content;

        if($Comment->save()) return  Response::json(Comment::first("id",$id));
        
        return Response::code(Response::HTTP_NOT_FOUND);
    }


    /*
    * Delete comment by id
    */
    public function deleteComment(Request $request, $id){
        if(is_null($id)) return Response::code(Response::HTTP_NOT_FOUND);

        if(comment::destroy("id","=",$id)) return Response::code(Response::HTTP_NO_CONTENT);

        return Response::code(Response::HTTP_NOT_FOUND);
    }
}