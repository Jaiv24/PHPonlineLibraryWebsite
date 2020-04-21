<!--<!DOCTYPE html>
<html>
    <head><title>Add Books</title>
    </head>
    <body>
        <h2></h2>
        <?php
           /* $isbn = $_POST['isbn'];
            $book_title = $_POST['book_title'];
            $author_name = $_POST['author_name'];

            $db_host="localhost";
            $db_username="root";
            $db_passwd="";

            	    
 	$dbc=mysqli_connect('localhost','root','','library')
	 or die ("Could not Connect! \n");

	$sql="INSERT INTO books VALUES ('$isbn','$book_title','$author_name');";
	
 	echo "Connection established. \n";
	
	$result=mysqli_query($dbc,$sql) or die ("Error Querying Database");

     mysqli_close();*/
     
            $dbc=mysqli_connect('localhost','root','','library');

            if(!$dbc){
                echo 'not connected to server';
            }
            if(!mysqli_select_db($dbc,'library')){
                echo 'database not selected';

            }
            $isbn = $_POST['isbn'];
            $book_title = $_POST['book_title'];
            $author_name = $_POST['author_name'];

            $sql = "INSERT INTO books (isbn,book_title,author_name) VALUES ('$isbn','$book_title','$author_name')";

            if(!mysqli_query($dbc,$sql)){
                echo 'Not inserted';
            }
            else
            {
                echo 'inserted';
            }

            header("refresh:3 ; url = viewBooks.php")
        ?>

    </body>
</html>-->