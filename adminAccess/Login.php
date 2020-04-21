
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
         <style>
             img {
                float: left; }

             .error {color:#FF0000;}
         </style>
         

</head>
<body style="background-color: lightblue;">
        <div class="navbar">
             <div class="brand">
                 <img src="images/logo.PNG"/>
            </div>
            <nav>
                <ul>
                    <li><a href="index.html" >Home</a></li>
                    <li><a href = "contact.html" >Contact Us</a></li>
                    <li><a href = "aboutus.html" >About Us </a></li>
                    <li><a href = "Login.php" >login</a></li>
                    <li><a href = "RegistrationP.php">register</a></li>
                </ul>
            </nav>
             
        </div>

       <div class="hero">
            <div class="form-box">
                
                <div class="button-box">
                    <div id="btn"></div>
                   <!-- <input type="button" value="Login" class="toggle-btn" onclick="login()">-->
                    <input type="button" value="Register" class="toggle-btn">
                </div>
                <div class="social-icons">
                    <img src="./images/fb.png" alt="facebook logo">
                    <img src="./images/gp.png" alt="google logo">
                </div>

                
<?php

	             $unameErr = $emailErr = $passErr = "";
	
	             $uname = $email = $password = "";

                 if ($_SERVER["REQUEST_METHOD"] == "POST") {


                    if (empty($_POST["uname"])) {
                        $unameErr = "UserName is required";
                        } else {
                        $uname = test_input($_POST["uname"]);
                        if (!preg_match("/^[a-zA-Z1-9 ]*$/",$uname)){ // regular expression check 
                            $unameErr=" Must contain only letters and white spaces";
                        }
                    }

                     if (empty($_POST["password"])) {
                       $passErr = "Password is required";
                     } else {
                       $password = test_input($_POST["password"]); 
                       if (!preg_match("/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,16}$/",$password)){ // regular expression check
                        $passErr=" Must be a valid password";
                            }
                     }
           
           
           
           
                   //continues to target page if all validation is passed
                   if ( $unameErr ==""&& $passErr ==""){
                       // check if exists in database
                       $dbc=mysqli_connect('localhost','root','','library')
                       or die("Could not Connect!\n");
                       $hashpass=hash('sha256',$password);
                       $sql="SELECT * from user WHERE username ='$uname' AND password='$hashpass';";
                       $result =mysqli_Query($dbc,$sql) or die (" Error querying database");
                       $a=mysqli_num_rows($result);
           
                       if ($a===0){
                           $loginErr="Invalid username or password";
                       }else{ 
                           $row = mysqli_fetch_array($result);
                           $level = $row['level'];
                           $_SESSION['uname'] = $row['username'];
                           $_SESSION['level'] = $row['level'];
                           if ($level == 1){
                                header('Location: /adminAccess/viewBooksP.php');
                           }else
                            {
                                header('Location: /adminAccess/adminPanel.php');
                            }
                       }
                   }
               }
           
                  // clears spaces etc to prep data for testing
               function test_input($data){
                   $data=trim ($data); // gets rid of extra spaces befor and after
                   $data=stripslashes($data); //gets rid of any slashes
                   $data=htmlspecialchars($data); //converts any symbols usch as < and > to special characters
                   return $data;
               }

?>
<form method="post" id="login" class="input-group" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                
                <span class="error">* <?php echo $unameErr;?></span>
                 <input type="text"  class="input-field" Id="uid" name="uname" placeholder="UserName" value="<?php echo $uname;?>"/>
	            <br/><br/>

	         
                <span class="error"><?php echo $passErr;?></span>
	            <input type="password" class="input-field" id="password" name="password" placeholder="Password" value="<?php echo $password;?>"/>
	            <br/><br/>
	
	            <input type="submit" class="submit-btn" name="submit" value="Login"/> 
</form>

              
            </div>
        </div>
        
    
    <div class="footer">
        <div class="copyright-container">
            <div class="vert-align">
                <p class="headline">
                Copyright &copy; 2020 Jaivkumar Shah, Pushpinder kaur, Amos - All Rights Reserved.</p>
            </div>
        </div>
    </div>
    </body>
</html>
