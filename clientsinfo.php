<?php
  $hostname = 'localhost';
  $database = 'clientsinfo';
  $username = 'root';
  $password = '';

  // opening a connection
  $conn = new mysqli ($hostname, $username, $password, $database);

  if ($conn->connect_error) {
    die($conn->connect_error);
  }
  $id    = 1;
  $fName = $_POST['fName'];
  $lName = $_POST['lName'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  if (isset($_POST['recruitment'])) $recruitment = true; else $recruitment = false;
  if (isset($_POST['buy'])) $buy = true; else $buy = false;
  if (isset($_POST['warranty'])) $warranty = true; else $warranty = false;

  $reference = $_POST['reference'];
  $questions = $_POST['questions'];

  $query = "INSERT INTO clientdb(fName, lName, email, phone, recruitment, buy, warranty, reference, questions) VALUES('$fName', '$lName', '$email', '$phone', '$recruitment', '$buy', '$warranty', '$reference', '$questions')";

  $results = $conn->query($query);
  if (!$results) {
    echo "Insert failed";
  }
  else {
    echo "Insert successfully!", "<br/>";
  }

  $query = "select * from clientdb";
  $results = $conn->query($query);

  if (!$results) {
    echo "Select error";
  }

    while ($row = mysqli_fetch_array($results)) {
    echo "<br/>","<table border=1 cellspacing=0 cellpading=5>
     <tr>
     <td><font color=blue>ID</td></font>
     <td><font color=blue>FullName</td></font>
     <td><font color=blue>LastName</td></font>
     <td><font color=blue>Email</td></font>
     <td><font color=blue>Phone</td></font>
     </tr>
     <tr>
     <td>$row[0]</td>
     <td>$row[1]</td>
     <td>$row[2]</td>
     <td>$row[3]</td>
     <td>$row[4]</td>
     </tr>
     </table>";
  }
?>
