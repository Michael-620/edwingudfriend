<?php
include 'db.php';

if (isset($_POST['submit'])) {
    $name = filter_input(INPUT_POST, 'name');
    $email = filter_input(INPUT_POST, 'email');
    $phone = filter_input(INPUT_POST, 'phone');
    $gender = filter_input(INPUT_POST, 'gender');
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    if ($name && $email && $phone && $gender && $password) {
        $stmt = $con->prepare("INSERT INTO crude (name, email, phone, gender, password) VALUES (?, ?, ?,  ?, ?)");
        $stmt->bind_param("sssss", $name, $email, $phone, $gender,$password);

        if ($stmt->execute()) {
            header('Location: index.php');
            exit();
        } else {
            die("Error: " . $stmt->error);
        }
    } else {
        echo 'Please fill in all fields correctly.';
    }

    $con->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body { background-color: blue; color: white; font-family: Arial, sans-serif; }
        center { font-size: 18px; }
        input[type=text], input[type=email], input[type=password], input[type=radio] {
            width: 100%; padding: 12px; margin: 8px 0; box-sizing: border-box; border: 1px solid #ccc; border-radius: 4px;
        }
        button {
            width: 100%; background-color: #4CAF50; color: white; padding: 14px 20px; margin: 8px 0; border: none; border-radius: 4px; cursor: pointer;
        }
        button:hover { background-color: #45a049; }
    </style>
</head>
<body>

        <h2>Sign Up:</h2>
        <form action="" method="post">

                <legend>Personal Information:</legend>
                <div style="text-align:left;">
                    Name: <br>
                    <input type="text" name="name" required><br>
                    
                    Email: <br>
                    <input type="email" name="email" required><br>
                    
                    Phone: <br>
                    <input type="text" name="phone" required><br>
                    
                    Gender: <br>
                    <input type="radio" name="gender" value="Male" required>Male
                    <input type="radio" name="gender" value="Female" required>Female
                    <br><br>
                   
                    Password: <br>
                    <input type="password" name="password" required ><br><br>
                    <button type="submit" name="submit">Submit</button>
                </div>
        </form>
</body>
</html>
