<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Tweets</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <style>
        .card-img-top {
            width: 100%;
            height: 10vh;
            object-fit: cover;
        }
    </style>

</head>
<body class='bg-dark '>
    <div class="container w-100 text-center p-5">
        <p class="h1 text-white mb-5">Tweets</p>

        <div class="row  row-cols-3"><?php

            foreach($allTweets as $t) {
                echo "
                <div class='col mb-5'>
                    <div class='card' data-id=".$t->id." style='width: 18rem;'>
                        <img src='public/assets/app-icons-twitter.png' class='card-img-top' alt='twitter-icon'>
                        <div class='card-body'>
                            <h5 class='card-title'>Tweet</h5>
                            <h6 class='card-subtitle mb-2 text-muted tweet-updated_at'>".$t->updated_at."</h6>
                            <p class='card-text tweet-content'>".$t->content."</p>
                            <div class='btn btn-primary edit-tweet'>Edit</div>
                            <div class='btn btn-primary delete-tweet'>Delete</div>
                        </div>
                    </div>
                </div>";
            }
        
        ?></div>

        
    </div>

    <script src="public/js/update.js"></script>
    <script src="public/js/delete.js"></script>
</body>
</html>