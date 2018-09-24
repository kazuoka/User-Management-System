<?php
    require_once('php/connect.php');
    if (!isset($_SESSION['id'])) {
        header('location:index.php');
    }

    $sql = "SELECT * FROM `members` WHERE `id` = '".$_SESSION['id']."' ";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    if(!$result->num_rows){
        header('location:index.php');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="node_modules/font-awesome5/css/fontawesome-all.css">
    <title>Profile</title>
    <style>
        .img-profile{
            width: 150px;
            height: 150px;
            margin: 0 auto;
            display: block;
        }
        .profile-top{
            margin-top: -100px;
        }
    </style>
</head>
<body>
    <?php include_once('includes/navbar.php')?>

    <section class="jumbotron jumbotron-fluid text-center">
        <div class="container my-5 my-sm-1">
            <h1>Profile</h1>
        </div>
    </section>

    <section class="container my-3">
        <div class="row">
            <div class="col-12 profile-top">
                <img src="assets/images/<?php echo $row['image']; ?>" class="my-3 img-profile rounded-circle img-thumbnail" alt="Image Profile">
                
                <div class="card">
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="firstname">User Name</label>
                                <input type="text" class="form-control" id="username" value="<?php echo $row['username']; ?>" disabled>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="firstname">First Name</label>
                                <input type="text" class="form-control" id="firstname" value="<?php echo $row['firstname']; ?>" disabled>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="lastname">Last Name</label>
                                <input type="text" class="form-control" id="lastname" value="<?php echo $row['lastname']; ?>" disabled>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email">E-mail</label>
                                <input type="email" class="form-control" id="email" value="<?php echo $row['email']; ?>" disabled>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control" id="phone" value="<?php echo $row['phone']; ?>" disabled> 
                            </div>

                            <div class="form-group col-md-12">
                                <label for="address">Address</label>
                                <textarea class="form-control" id="address" rows="5" disabled><?php echo $row['address']; ?></textarea> 
                            </div>

                            <a href="profile-edit.php" class="btn btn-warning float-right">Edit data</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="card bg-dark text-center py-3 text-white">
        @ Copyright 2018<a href="https://generalkazuoka.blogspot.kr/">kazuoka</a>
    </footer>

    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>