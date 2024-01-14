<?php 
  session_start();

  if (!$_SESSION['user_name']){
    header('location:index.php');
  }
?>
<!DOCTYPE html>
<html>

<head>
    <title>Login and Register System</title>
</head>

<body>
    <ul align='right'>
        Welcome:
        <font color="black">
            <?php echo $_SESSION['user_name']; ?>
        </font>
        <a href="logout.php">Log out</a>
    </ul>
    <br><br>
    <form>
        <table width='500' border='3' align='center'>
            <tr>
                <th bgcolor='#fffff' colspan='2'>Information</th>
            </tr>
            <tr>
                <td align='right'>First Name:</td>
                <td><?php echo $_SESSION['firstname']; ?></td>
            </tr>
            <tr>
                <td align='right'>Last Name:</td>
                <td><?php echo $_SESSION['lastname']; ?></td>
            </tr>
            <tr>
                <td align='right'>Email :</td>
                <td><?php echo $_SESSION['email']; ?></td>
            </tr>
            <tr>
                <td align='right'>Username: </td>
                <td><?php echo $_SESSION['user_name']; ?></td>
            </tr>
           
        </table>
    </form>
</body>

</html>
