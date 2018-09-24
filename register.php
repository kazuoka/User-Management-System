<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="node_modules/font-awesome5/css/fontawesome-all.css">
    <title>Register</title>
</head>
<body>

    <?php include_once('includes/navbar.php')?>
    <div class="container">
        <div class="row">
            <div class="offset-md-3 col-md-6 mt-5">
                <div class="card">
                    <h5 class="card-header text-center">Register</h5>
                    <div class="card-body">
                        <form class="form" id="formRegister" method="post" action="php/createMember.php">
                            
                            <div class="input-group mb-2 mr-sm-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-user"></i></div>
                                </div>
                                <input type="text" class="form-control" id="firstname" name="firstname" placeholder="First Name">
                            </div>

                            <div class="input-group mb-2 mr-sm-2"> 
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-user"></i></div>
                                </div>
                                <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last Name">
                            </div>

                            <div class="input-group mb-2 mr-sm-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-envelope"></i></i></div>
                                </div>
                                <input type="text" class="form-control" id="email" name="email" placeholder="example@email.com">
                            </div>

                            <div class="input-group mb-2 mr-sm-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-phone"></i></i></div>
                                </div>
                                <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone number">
                            </div>

                            <div class="input-group mb-2 mr-sm-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-user"></i></div>
                                </div>
                                <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                            </div>

                            <div class="input-group mb-2 mr-sm-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-key"></i></div>
                                </div>
                                <input type="Password" class="form-control" id="password" name="password" placeholder="Password">
                            </div>

                            <div class="input-group mb-2 mr-sm-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-key"></i></div>
                                </div>
                                <input type="Password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm Password">
                            </div>

                            <div class="form-group mb-2 mr-sm-2">
                                <div class="g-recaptcha" data-callback="recaptchaCallback" data-sitekey="6Ldj9VwUAAAAAOGfU3ifd39bTztNoPUaxap4pEht"></div>
                            </div>
                            
                            <button type="submit" name="submit" id="submit" disabled class="btn btn-primary btn-block mb-2">Submit</button>
                            <span class="float-right">Already have an account? <a href="login.php">Login</a></span>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="node_modules/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <script>
        //formRegister
        $( document ).ready(function(){
            $('#formRegister').validate({
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
                    username: {
                        required: true,
                        minlength: 4 
                    },
                    password: {
                        required: true,
                        minlength: 4 
                    },
                    confirm_password: {
                        required: true,
                        minlength: 4,
                        equalTo: '#password'  
                    }
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
                    username: {
                        required: 'Please enter your Username',
                        minlength: 'Not less than 4 characters'
                    },
                    password: {
                        required: 'Please enter your Password',
                        minlength: 'Not less than 4 characters' 
                    },
                    confirm_password: {
                        required: 'Please enter your Password',
                        minlength: 'Not less than 4 characters',
                        equalTo: 'Please enter a Password'
                    } 
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
        })

        function recaptchaCallback(){
            $('#submit').removeAttr('disabled');
        }
    </script>
</body>
</html>