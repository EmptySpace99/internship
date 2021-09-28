<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Create Tweet</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="../public/css/createTweet.css" rel="stylesheet" type="text/css">

    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>
<body>
    <div class="flex-center position-ref full-height">
        <div class="column m-auto text-center">
            <h1 class="m-b-50">Create a tweet:</h1>
            <div class='column tweet-container flex-center'>
                <textarea class="full-width m-b-30" name="tweetArea" id="tweetArea" cols="30" rows="10" placeholder="Insert tweet content..."></textarea>
                <button id="publish-tweet"> <b>Publish</b> </button>
            </div>
           
        </div>
    </div>

    <script src="../public/js/publish.js"></script>
</body>
</html>