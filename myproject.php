<!DOCTYPE HTML>   

<html> 

<head> 

<style> 

.form {color: #FF0000;} 

 

 

</style> 

<style> 

  body{ 

    padding:50px; 

  } 

 

</style> 

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">  

</head> 

<body>   

<div class="container" style="background: #ADD8E6;"> 

<?php 

$nameErr = $emailErr = $genderErr = $websiteErr = $accountErr = $passwordErr = ""; 

$name = $email = $gender = $comment = $account = $website = $password =  ""; 

 

if ($_SERVER["REQUEST_METHOD"] == "POST") { 

  if (empty($_POST["name"])) { 

    $nameErr = "Name is required"; 

  } else { 

    $name = test_input($_POST["name"]); 

    // check if name only contains letters and whitespace 

    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) { 

      $nameErr = "Only letters and white space allowed"; 

    } 

  } 

   

  if (empty($_POST["email"])) { 

    $emailErr = "Email is required"; 

  } else { 

    $email = test_input($_POST["email"]); 

     

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { 

      $emailErr = "Invalid email format"; 

    } 

  } 

 

  $pattern = '/^(?=.*[!@#$%^&*-])(?=.*[0-9])(?=.*[A-Z]).{8,20}$/'; 

  if(preg_match($pattern, $password)){ 

   echo "Password strength is OK"; 

  } else { 

   $passwordErr = "Password is not strong enough"; 

  } 

     

  if (empty($_POST["website"])) { 

    $website = ""; 

  } else { 

    $account = test_input($_POST["website"]); 

     

    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) { 

      $websiteErr = "Invalid URL"; 

    } 

  } 

 

   if (empty($_POST["account"])) { 

    $accountErr = "AccountId is required"; 

  } else { 

    $account = test_input($_POST["account"]); 

    // check if name only contains numbers and whitespace 

    if (!preg_match("/^[0-9]*$/",$account)) { 

      $accountErr = "Only numbers are allowed"; 

    } 

  } 

 

 

 

  if (empty($_POST["comment"])) { 

    $comment = ""; 

  } else { 

    $comment = test_input($_POST["comment"]); 

  } 

 

  if (empty($_POST["gender"])) { 

    $genderErr = "Gender is required"; 

  } else { 

    $gender = test_input($_POST["gender"]); 

  } 

} 

 

function test_input($data) { 

  $data = trim($data); 

  $data = stripslashes($data); 

  $data = htmlspecialchars($data); 

  return $data; 

} 

?> 

</div> 

<div class="container" style="background: #ADD8E6;"> 

<h2>PHP Form Validation Example</h2> 

<p><span class="form">* required field</span></p> 

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">   

  Name: <input type="text" name="name" value="<?php echo $name;?>"> 

  <span class="form">* <?php echo $nameErr;?></span> 

  <br><br> 

  E-mail: <input type="text" name="email" value="<?php echo $email;?>"> 

  <span class="form">* <?php echo $emailErr;?></span> 

  <br><br> 

  Password: <input type="password" name="password" value="<?php echo $password;?>"> 

  <span class="form">* <?php echo $passwordErr;?></span> 

  <br><br> 

  Website: <input type="text" name="website" value="<?php echo $website;?>"> 

  <span class="form"><?php echo $websiteErr;?></span> 

  <br><br> 

  AccountID: <input type="text" name="account" value="<?php echo $account;?>"> 

  <span class="form">* <?php echo $accountErr;?></span> 

 

  Comment: <textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea> 

  <br><br> 

  Gender: 

  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female 

  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male 

  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other   

  <span class="form">* <?php echo $genderErr;?></span> 

  <br><br> 

  <input type="submit" name="submit" value="Submit">   

</form> 

<?php 

echo "<h2>Your Input:</h2>"; 

echo $name; 

echo "<br>"; 

echo $email; 

echo "<br>"; 

echo $password; 

echo "<br>"; 

echo $website; 

echo "<br>"; 

echo $account; 

echo "<br>"; 

echo $comment; 

echo "<br>"; 

echo $gender; 

?> 

</div> 

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>  

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>  

</body> 

</html> 