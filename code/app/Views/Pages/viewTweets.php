<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Tweets</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="public/css/createTweet.css" rel="stylesheet" type="text/css">

</head>
<body>
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md">
                Tweets
            </div>

            <div><?php

                foreach($allTweets as $t) {
                    echo "<div><br>Tweet:<br>
                    id:". $t->id."<br>
                    content:". $t->content."<br>
                    created_at:". $t->created_at."<br>
                    modified_at:". $t->updated_at ."<br>
                    <div> <button id='modify-tweet'> <b>Modify</b> </button> 
                    <button id='delete-tweet'> <b>Delete</b> </button> </div> 
                    </div><br>";
                }
            
            ?></div>
        </div>
    </div>
</body>
</html>