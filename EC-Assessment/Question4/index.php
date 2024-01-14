<?php
  session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Login and Register System</title>
</head>

<body>



    <br><br>
    <form method='post' action='index.php'>
        <table width='400' border='1' align='center'>
            <h2>Login</h2>
            <tr>
                <td align='right'>Username:</td>
                <td><input type='text' name='username' maxlength="50" required>
                </td>
            </tr>
            <tr>
                <td align='right'>Password:</td>
                <td><input type='password' name='password' maxlength="50" required>
                </td>
            </tr>
            <tr>
                <td align='center' colspan='2'>
                    <input type='submit' name='submit' value='Submit'>
                    <br>
                    <a href="signup.php">Registration</a>
                </td>
            </tr>
        </table>
    </form>
</body>

</html>
<?php
  $conn = mysqli_connect("localhost","root","","registration");

  if(!$conn){
    die("Connection failed: ".mysql_connect_error());
  }

  if(isset($_POST['submit'])){

    $user_name = $_POST['username'];
    $user_password = md5($_POST['password']);

    $sql = "SELECT * FROM users WHERE username = '$user_name' AND password = '$user_password'";

    $query = mysqli_query($conn,$sql) or die("Bad Query: $sql");

    $row=mysqli_fetch_row($query);
      
    $resultcheck = mysqli_num_rows($query);

    $_SESSION['id'] = $row[0];
    $_SESSION['firstname'] = $row[1];
    $_SESSION['lastname'] = $row[2];
    $_SESSION['email'] = $row[3];
    

    if($resultcheck > 0){

    $_SESSION['user_name'] = $user_name;

    echo "<script>window.open('init.php','_self')</script>";

    }else{
      echo "<script>alert('Incorrect username or password.')</script>";
    }
  }
?>
