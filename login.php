<?php
	include "lib/Session.php";
	Session::checkLogin();
    include "config/config.php";  
    include "lib/Database.php";  
    include "helpers/Format.php"; 
	$db = new Database(); 
	$fm = new Format(); 
?>

<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <title>Login Page</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="<?php echo URL; ?>/assets/css/bootstrap.min.css">
        <style>
        .container {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card {
            width: 400px;
        }

        body {
            background-image: url('path/to/your/image.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .container {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        </style>
    </head>

    <body>

        <div class="container">
            <div class="box box-info">
                <div class="box-header">

                </div>

                <div class="box-body">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title text-center">Login</h5>
                            <form id="loginForm">
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control" id="username" name="username" required>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                </div>
                                <div class="form-group text-center">
                                    <button type="submit" class="btn btn-primary">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- jQuery -->
        <script src="<?php echo URL; ?>/assets/js/jquery.min.js"></script>
        <!-- Bootstrap JS -->
        <script src="<?php echo URL; ?>/assets/js/bootstrap.min.js"></script>

        <script>
        // Handle form submission
        $(document).ready(function() {
            $("#loginForm").submit(function(event) {
                event.preventDefault();

                var username = $("#username").val();
                var password = $("#password").val();
                // alert(username);
                // Perform AJAX request to server-side script
                $.ajax({
                    type: "POST",
                    url: "check_login.php",
                    data: {
                        username: username,
                        password: password
                    },
                    dataType: "json",
                    success: function(response) {
                        /*   alert(response); */
                        if (response.success) {
                            // Redirect to dashboard
                            window.location.href = '<?php echo URL;?>index.php';
                        } else {
                            // Display error message
                            alert(response.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });
        });
        </script>

    </body>

</html>
