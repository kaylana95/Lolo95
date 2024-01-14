<!DOCTYPE html>
<html>
	<head>
		<title>Login and Register System</title>		
	</head>  
<body>
	
	<br><br>
	<form method='post' action='signup.php'>
      <table width='500' border='3' align='center'>
          <tr>
              <th bgcolor='#fffff' colspan='2'>Registration Form</th>
          </tr>
          <tr>
              <td align='right'>First Name:</td>
              <td><input type='text' name='firstname' maxlength="50" required >
              </td>
          </tr>
          <tr>
              <td align='right'>Last Name:</td>
              <td><input type='text' name='lastname' maxlength="50" required >
              </td>
          </tr>
          <tr>
              <td align='right'>Email :</td>
              <td><input type='email' name='email' maxlength="50" required>
              </td>
          </tr>
          <tr>
              <td align='right'>Username: </td>
              <td><input type='username' name='username' maxlength="50" required>
              </td>
          </tr>
          <tr>
              <td align='right'>Password: </td>
              <td><input type='password' name='password' maxlength="50" required>
              </td>
          </tr>
        
          <tr>
              <td align='center' colspan='2'>
              <input type='submit' name='submit' value='Submit'>
              <br><br>
              <a href="index.php">Login</a> 
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
if(isset($_POST['submit']))
{

   $firstname = $_POST['firstname'];
   $lastname = $_POST['lastname'];
   $email = $_POST['email'];
   $username = $_POST['username'];
   $password = md5($_POST['password']);
  
   
   if($_POST['password'] != $_POST['password']){

    echo "<center><b><br>Passwords do not match please try again.</b></center><br>";

   }else{

    $sql = "INSERT INTO users(firstname, lastname, email, username, password) VALUES('$firstname', '$lastname','$email','$username','$password',NOW())";

    $query = mysqli_query($conn, $sql);

    if($query){

        echo "<center><b><br>Registration completed successfully!</b></center><br>";

        }else{

          echo "<center><b><br>Something went wrong please try again!</b></center><br>";

        }

   }

  }
?>