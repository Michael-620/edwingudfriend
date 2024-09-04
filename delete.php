<?php
    include 'db.php';

  $id = $_GET['id'];

   $sql = "DELETE FROM crude WHERE id=$id";
   if ($con->query($sql) === TRUE) {
    echo "Record deleted successfully";
    } else {
           echo "Error: " . $sql . "<br>" . $conn->error;
}
    $con->close();
     header("Location: index.php");
   exit();
 ?>
