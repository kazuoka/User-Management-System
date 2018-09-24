<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="node_modules/font-awesome5/css/fontawesome-all.css">
    <title>HOME PAGE</title>
</head>
<body>
    
    <?php include_once('includes/navbar.php')?>
    <div class="jumbotron jumbotron-fluid text-center">
        <div class="container">
            <h1 class="display-4">Welcome to GeneralKazuoka</h1>
            <p class="lead">This is a modified GeneralKazuoka that occupies the entire horizontal space of its parent.</p>
        </div>
    </div>

    <section class="container py-5">
        <div class="row">
            <div class="col-12">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </section>

    <div class="jumbotron jumbotron-fluid text-center">
        <div class="container">
            <h1 class="display-4">I hope so</h1>
            <p class="lead">Workshop PHP + Bootstrap4</p>
        </div>
    </div>

    <footer class="card bg-dark text-center py-3 text-white">
        @ Copyright 2018<a href="https://generalkazuoka.blogspot.kr/">kazuoka</a>
    </footer>



    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>