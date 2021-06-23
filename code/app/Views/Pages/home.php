<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo($app) ?></title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="css/home.css" rel="stylesheet" type="text/css">

    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>
<body>
    <div class="flex-center column">
        <div class="title m-b-md">
            <div><?php echo $app?></div>
        </div>

        <div class="container column">
            <textarea name="tweet-area" id="tweet-area" cols="30" rows="10"></textarea>
            <button id='publish-tweet'>Publish</button>
        </div>
    </div>

    <script src="js/publish.js"></script>
    <script src="js/tweet.js"></script>
</body>
</html>