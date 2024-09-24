<?php
session_start();

if (isset($_POST['submit']))
{
    $message = $_POST['message'];
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
        $_SESSION['message'] = $message;

        echo "<script>window.location.href='./index.php'</script>";
    }
    
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

</head>

<body>
    <div class="container d-flex align-items-center justify-content-center min-vh-100">
        <div class="row justify-content-center">
            <div class="col-md-6 w-100 h-100">
                <div class="card shadow custom-card"> <!-- Apply custom class for dimensions -->
                    <div class="card-body">
                        <!-- Contact Form Start -->
                        <form action="" method="post">
                            <center><b><h3>Contact</h3></b></center>
                            <!-- Name Input (floating label) -->
                            <div class="form-floating mb-3">
                                <input type="text" name="message" class="form-control" id="floatingName" placeholder="Your Name" required>
                                <label for="floatingName">Enter a message</label>
                            </div>

                            <!-- reCAPTCHA widget -->
                            <div class="mb-3">
                                <div class="g-recaptcha" data-sitekey="6Le0x00qAAAAABLE8KiicKna79ervAWqI0R7sHeS"></div>
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" name="submit" class="btn btn-primary w-100">Submit</button>
                            <a href="./index.php">Go to login</a>
                        </form>
                        <!-- Contact Form End -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
