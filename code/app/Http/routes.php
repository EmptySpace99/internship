<?php

Router::get('/',['use'=>'HomeController@home']);

# 1) bug found route /tweet  ????
# 2) bug "PHP message: PHP Notice:  Undefined offset: 1 in /var/www/html/code/libs/Route/Route.php on line 103"

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