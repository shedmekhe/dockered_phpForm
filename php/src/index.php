<?php
//These are the defined authentication environment in the db service

// The MySQL service named in the docker-compose.yml.
$host = 'db';

// Database use name
$user = 'MYSQL_USER';

//database user branch
$pass = 'MYSQL_PASSWORD';

//database name
$mydatabase ='MYSQL_DATABASE'; 

// check the MySQL connection status
$conn = new mysqli($host, $user, $pass,$mydatabase);
$errors = [];
    $id=0;
    $fname = '';
    $prn = '';
    $mail = '';
    $branch='';
    $contact_number='';
        
if($_SERVER['REQUEST_METHOD'] === 'POST'){

    // validate form
    $fname= $_REQUEST['fname'];
    $prn = $_REQUEST['prn'];
    $mail = $_REQUEST['mail'];
    $branch = $_REQUEST['branch'];
    $contact_number = $_REQUEST['contact_number'];

    if(!$fname){
        $errors[] = 'Enter First Name';
    }
    if(!$prn){
        $errors[] = 'Enter PRN';
    }
    if(!$mail){
        $errors[] = 'Enter Mail';
    }
    if(!$branch){
        $errors[] = 'Enter Branch';
    }

    if(!$contact_number){
        $errors[] = 'Enter Contact No.';
    }

    if(empty($errors)){


        $sql = "INSERT INTO student_wce VALUES ('$id','$fname','$prn','$mail','$branch','$contact_number')";

        if(mysqli_query($conn, $sql)){
            echo "Data send successfully !";
        } 
        else{
            echo "ERROR: Hush! Sorry $sql. "
                . mysqli_error($conn);
        }
        
        $fname = '';
        $prn = '';
        $mail = '';
        $mail = '';
        $branch= '';
        $contact_number = '';
        $id+=1;
    }
}
mysqli_close($conn);
?>
<html>
  <head>
    <title>WCE_students</title>
  </head>
  <style>
label{
    display: inline-block;
    width: 150px;
    text-align:left;
  }
  </style>
  
  <body>
    <center>
        <div>
        <fieldset>
        <legend><h1>WCE Student Details</h1></legend>
        <form action="index.php" method="post" autocomplete="off">
          <ul>
              <label for="fname">Name:</label>
              <input type="text" id="fname" name="fname" require/>
          </ul>
          <ul>
            <label for="prn">PRN:</label>
            <input type="text" id="prn" name="prn" required>
          </ul>
            <ul>
              <label for="mail">E-mail:</label>
              <input type="mail" id="mail" name="mail" required>
            </ul>
            <ul>
              <label for="Branch">Branch</label>
              <input type="text" name="branch" id="branch" required>
            </ul>
            <ul>
              <label for="Contact">Contact Number:</label>
              <input type="text" id="contact_number" name="contact_number" required>
            </ul>
              <ul class="button">
                <BR>
                </BR>
                <button type="submit" name="Create" >SUBMIT</button>
              </ul>
        </form>
      </fieldset>
        </div>
      
    </center>
  </body>

</html>
