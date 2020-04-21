
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
                <li><a href="adminPanel.php">Home</a></li>
                <li><a href="viewBooks.php" >View Books</a></li>
                    <li><a href="addBooks.html" >Add books</a></li>
                    
                    <li><a href="Registration.php">Register a User</a></li>
                    <li><a href="deleteData.php">Remove A User</a></li>
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
			    $uname = test_input($_POST["uname"]);  // clears spaces etc to prep data for testing
			    //checks for letters and whitespaces using regular expression
			    if (!preg_match("/^[a-zA-Z1-9 ]*$/",$uname)){ // regular expression check 
			    	$unameErr=" Must contain only letters and white spaces";
			    }
		            }

		        if (empty($_POST["email"])) {
			    $emailErr = "Email is required";
		        } else {
			    $email = test_input($_POST["email"]); // clears spaces etc to prep data for testing
		         } 

                   if (empty($_POST["password"])) {
  			    $passErr = "Password is required";
		        } else {
			        $password = test_input($_POST["password"]); // clears spaces etc to prep data for testing
			        // checks for website format using regular expression
			        if (!preg_match("/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,16}$/",$password)){ // regular expression check
				$passErr=" Must be a valid password";
			        }
		        }

		 
		//continues to target page if all validation is passed
        if ( $unameErr ==""&& $emailErr ==""&& $passErr ==""){
                $dbc=mysqli_connect('localhost','root','','library')
			or die("Could not Connect!\n");
			$sql="SELECT * from user WHERE username ='$uname';";
			$result =mysqli_Query($dbc,$sql) or die (" Error querying database");
			$a=mysqli_num_rows($result);
			//header('Location: /ipProjects/ipProjects/thankyou.html');
            
            if ($a>0){
				$unameErr="Username already exists".$a;
			}else{ // username does not exist so add to db
				$hashpass=hash('sha256',$password);
				$sql="INSERT INTO user VALUES(NULL,'$uname','$email','$hashpass','1');";
				$result =mysqli_Query($dbc,$sql) or die (" Error querying database");
				mysqli_close();
				header('Location: /adminAccess/adminPanel.php');
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

	            <span class="error">* <?php echo $emailErr;?></span>
	            <input type="text" class="input-field" name="email" placeholder="E-mail" value="<?php echo $email;?>" />
                <br/><br/>
	            
                <span class="error"><?php echo $passErr;?></span>
	            <input type="password" class="input-field" id="password" name="password" placeholder="Password" value="<?php echo $password;?>"/>
	            <br/><br/>
	
	            <input type="submit" class="submit-btn" name="submit" value="Submit"/> 
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
