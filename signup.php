<!DOCTYPE html>
<html>
	<head>
		<title>Signup, Simple PHP Login and Register System</title>		
	</head>  
<body>
	<ul align='right'>
	  <a href="index.php">Sign in</a>&nbsp; 
	</ul>
	<br><br>
	<form method='post' action='signup.php'>
      <table width='500' border='3' align='center'>
          <tr>
              <th bgcolor='dodgerBlue' colspan='2'>Registration Form</th>
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
              <td align='right'>Confirm Password: </td>
              <td><input type='password' name='password2' maxlength="50" required>
              </td>
          </tr>
          <tr>
              <td align='right'>Gender: </td>
              <td>
                <input type="radio" name="gender" value="male" checked> Male
                <input type="radio" name="gender" value="female"> Female
                <input type="radio" name="gender" value="other"> Other  
              </td>
          </tr>
          <tr>
              <td align='right'>Birthday: </td>
              <td><input type='date' name='birthday' required>
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
if(isset($_POST['submit']))
{

   $firstname = $_POST['firstname'];
   $lastname = $_POST['lastname'];
   $email = $_POST['email'];
   $username = $_POST['username'];
   $password = md5($_POST['password']);
   $gender = $_POST['gender'];
   $birthday = $_POST['birthday'];
   
   if($_POST['password'] != $_POST['password2']){

    echo "<center><b><br>Passwords do not match please try again.</b></center><br>";

   }else{

    $sql = "INSERT INTO users(firstname, lastname, email, username, password, gender, birthday, created_date) VALUES('$firstname', '$lastname','$email','$username','$password','$gender','$birthday',NOW())";

    $query = mysqli_query($conn, $sql);

    if($query){

        echo "<center><b><br>Registration completed successfully!</b></center><br>";

        }else{

          echo "<center><b><br>Something went wrong please try again!</b></center><br>";

        }

   }

  }
?>