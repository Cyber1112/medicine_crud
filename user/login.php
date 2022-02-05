<?php

include('../api/user/user.php');
include('../api/config/app.php');
include('../api/functions/login.php');

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/st.css?v=<?php echo time(); ?>">
    <title>Hello, world!</title>
  </head>
  <body>
    <section class="Form my-4 mx-5">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-lg-5 img-container">
                    <img src="../assets/images/healthylife.jpg" class="img-fluid" alt="">
                </div>
                <div class="col-lg-7 px-5 pt-5">
                    <h1 class="font-weight-bold py-3">LOGO</h1>
                    <h4>LOG IN</h4>
                    <p><?php include('../message.php')?></p>
                    <form action="" method="POST">
                        <div class="form-row">
                            <div class="col-lg-7">
                                <input type="email" name="email" placeholder="Email" class="form-control my-3 p-3">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-7">
                                <input type="password" name="password" placeholder="Password" class="form-control my-3 p-3">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-lg-7">
                                <button type="submit" name="login_btn" class="btn1 mt-3 mb-5">Login</button>
                            </div>
                        </div>

                        <a href="#">Forgot password</a>

                        <p>Don't have an account <a href="<?= base_url('user/register.php')?>">Register</a></p>
                    </form>
                </div>
            </div>
        </div>
    </section>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
   
  </body>
</html>