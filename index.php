<?php
  session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>login, Simple PHP Login and Register System</title>		
	</head>  
<body>
	<ul align='right'>
	  <a href="signup.php">Sign up</a>&nbsp;
	</ul>
	<br><br>
	<form method='post' action='index.php'>
      <table width='400' border='3' align='center'>
          <tr>
              <th bgcolor='dodgerBlue' colspan='2'>Sign in</th>
          </tr>
          <tr >
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
    $_SESSION['gender'] = $row[6];
    $_SESSION['birthday'] = $row[7];
    $_SESSION['created_date'] = $row[8];

    if($resultcheck > 0){

    $_SESSION['user_name'] = $user_name;

    echo "<script>window.open('init.php','_self')</script>";

    }else{
      echo "<script>alert('Incorrect username or password.')</script>";
    }
  }
?>