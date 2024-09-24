<?php
session_start();

if (isset($_POST['submit']))
{
    $user = "sean";
    $pass = "123";
    $username = $_POST['username'];
    $password = $_POST['password'];
    // reCAPTCHA verification
    $recaptcha_secret = "6Le0x00qAAAAABLE8KiicKna79ervAWqI0R7sHeS";
    $recaptcha_response = $_POST['g-recaptcha-response'];
    
    $verify_response = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);
    $response_data = json_decode($verify_response);
    
    if ($response_data->success) {
        
    } 
    
    else if ($recaptcha_response === "")
    {
        echo "<script>alert('Please Complete The Captchat');</script>";
    }

    else {
        if ($user === $username && $pass === $password)
        {
            echo "<script>window.location.href='./hello.php'</script>";
        }
    }
    
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script> <!-- reCAPTCHA API -->
    <title>Login</title>
</head>

<body>
    <div class="container d-flex align-items-center justify-content-center min-vh-100">
        <div class="row justify-content-center">
            <div class="col-md-6 w-100">
                <div class="card shadow">
                    <div class="card-body">
                        <form action="" method="POST">
                            <center><b><h3>Login</h3></b></center>
                            <div class="form-floating mb-3">
                                <input type="user" name="username" class="form-control" id="exampleInputEmail1"
                                    placeholder="name@example.com" required>
                                <label for="exampleInputEmail1">Email address</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                                    placeholder="Password" required>
                                <label for="exampleInputPassword1">Password</label>
                            </div>
                            <!-- reCAPTCHA widget -->
                            <div class="mb-3">
                                <div class="g-recaptcha" data-sitekey="6Le0x00qAAAAABLE8KiicKna79ervAWqI0R7sHeS"></div>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary w-100">Submit</button>
                            <a href="./contact.php">Go to contact</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>
