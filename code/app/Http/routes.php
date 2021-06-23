<?php

Router::get('/',['use'=>'HomeController@home']);

# 1) bug found route /tweet  ????
# 2) bug PHP message: PHP Notice:  Undefined offset: 1 in /var/www/html/code/libs/Route/Route.php on line 103

Router::get('/tweets',['use'=>'TweetController@allTweets']);
Router::get('/tweet/create',['use'=>'TweetController@createTweet']);
Router::post('/tweet/store',['use'=>'TweetController@storeTweet']);
Router::get('/tweet/read',['use'=>'TweetController@readTweet']);
Router::patch('/tweet/update',['use'=>'TweetController@updateTweet']);
Router::delete('/tweet/delete',['use'=>'TweetController@deleteTweet']);