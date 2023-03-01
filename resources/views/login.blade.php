<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Cocktail Recipe Portal</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    </head>
    <body>
    <div class="container">
        <section class="h-100 gradient-form" style="background-color: #eee;">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-xl-10">
                    <div class="card rounded-3 text-black">
                    <div class="row g-0">
                        <div class="col-lg-6">
                        <div class="card-body p-md-5 mx-md-4">

                            <div class="text-center">
                            <!-- <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/lotus.webp"
                                style="width: 185px;" alt="logo"> -->
                            <h4 class="mt-1 mb-5 pb-1">Cocktail Recipe Portal</h4>
                            </div>

                            <form>
                            <!-- <p>Please login to your account</p> -->

                            <div class="form-outline mb-4">
                                <input type="email" id="email" class="form-control"
                                placeholder="Please Enter Your Email" />
                                <!-- <label class="form-label" for="form2Example11">Username</label> -->
                            </div>

                            <div class="form-outline mb-4">
                                <input type="password" id="password" class="form-control" placeholder="Please Enter Your Password" />
                                <!-- <label class="form-label" for="form2Example22">Password</label> -->
                            </div>

                            <div class="text-center pt-1 mb-5 pb-1">
                                <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" id="loginBtn" type="button">Log
                                in</button>
                                <!-- <a class="text-muted" href="#!">Forgot password?</a> -->
                            </div>

                            <div class="d-flex align-items-center justify-content-center pb-4">
                                <p class="mb-0 me-2">Don't have an account?</p>
                                <button type="button" class="btn btn-outline-danger" id="createNew">Create new</button>
                            </div>

                            </form>

                        </div>
                        </div>
                        <!-- <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                        <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                            <h4 class="mb-4">We are more than just a company</h4>
                            <p class="small mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                            exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        </div>
                        </div> -->
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </section>
    </div>
<!-- Pills content -->
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script>
    $(document).ready(function(){
        let session = sessionStorage.getItem('user');
        if(session == "login"){
            window.location = "/listing";

        }
    });



    $('#loginBtn').click(function(){

        let email = $('#email').val();
        let password = $('#password').val();

        let url = "api/loginUser";
        let data = { "email" : email, "password": password };

        $.ajax({
        type: "POST",
        url: url,
        data: data,
        success: function(response){
            if(response.status == 200){
                sessionStorage.setItem("user","login");
                window.location = 'listing';
            }


        }
        });
    });

    $('#createNew').click(function(){
        window.location = 'register';
    });
</script>
</html>
