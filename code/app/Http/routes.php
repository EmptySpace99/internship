<?php

Router::get('/',['use'=>'HomeController@home']);
Router::get('/home',['use'=>'HomeController@home']);

Router::post('/tweet/create',['use'=>'TweetController@createTweet']);
Router::get('/tweet/read',['use'=>'TweetController@readTweet']);
Router::patch('/tweet/update',['use'=>'TweetController@updateTweet']);
Router::delete('/tweet/delete',['use'=>'TweetController@deleteTweet']);