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

    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>
<body>
    <div class="flex-center position-ref">
        <div class="content">
            <div class="title m-b-md">
                Tweets
            </div>

            <div><?php

                foreach($allTweets as $t) {
                    echo "<div><b>Tweet:</b>
                    <div>id:<span class='tweet-id'>". $t->id."</span></div>
                    <div>content:<span class='tweet-content'>". $t->content."</span></div>
                    <div>created_at:". $t->created_at."</div>
                    <div>modified_at:". $t->updated_at ."</div>
                    <div> <button class='modify-tweet'> <b>Modify</b> </button> 
                    <button class='delete-tweet'> <b>Delete</b> </button> </div> 
                    </div><br>";
                }
            
            ?></div>
        </div>
    </div>

    <script src="public/js/update.js"></script>
    <script src="public/js/delete.js"></script>
</body>
</html>