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
    <title>Profile Edit</title>
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
                <img src="assets/images/<?php echo $_SESSION['image']; ?>" class="img-profile rounded-circle img-thumbnail" alt="Image Profile">
                <!-- Button trigger modal -->
                <button type="button" class="btn mx-auto d-block my-3 btn-primary" data-toggle="modal" data-target="#exampleModal">
                Change Avatar
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Upload Avatar</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="php/updateImage.php" method="POST" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="file" id="customFile">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                    <figure class="figure text-center d-none mt-2">
                                        <img id="imgUpload" class="figure-img img-fluid rounded" alt="">
                                    </figure>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <form id="formUpdate" method="POST" action="php/updateMember.php">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="firstname">User Name</label>
                                    <input type="text" class="form-control" id="username" name="username" value="<?php echo $row['username'] ?>" disabled>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="firstname">First Name</label>
                                    <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $row['firstname'] ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="lastname">Last Name</label>
                                    <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $row['lastname'] ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email">E-mail</label>
                                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $row['email'] ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="phone">Phone</label>
                                    <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $row['phone'] ?>"> 
                                </div>

                            </div>

                            <div class="form-group col-md-12">
                                <label for="address">Address</label>
                                <textarea class="form-control" id="address" name="address" rows="5"><?php echo $row['address'] ?></textarea> 
                            </div>

                            <a href="profile.php" class="btn btn-warning float-left">Return</a>
                            <input type="submit" name="submit" class="btn btn-primary float-right" value="Submit">
                        </form>
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
    <script src="node_modules/jquery-validation/dist/jquery.validate.min.js"></script>

    <script>
        $( document ).ready(function(){
            $('#formUpdate').validate({
                rules:{
                    firstname: 'required',
                    lastname: 'required',
                    email: {
                        required: true,
                        email: true
                    },
                    phone: {
                        required: true,
                        number: true,
                        maxlength: 20
                    },
                    address: 'required'
                },
                messages:{
                    firstname: 'This field is required',
                    lastname: 'This field is required',
                    email: {
                        required: 'Please enter your email',
                        email: 'Please enter a valid email'
                    },
                    phone: {
                        required: 'Please enter your Phone number',
                        number: 'Please enter a valid Phone number',
                        maxlength: 'Please enter no more than 20 characters'
                    },
                    address: 'This field is required'  
                },
                errorElement: 'div',
                errorPlacement: function ( error, element ){
                    error.addClass( 'invalid-feedback' )
                    error.insertAfter( element )
                },
                highlight: function ( element, errorClass, validClass ){
                    $( element ).addClass( 'is-invalid' ).removeClass( 'is-valid' )
                },
                uphighlight: function ( element, errorClass, validClass ){
                    $( element ).addClass( 'is-valid' ).removeClass( 'is-invalid' )
                }
            });
        });

        $('.custom-file-input').on('change', function(){
            var fileName = $(this).val().split('\\').pop()
            $(this).siblings('.custom-file-label').html(fileName)
            if (this.files[0]) {
                var reader = new FileReader()
                $('.figure').addClass('d-block')
                reader.onload = function (e) {
                    $('#imgUpload').attr('src', e.target.result).width(240)
                }
                reader.readAsDataURL(this.files[0])
            }
        })


    </script>

</body>
</html>