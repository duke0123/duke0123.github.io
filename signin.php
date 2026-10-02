<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AlexEsports</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="css/home.css" rel="stylesheet" type="text/css">
    <style>
        body {
            background-color: rgb(175, 174, 174);
        }
    </style>
</head>

<body>

    <?php


    require_once 'dbconnect1.php'; // Include your database connection

    if (isset($_POST["submit"])) {
        $email = htmlspecialchars($_POST["email"]);
        $password = htmlspecialchars($_POST["password2"]);




        // Prepare SQL query to select the user based on email
        $query = "SELECT * FROM reg WHERE email = ?";
        $stmt = $db->prepare($query);
        $stmt->bindParam(1, $email);

        // Execute the query
        if ($stmt->execute()) {
            // Check if the email exists in the database
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            var_dump($user);

            if ($user) {
                // Email exists, now check if the password matches
                if (password_verify($password, $user['password1'])) {
                    // Password matches
                    echo "<script>alert('Login successful!'); window.location.href='home.html';</script>";
                } else {
                    // Password doesn't match
                    echo "<script>alert('Invalid password! Please try again.');</script>";
                }
            } else {
                // Email doesn't exist in the database
                echo "<script>alert('No account found with that email.');</script>";
            }
        } else {
            echo "<script>alert('Error occurred. Please try again later.');</script>";
        }
    }
    ?>





    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <form method="post">
            <h1>Sign In</h1>
            <br />
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" required>
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" name="password2" id="exampleInputPassword1" required>
            </div>



            <a href="reg.php">Don't Have An Account? Register One</a>
            <br /><br />
            <button type="submit" value="submit" name="submit" class="btn btn-primary">log in</button>

        </form>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
</body>

</html>