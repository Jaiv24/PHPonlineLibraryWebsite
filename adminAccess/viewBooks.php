<!DOCTYPE HTML>
<html>
    <head>
        <title>
            Book list 
        </title>
        <link rel="stylesheet" href="style.css">
        <style>
            body{
                background-color: lightblue;
            }
        </style>
    </head>
    <body>
    <div class="navbar">
        
             <div class="brand">
                 <img src="images/logo.PNG"/>
            </div>
            <nav>
                <ul>
                <li><a href="adminPanel.php">Home</a></li>
                    <li><a href="viewBooks.php" >View Books</a></li>
                    <li><a href="addBooks.html" >Add books</a>
                       
                    </li>
                 
                    <li><a href="Registration.php">Register a User</a></li>
                    <li><a href="deleteData.php">Remove A User</a></li>
                </ul>
            </nav>
             
        </div>
        </br></br></br></br></br></br></br>
        
        <center style = "table" >
            <form action="" method="POST" enctype="multipart\form-data">
                <table width=50% border = "1" cellpadding = "5" cellspacing = "5" ">
                    <thead>
                        <th>Book Name</th>
                        <th>Author Name</th>
                    </thead>
               
        <?php
            /*$db_host="localhost";
            $db_username="root";
         $db_passwd="n01098567";*/
             
          $dbc=mysqli_connect('localhost','root','','library')
          or die ("Could not Connect! \n");
     
         $sql="SELECT * from books;";
         
          //echo "Connection established. \n";
          echo "<h2> List of our books. </h2> \n ";
         
         $result=mysqli_query($dbc,$sql) or die ("Error Querying Database");
         
         while($row=mysqli_fetch_array($result)){
            ?>
                <tr>
                    <td><?php echo $row['book_title'] ?></td>
                    <td><?php echo $row['author_name'] ?></td>
                </tr>
            <?php
            //echo 'book-title: '.$row['book_title'].' '.$row['author_name'].'<br/>';
         }
         
          //mysqli_close($result);
        
        
        
        ?>
                 </table>
            </form>
        </center>

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