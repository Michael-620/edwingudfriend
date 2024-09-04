<?php

include "db.php";

$id = $_GET['id'];

$sql = "SELECT * FROM crude WHERE id=?";
$stmt = $con->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();


if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $password = $_POST['password'];
j
    
    $sql = "UPDATE crude SET name=?, email=?, phone=?, gender=?, password=? WHERE id=?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("ssssss", $name, $email, $phone, $gender, $password, $id);

    if ($stmt->execute()) {
      
        header('Location: index.php');
        exit;
    } else {
        echo "Error updating record: " . $stmt->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Information</title>
</head>
<body>
    <h2>Update Information</h2>

    <form action="" method="POST">
        <fieldset>
            <div style="text-align:center;">
                <legend>Personal Information:</legend>
                Name: <br>
                <input type="text" name="name" value="<?php echo htmlspecialchars($row['name']); ?>" required>
                <br>
                Email: <br>
                <input type="email" name="email" value="<?php echo htmlspecialchars($row['email']); ?>" required>
                <br>
                Phone: <br>
                <input type="text" name="phone" value="<?php echo htmlspecialchars($row['phone']); ?>" required>
                <br>
                Gender: <br>
                <input type="radio" name="gender" value="Male" <?php echo ($row['gender'] == 'Male') ? 'checked' : ''; ?>>Male
                <input type="radio" name="gender" value="Female" <?php echo ($row['gender'] == 'Female') ? 'checked' : ''; ?>>Female
                <br>
                
                Password: <br>
                <input type="password" name="password" value="<?php echo htmlspecialchars($row['password']); ?>" required>
                <br><br>

                <button type="submit" name="submit">Update</button>
            </div>
        </fieldset>
    </form>
</body>
</html>
