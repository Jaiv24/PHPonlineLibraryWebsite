<?php

if(isset($_POST['delete'])){
    $hostname = "localhost";
    $username = "root";
    $password = "";

    $id = $_POST['id'];
    $dbc=mysqli_connect('localhost','root','','library') or die("Could not Connect!\n");

    $query = "DELETE FROM `user` WHERE `id` = $id";

    $result = mysqli_query($dbc, $query);
    if($result){
        header('Location: /adminAccess/sucessDeletedData.php');

    }else{
        echo "data does not deleted";
    }
}

?>


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
                    <li><a href="adminPanel.php" >Home</a></li>
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
                    <input type="button" value="Remove User" class="toggle-btn">
                </div>
               


<form method="post" id="login" action="deleteData.php" class="input-group">

                 <input type="text"  class="input-field" name="id" placeholder="Enter ID of user to remove" value=""/>
                <br/><br/>
                
                
	            <!--<input type="password" class="input-field" id="password" name="password" placeholder="Password" value=""/>-->
	            <br/><br/>
	
	            <input type="submit" class="submit-btn" name="delete" value="Remove"/> 
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
