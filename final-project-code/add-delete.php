<!DOCTYPE html>
<html>
  <head>

    <meta charset="utf-8">
    <title>Mistborn-Add-Delete</title>

    <link rel="stylesheet" href="style.css">
  </head>

  <body class="add-DeleteBody">

    <?php
    /*******************************
    Connect to server
    *******************************/

    $host = 'classmysql.engr.oregonstate.edu';
    $db = 'cs340_snowan';
    $user = 'cs340_snowan';
    $charset = 'utf8mb4';
    $pass = 'myONIDaccount97331';
    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

    //Create Connection
    $conn = new mysqli($host, $user, $pass, $db);

    //Test connection
    if ($conn->connect_error){
      die("Connection Failed: " .$conn->connect_error);
    }
    ?>

    <header class="add-DeleteHeader">
      <h1 class="add-DeleteTitle">Add/Delete</h1>
      <h2 class="homeButton"><a href='index.html'>Mistborn<br>Database</a></h2>
    </header>

    <main class="add-DeleteMain">

      <div class= "section">
        <div class="inputSection">
          <form method='POST' action=''>
            <div class="formInput">
              Character Name: <input type="text" name="cName"><br>
              Character's Job: <input type="text" name="cJob">
            </div>
            <div class="formButtons">
              <input type="submit" name="addButton" value="Add"><br>
              <input type="submit" name="deleteButton" value="Delete">
            </div>
          </form>
        </div>

        <?php
        /**********************
        Add to Database
        Character Table
        **********************/
          if (isset($_POST['addButton'])){
            $characterName = $_POST['cName'];
            $characterJob = $_POST['cJob'];

            //Check that all values are present
            if ($characterName != '' && $characterJob != ''){
              $sql = "INSERT INTO `Character`(`cName`, `jName`) VALUES ('$characterName','$characterJob')";

              if ($conn->query($sql) === TRUE) {
                  echo "<script type='text/javascript'>alert('New Record Created');</script>";
              } else {
                  $errorMessage = "Error: " . $sql . "<br>" . $conn->error;
                  echo "<script type='text/javascript'>alert('$errorMessage');</script>";

              }
            }

            /*******************
            Delete from Database
            Character Table
            ********************/
          } else if (isset($_POST['deleteButton'])){
            $characterName = $_POST['cName'];
            $characterJob = $_POST['cJob'];

            if ($characterName != '' && $characterJob != ''){
              $sql = "DELETE FROM `Character` WHERE `cName` = '$characterName' AND `jName` = '$characterJob'";

              if ($conn->query($sql) === TRUE) {
                  echo "<script type='text/javascript'>alert('Record Deleted');</script>";
              } else {
                  $errorMessage = "Error: " . $sql . "<br>" . $conn->error;
                  echo "<script type='text/javascript'>alert('$errorMessage');</script>";
              }

            } else if ($characterName != ''){
              $sql = "DELETE FROM `Character` WHERE `cName` = '$characterName'";

              if ($conn->query($sql) === TRUE) {
                  echo "<script type='text/javascript'>alert('Record Deleted');</script>";
              } else {
                  $errorMessage = "Error: " . $sql . "<br>" . $conn->error;
                  echo "<script type='text/javascript'>alert('$errorMessage');</script>";
              }

            } else if ($characterJob != ''){
              $sql = "DELETE FROM `Character` WHERE `jName` = '$characterJob'";

              if ($conn->query($sql) === TRUE) {
                  echo "<script type='text/javascript'>alert('Record Deleted');</script>";
              } else {
                  $errorMessage = "Error: " . $sql . "<br>" . $conn->error;
                  echo "<script type='text/javascript'>alert('$errorMessage');</script>";
              }
            }
          }
         ?>

         <div class="inputSection">
           <form method='POST' action=''>
             <div class="formInput">
               Job Name: <input type="text" name="jName"><br>
               Metal's Used with Job: <input type="text" name="jMetal">
             </div>
             <div class="formButtons">
               <input type="submit" name="addButton" value="Add"><br>
               <input type="submit" name="deleteButton" value="Delete">
             </div>
           </form>
         </div>

         <?php
         /**********************
         Add to Database
         Job Table
         **********************/
           if (isset($_POST['addButton'])){
             $jobName = $_POST['jName'];
             $jobMetal = $_POST['jMetal'];

             //Check that all values are present
             if ($jobName != '' && $jobMetal != ''){
               $sql = "INSERT INTO `Job`(`jName`, `mName`) VALUES ('$jobName','$jobMetal')";

               if ($conn->query($sql) === TRUE) {
                   echo "<script type='text/javascript'>alert('New Record Created');</script>";
               } else {
                 $errorMessage = "Error: " . $sql . "<br>" . $conn->error;
                 echo "<script type='text/javascript'>alert('$errorMessage');</script>";
               }
             }

             /*******************
             Delete from Database
             Job Table
             ********************/
           } else if (isset($_POST['deleteButton'])){
             $jobName = $_POST['jName'];
             $jobMetal = $_POST['jMetal'];

             if ($jobName != '' && $jobMetal != ''){
               $sql = "DELETE FROM `Job` WHERE `jName` = '$jobName' AND `mName` = '$jobMetal'";

               if ($conn->query($sql) === TRUE) {
                   echo "<script type='text/javascript'>alert('Record Deleted');</script>";
               } else {
                   $errorMessage = "Error: " . $sql . "<br>" . $conn->error;
                   echo "<script type='text/javascript'>alert('$errorMessage');</script>";
               }

             } else if ($jobName != ''){
               $sql = "DELETE FROM `Job` WHERE `jName` = '$jobName'";

               if ($conn->query($sql) === TRUE) {
                   echo "<script type='text/javascript'>alert('Record Deleted');</script>";
               } else {
                   $errorMessage = "Error: " . $sql . "<br>" . $conn->error;
                   echo "<script type='text/javascript'>alert('$errorMessage');</script>";
               }

             } else if ($jobMetal != ''){
               $sql = "DELETE FROM `Job` WHERE `mName` = '$jobMetal'";

               if ($conn->query($sql) === TRUE) {
                   echo "<script type='text/javascript'>alert('Record Deleted');</script>";
               } else {
                   $errorMessage = "Error: " . $sql . "<br>" . $conn->error;
                   echo "<script type='text/javascript'>alert('$errorMessage');</script>";
               }
             }
           }

          ?>

         <div class="inputSection">
           <form method='POST' action=''>
             <div class="formInput">
               Metal Name: <input type="text" name="mName"><br>
               Metal Group: <input type="text" name="mGroup"><br>
               Metal Effect (Internal/External): <input type="text" name="mEffect">
             </div>
             <div class="formButtons">
               <input type="submit" name="addButton" value="Add"><br>
               <input type="submit" name="deleteButton" value="Delete">
             </div>
           </form>
         </div>

         <?php
         /**********************
         Add to Database
         Metal Table
         **********************/
           if (isset($_POST['addButton'])){
             $metalName = $_POST['mName'];
             $metalGroup = $_POST['mGroup'];
             $metalEffect = $_POST['mEffect'];

             //Check that all values are present
             if ($metalName != '' && $metalGroup != '' && $metalEffect != ''){
               $sql = "INSERT INTO `Metals`(`mName`, `Group`, `Effect`) VALUES ('$metalName','$metalGroup','$metalEffect')";

               if ($conn->query($sql) === TRUE) {
                   echo "<script type='text/javascript'>alert('New Record Created');</script>";
               } else {
                 $errorMessage = "Error: " . $sql . "<br>" . $conn->error;
                 echo "<script type='text/javascript'>alert('$errorMessage');</script>";
               }
             }

             /*******************
             Delete from Database
             Metal Table
             ********************/
           } else if (isset($_POST['deleteButton'])){
             $metalName = $_POST['mName'];
             $metalGroup = $_POST['mGroup'];
             $metalEffect = $_POST['mEffect'];

             if ($metalName != '' && $metalGroup != '' && $metalEffect != ''){
               $sql = "DELETE FROM `Metals` WHERE `mName` = '$metalName' AND `Group` = '$metalGroup' AND `Effect` = '$metalEffect'";

               if ($conn->query($sql) === TRUE) {
                   echo "<script type='text/javascript'>alert('Record Deleted');</script>";
               } else {
                   $errorMessage = "Error: " . $sql . "<br>" . $conn->error;
                   echo "<script type='text/javascript'>alert('$errorMessage');</script>";
               }

             } else if ($metalName != '' && $metalGroup != ''){
               $sql = "DELETE FROM `Metals` WHERE `mName` = '$metalName' AND `Group` = '$metalGroup'";

               if ($conn->query($sql) === TRUE) {
                   echo "<script type='text/javascript'>alert('Record Deleted');</script>";
               } else {
                   $errorMessage = "Error: " . $sql . "<br>" . $conn->error;
                   echo "<script type='text/javascript'>alert('$errorMessage');</script>";
               }

             } else if ($metalName != '' && $metalEffect != ''){
               $sql = "DELETE FROM `Metals` WHERE `mName` = '$metalName' AND `Effect` = '$metalEffect'";

               if ($conn->query($sql) === TRUE) {
                   echo "<script type='text/javascript'>alert('Record Deleted');</script>";
               } else {
                   $errorMessage = "Error: " . $sql . "<br>" . $conn->error;
                   echo "<script type='text/javascript'>alert('$errorMessage');</script>";
               }

             } else if ($metalGroup != '' && $metalEffect != ''){
               $sql = "DELETE FROM `Metals` WHERE `Group` = '$metalGroup' AND `Effect` = '$metalEffect'";

               if ($conn->query($sql) === TRUE) {
                   echo "<script type='text/javascript'>alert('Record Deleted');</script>";
               } else {
                   $errorMessage = "Error: " . $sql . "<br>" . $conn->error;
                   echo "<script type='text/javascript'>alert('$errorMessage');</script>";
               }

             } else if ($metalName != ''){
               $sql = "DELETE FROM `Metals` WHERE `mName` = '$metalName'";

               if ($conn->query($sql) === TRUE) {
                   echo "<script type='text/javascript'>alert('Record Deleted');</script>";
               } else {
                   $errorMessage = "Error: " . $sql . "<br>" . $conn->error;
                   echo "<script type='text/javascript'>alert('$errorMessage');</script>";
               }

             } else if ($metalGroup != ''){
               $sql = "DELETE FROM `Metals` WHERE `Group` = '$metalGroup'";

               if ($conn->query($sql) === TRUE) {
                   echo "<script type='text/javascript'>alert('Record Deleted');</script>";
               } else {
                   $errorMessage = "Error: " . $sql . "<br>" . $conn->error;
                   echo "<script type='text/javascript'>alert('$errorMessage');</script>";
               }

             } else if ($metalEffect != ''){
               $sql = "DELETE FROM `Metals` WHERE `Effect` = '$metalEffect'";

               if ($conn->query($sql) === TRUE) {
                   echo "<script type='text/javascript'>alert('Record Deleted');</script>";
               } else {
                   $errorMessage = "Error: " . $sql . "<br>" . $conn->error;
                   echo "<script type='text/javascript'>alert('$errorMessage');</script>";
               }
             }

           }
          ?>

         <div class="inputSection">
           <form method='POST' action=''>
             <div class="formInput">
               Power Name: <input type="text" name="pName"><br>
               Metal Used with Power: <input type="text" name="pMetal"><br>
               Power Discription: <input type="text" name="pDiscription">
             </div>
             <div class="formButtons">
               <input type="submit" name="addButton" value="Add"><br>
               <input type="submit" name="deleteButton" value="Delete">
             </div>
           </form>
         </div>

         <?php
         /**********************
         Add to Database
         Power Table
         **********************/
           if (isset($_POST['addButton'])){
             $powerName = $_POST['pName'];
             $powerDiscription = $_POST['pDiscription'];
             $powerMetal = $_POST['pMetal'];

             //Check that all values are present
             if ($powerName != '' && $powerDiscription != '' && $powerMetal != ''){
               $sql = "INSERT INTO `Power`(`pName`, `Discription`, `mName`) VALUES ('$powerName','$powerDiscription','$powerMetal')";

               if ($conn->query($sql) === TRUE) {
                   echo "<script type='text/javascript'>alert('New Record Created');</script>";
               } else {
                 $errorMessage = "Error: " . $sql . "<br>" . $conn->error;
                 echo "<script type='text/javascript'>alert('$errorMessage');</script>";
               }
             }

             /*******************
             Delete from Database
             Power Table
             ********************/
           } else if (isset($_POST['deleteButton'])){
             $powerName = $_POST['pName'];
             $powerMetal = $_POST['pMetal'];

             if ($powerName != '' && $powerDiscription != '' && $powerMetal != ''){
               $sql = "DELETE FROM `Power` WHERE `pName` = '$powerName' AND `Discription` = '$powerDiscription' AND `mName` = '$powerMetal'";

               if ($conn->query($sql) === TRUE) {
                   echo "<script type='text/javascript'>alert('Record Deleted');</script>";
               } else {
                   $errorMessage = "Error: " . $sql . "<br>" . $conn->error;
                   echo "<script type='text/javascript'>alert('$errorMessage');</script>";
               }

             } else if ($powerName != '' && $powerDiscription != ''){
               $sql = "DELETE FROM `Power` WHERE `pName` = '$powerName' AND `Discription` = '$powerDiscription'";

               if ($conn->query($sql) === TRUE) {
                   echo "<script type='text/javascript'>alert('Record Deleted');</script>";
               } else {
                   $errorMessage = "Error: " . $sql . "<br>" . $conn->error;
                   echo "<script type='text/javascript'>alert('$errorMessage');</script>";
               }

             } else if ($powerName != '' && $powerMetal != ''){
               $sql = "DELETE FROM `Power` WHERE `pName` = '$powerName' AND `mName` = '$powerMetal'";

               if ($conn->query($sql) === TRUE) {
                   echo "<script type='text/javascript'>alert('Record Deleted');</script>";
               } else {
                   $errorMessage = "Error: " . $sql . "<br>" . $conn->error;
                   echo "<script type='text/javascript'>alert('$errorMessage');</script>";
               }

             } else if ($powerDiscription != '' && $powerMetal != ''){
               $sql = "DELETE FROM `Power` WHERE `Discription` = '$powerDiscription' AND `mName` = '$powerMetal'";

               if ($conn->query($sql) === TRUE) {
                   echo "<script type='text/javascript'>alert('Record Deleted');</script>";
               } else {
                   $errorMessage = "Error: " . $sql . "<br>" . $conn->error;
                   echo "<script type='text/javascript'>alert('$errorMessage');</script>";
               }

             } else if ($powerName != ''){
               $sql = "DELETE FROM `Power` WHERE `pName` = '$powerName'";

               if ($conn->query($sql) === TRUE) {
                   echo "<script type='text/javascript'>alert('Record Deleted');</script>";
               } else {
                   $errorMessage = "Error: " . $sql . "<br>" . $conn->error;
                   echo "<script type='text/javascript'>alert('$errorMessage');</script>";
               }

             } else if ($powerDiscription != ''){
               $sql = "DELETE FROM `Power` WHERE `Discription` = '$powerDiscription'";

               if ($conn->query($sql) === TRUE) {
                   echo "<script type='text/javascript'>alert('Record Deleted');</script>";
               } else {
                   $errorMessage = "Error: " . $sql . "<br>" . $conn->error;
                   echo "<script type='text/javascript'>alert('$errorMessage');</script>";
               }

             } else if ($powerMetal != ''){
               $sql = "DELETE FROM `Power` WHERE `mName` = '$powerMetal'";

               if ($conn->query($sql) === TRUE) {
                   echo "<script type='text/javascript'>alert('Record Deleted');</script>";
               } else {
                   $errorMessage = "Error: " . $sql . "<br>" . $conn->error;
                   echo "<script type='text/javascript'>alert('$errorMessage');</script>";
               }
             }
           }
          ?>

      </div>

    </main>

  </body>
</html>
