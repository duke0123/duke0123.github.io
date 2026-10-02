<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AlexEsports</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="css/reg.css" rel="stylesheet" type="text/css">
    <style>
        body {
            background-color: rgb(175, 174, 174);
        }
    </style>
</head>

<body>

    <?php

    require_once 'dbconnect1.php';

    if (isset($_POST["submit"])) {
        $name = htmlspecialchars($_POST["name1"]);
        $email = htmlspecialchars($_POST["email"]);
        $password = htmlspecialchars($_POST["password1"]);
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);


        // Check if the email already exists in the database
        $query = "SELECT COUNT(*) FROM reg WHERE email = ?";
        $stmt = $db->prepare($query);
        $stmt->bindParam(1, $email);
        $stmt->execute();
        $emailExists = $stmt->fetchColumn();

        if ($emailExists) {
            echo "<script>alert('This email is already registered. Please use a different email.')</script>";
        } else {

            // Insert into database if email is unique
            $query = "INSERT INTO reg (name1, email, password1) VALUES (?, ?, ?)";
            $stmt = $db->prepare($query);
            $stmt->bindParam(1, $name);
            $stmt->bindParam(2, $email);
            $stmt->bindParam(3, $hashedPassword);

            try {
                $stmt->execute();
                echo "<script>alert('Submitted successfully!')</script>";
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage(); // Display the error message for debugging
            }
        }
    }

    //         if ($stmt->execute()) {
    //             echo "<script>alert('Submitted successfully!')</script>";
    //         } else {
    //             echo "Error: Could not submit the form.";
    //         }
    //     }
    // }

    ?>

    <!-- $query = "INSERT INTO reg (name1, email, password1) VALUES (?, ?, ?)";


    $stmt = $db->prepare($query);
    var_dump($_POST);
    $stmt->bindParam(1, $name);
    $stmt->bindParam(2, $email);
    $stmt->bindParam(3, $password);


    if ($stmt->execute()) {
    echo "<script>
        alert('submitted successfully!')
    </script>";
    } else {
    echo "Error: Could not submit the form.";
    }
    } -->








    <div class="container d-flex justify-content-center align-items-center min-vh-100 ">

        <form id="form" method="post" action="">

            <h1>REGISTER</h1> <br />

            <div class="mb-3">
                <label for="exampleInputName" class="form-label">Name</label>
                <input type="text" class="form-control" name="name1" id="exampleInputName1" aria-describedby="nameHelp"
                    require>
                <div id="nameHelp" class="form-text"></div>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" name="email" id="exampleInputEmail1"
                    aria-describedby="emailHelp" required>
                <div id="emailHelp" class="form-text"></div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" name="password1" id="exampleInputPassword1" require>
            </div>

            <a href="signin.php">Already Have An Account? Sign In</a>
            <br /><br />

            <button type="submit" name="submit" value="submit" class="btn btn-primary">Register</button>

        </form>
    </div>
    <!-- q4BHQSptsLyu2Xjs -->

    <script>


    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
</body>

</html>