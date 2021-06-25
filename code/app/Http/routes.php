<?php

Router::get('/',['use'=>'HomeController@home']);

# 1) bug "PHP message: PHP Notice:  Undefined offset: 1 in /var/www/html/code/libs/Route/Route.php on line 103"

Router::get('/tweets',['use'=>'TweetController@showTweets']);
Router::get('/tweet',['use'=>'TweetController@createTweet']);

/*
* Tweet API
*/
Router::get('/api/tweet',['use'=>'TweetController@allTweets']);
Router::post('/api/tweet',['use'=>'TweetController@storeTweet']);
Router::get('/api/tweet/{id}',['use'=>'TweetController@readTweet']);
Router::patch('/api/tweet/{id}',['use'=>'TweetController@updateTweet']);
Router::delete('/api/tweet/{id}',['use'=>'TweetController@deleteTweet']);

/*
* Comment API
*/
Router::get('/api/comment/all/{tweet_id}',['use'=>'CommentController@allComments']);
Router::post('/api/comment',['use'=>'CommentController@storeComment']);
Router::get('/api/comment/{id}',['use'=>'CommentController@readComment']);
Router::patch('/api/comment/{id}',['use'=>'CommentController@updateComment']);
Router::delete('/api/comment/{id}',['use'=>'CommentController@deleteComment']);