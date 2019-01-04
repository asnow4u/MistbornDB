<!DOCTYPE html>
<html>
  <head>

    <meta charset="utf-8">
    <title>Mistborn-Search</title>

    <link rel="stylesheet" href="style.css">
  </head>

  <body class="searchBody">

    <?php
    /***********************************
    Connect to the server
    ************************************/

    $host = 'classmysql.engr.oregonstate.edu';
    $db = 'cs340_snowan';
    $user = 'cs340_snowan';
    $charset = 'utf8mb4';
    $pass = 'myONIDaccount97331';
    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

    $status = false;

    //Create Connection
    $conn = new mysqli($host, $user, $pass, $db);

    //Test connection
    if ($conn->connect_error){
      die($conn->connect_error);
    } else {
      $status = true;
    }
    ?>

    <header class="searchHeader">
      <h1 class="searchTitle">Search</h1>
      <h2 class="homeButton"><a href='index.html'>Mistborn<br>Database</a></h2>
    </header>

    <main class="searchMain">


      <div class="searchButtonRow">
          <button type="button" id="searchCharacter">Character</button>
          <button type="button" id="searchJob">Job</button>
          <button type="button" id="searchMetal">Metal</button>
          <button type="button" id="searchPower">Power</button>
      </div>

        <div id="modal-backdrop" class="hidden"></div>

        <!--Character modal-->
        <div id="character-search-modal" class="hidden">
          <div class="modal-dialog" id="character-modal-dialog">

            <div class="modal-header" id="character-modal-header">
              <h3 id="character-modal-title">Search Character</h3>
            </div>

            <div class="modal-body" id="character-modal-body">
              <div class="input-element" id="character-input-element">

                <form method='POST' action=''>
                  <div class="input-element">
                    <h4 id="text-input-label">Character Name:</h4>
                    <input type="text" name="text1" id="text-input">
                  </div>

                  <div class="input-element">
                    <h4 id="second-text-input-lable">Character's Job:</h4>
                    <input type="text" name="text2" id="second-text-input">
                  </div>

                  <input class="modalButton" type="submit" name='characterSearchButton' value='Search'>
                </form>

              </div>
            </div>
          </div>
        </div>

        <!--Job modal-->
        <div id="job-search-modal" class="hidden">
          <div class="modal-dialog" id="job-modal-dialog">

            <div class="modal-header" id="job-modal-header">
              <h3 id="job-modal-title">Search Job</h3>
            </div>

            <div class="modal-body" id="job-modal-body">
              <div class="input-element" id="job-input-element">

                <form method='POST' action=''>
                  <div class="input-element">
                    <h4 id="text-input-label">Job Name:</h4>
                    <input type="text" name="text1" id="text-input">
                  </div>

                  <div class="input-element">
                    <h4 id="second-text-input-lable">Metal used with Job:</h4>
                    <input type="text" name="text2" id="second-text-input">
                  </div>

                  <input class="modalButton" type="submit" name='JobSearchButton' value='Search'>
                </form>

              </div>
            </div>
          </div>
        </div>

        <!--Metal modal-->
        <div id="metal-search-modal" class="hidden">
          <div class="modal-dialog" id="metal-modal-dialog">

            <div class="modal-header" id="character-modal-header">
              <h3 id="metal-modal-title">Search Metal</h3>
            </div>

            <div class="modal-body" id="metal-modal-body">
              <div class="input-element" id="metal-input-element">

                <form method='POST' action=''>
                  <div class="input-element">
                    <h4 id="text-input-label">Metal Name:</h4>
                    <input type="text" name="text1" id="text-input">
                  </div>

                  <div class="input-element">
                    <h4 id="second-text-input-lable">Metal's Group:</h4>
                    <input type="text" name="text2" id="second-text-input">
                  </div>

                  <div id="third-input-element" class="input-element">
                    <h4 id="third-text-input-lable">Metal Effect ():</h4>
                    <input type="text" name="text3" id="third-text-input">
                  </div>

                  <input class="modalButton" type="submit" name='metalSearchButton' value='Search'>
                </form>

              </div>
            </div>
          </div>
        </div>

        <!--Power modal-->
        <div id="power-search-modal" class="hidden">
          <div class="modal-dialog" id="power-modal-dialog">

            <div class="modal-header" id="character-modal-header">
              <h3 id="power-modal-title">Search Power</h3>
            </div>

            <div class="modal-body" id="power-modal-body">
              <div class="input-element" id="power-input-element">

                <form method='POST' action=''>
                  <div class="input-element">
                    <h4 id="text-input-label">Power Name:</h4>
                    <input type="text" name="text1" id="text-input">
                  </div>

                  <div class="input-element">
                    <h4 id="second-text-input-lable">Power's Discription:</h4>
                    <input type="text" name="text2" id="second-text-input">
                  </div>

                  <div id="third-input-element" class="input-element">
                    <h4 id="third-text-input-lable">Metal used:</h4>
                    <input type="text" name="text3" id="third-text-input">
                  </div>

                  <input class="modalButton" type="submit" name='powerSearchButton' value='Search'>
                </form>

              </div>
            </div>
          </div>
        </div>

        <div class="searchResults">
          <p class="textbox" id="resultBox">

            <?php
              /***************************
              Character Search
              Use info from character model
              Print info from DB based on what was provided
              ***************************/

              if (isset($_POST['characterSearchButton'])){

                $arg1 = $_POST['text1'];
                $arg2 = $_POST['text2'];

                if ($arg1 != '' && $arg2 != ''){
                  $sql = "SELECT * FROM `Character` WHERE `cName` = '$arg1' AND `jName` = '$arg2'";
                  $results = $conn->query($sql);

                  if ($results->num_rows > 0) {
                    while ($row = $results->fetch_assoc()){
                      echo nl2br($row["cName"]. " is a " .$row["jName"]. "\n");
                    }
                  } else {
                    echo "No results found";
                  }

                } else if ($arg1 != ''){
                  $sql = "SELECT * FROM `Character` WHERE `cName` = '$arg1'";
                  $results = $conn->query($sql);

                  if ($results->num_rows > 0) {
                    while ($row = $results->fetch_assoc()){
                      echo nl2br($row["cName"]. " is a " .$row["jName"]. "\n");

                    }
                  } else {
                    echo "No results found";
                  }


                } else if ($arg2 != ''){
                  $sql = "SELECT * FROM `Character` WHERE `jName` = '$arg2'";
                  $results = $conn->query($sql);

                  if ($results->num_rows > 0) {
                    while ($row = $results->fetch_assoc()){
                      echo nl2br($row["cName"]. " is a " .$row["jName"]. "\n");
                    }
                  } else {
                    echo "No results found";
                  }
                }

                /***************************
                Job Search
                Use info from job model
                Print info from DB based on what was provided
                ***************************/
              } else if (isset($_POST['JobSearchButton'])){
                $arg1 = $_POST['text1'];
                $arg2 = $_POST['text2'];

                if ($arg1 != '' && $arg2 != ''){
                  $sql = "SELECT * FROM `Job` WHERE `jName` = '$arg1' AND `mName` = '$arg2'";
                  $results = $conn->query($sql);

                  if ($results->num_rows > 0) {
                    while ($row = $results->fetch_assoc()){
                      echo nl2br($row["jName"]. "s use " .$row["mName"]. " to accomplish their tasks\n");
                    }
                  } else {
                    echo "No results found";
                  }

                } else if ($arg1 != ''){
                  $sql = "SELECT * FROM `Job` WHERE `jName` = '$arg1'";
                  $results = $conn->query($sql);

                  if ($results->num_rows > 0) {
                    while ($row = $results->fetch_assoc()){
                      echo nl2br($row["jName"]. "s use " .$row["mName"]. " to accomplich their tasks\n");

                    }
                  } else {
                    echo "No results found";
                  }


                } else if ($arg2 != ''){
                  $sql = "SELECT * FROM `Job` WHERE `mName` = '$arg2'";
                  $results = $conn->query($sql);

                  if ($results->num_rows > 0) {
                    while ($row = $results->fetch_assoc()){
                      echo nl2br($row["jName"]. "s use " .$row["mName"]. " to accomplish their tasks\n");
                    }
                  } else {
                    echo "No results found";
                  }
                }

                /***************************
                Metal Search
                Use info from Metal model
                Print info from DB based on what was provided
                ***************************/
              } else if (isset($_POST['metalSearchButton'])){
                $arg1 = $_POST['text1'];
                $arg2 = $_POST['text2'];
                $arg3 = $_POST['text3'];

                if ($arg1 != '' && $arg2 != '' && $arg3 != ''){
                  $sql = "SELECT * FROM `Metals` WHERE `mName` = '$arg1' AND `Group` = '$arg2' AND `Effect` = '$arg3'";
                  $results = $conn->query($sql);

                  if ($results->num_rows > 0) {
                    while ($row = $results->fetch_assoc()){
                      echo nl2br($row["mName"]. " is part of the " .$row["Group"]. " category of metals and apply a " .$row["Effect"]. " effect \n");
                    }
                  } else {
                    echo "No results found";
                  }

                } else if ($arg1 != '' && $arg2 != ''){
                  $sql = "SELECT * FROM `Metals` WHERE `mName` = '$arg1' AND `Group` = '$arg2'";
                  $results = $conn->query($sql);

                  if ($results->num_rows > 0) {
                    while ($row = $results->fetch_assoc()){
                      echo nl2br($row["mName"]. " is part of the " .$row["Group"]. " category of metals and apply a " .$row["Effect"]. " effect \n");
                    }
                  } else {
                    echo "No results found";
                  }

                } else if ($arg1 != '' && $arg3 != ''){
                  $sql = "SELECT * FROM `Metals` WHERE `mName` = '$arg1' AND `Effect` = '$arg3'";
                  $results = $conn->query($sql);

                  if ($results->num_rows > 0) {
                    while ($row = $results->fetch_assoc()){
                      echo nl2br($row["mName"]. " is part of the " .$row["Group"]. " category of metals and apply a " .$row["Effect"]. " effect \n");
                    }
                  } else {
                    echo "No results found";
                  }

                } else if ($arg2 != '' && $arg3 != ''){
                  $sql = "SELECT * FROM `Metals` WHERE `Group` = '$arg1' AND `Effect` = '$arg2'";
                  $results = $conn->query($sql);

                  if ($results->num_rows > 0) {
                    while ($row = $results->fetch_assoc()){
                      echo nl2br($row["mName"]. " is part of the " .$row["Group"]. " category of metals and apply a " .$row["Effect"]. " effect \n");
                    }
                  } else {
                    echo "No results found";
                  }

                } else if ($arg1 != ''){
                  $sql = "SELECT * FROM `Metals` WHERE `mName` = '$arg1'";
                  $results = $conn->query($sql);

                  if ($results->num_rows > 0) {
                    while ($row = $results->fetch_assoc()){
                      echo nl2br($row["mName"]. " is part of the " .$row["Group"]. " category of metals and apply a " .$row["Effect"]. " effect \n");

                    }
                  } else {
                    echo "No results found";
                  }

                } else if ($arg2 != ''){
                  $sql = "SELECT * FROM `Metals` WHERE `Group` = '$arg2'";
                  $results = $conn->query($sql);

                  if ($results->num_rows > 0) {
                    while ($row = $results->fetch_assoc()){
                      echo nl2br($row["mName"]. " is part of the " .$row["Group"]. " category of metals and apply a " .$row["Effect"]. " effect \n");
                    }
                  } else {
                    echo "No results found";
                  }

              } else if ($arg3 != ''){
                $sql = "SELECT * FROM `Metals` WHERE `Effect` = '$arg3'";
                $results = $conn->query($sql);

                if ($results->num_rows > 0) {
                  while ($row = $results->fetch_assoc()){
                    echo nl2br($row["mName"]. " is part of the " .$row["Group"]. " category of metals and apply a " .$row["Effect"]. " effect \n");
                  }
                } else {
                  echo "No results found";
                }
              }

              /***************************
              Power Search
              Use info from power model
              Print info from DB based on what was provided
              ***************************/
              } else if (isset($_POST['powerSearchButton'])){
                $arg1 = $_POST['text1'];
                $arg2 = $_POST['text2'];
                $arg3 = $_POST['text3'];

                if ($arg1 != '' && $arg2 != '' && $arg3 != ''){
                  $sql = "SELECT * FROM `Power` WHERE `pName` = '$arg1' AND `Discription` = '$arg2' AND `mName` = '$arg3'";
                  $results = $conn->query($sql);

                  if ($results->num_rows > 0) {
                    while ($row = $results->fetch_assoc()){
                      echo nl2br($row["pName"]. ": burning " .$row["mName"]. " will " .$row["Discription"]. "\n");
                    }
                  } else {
                    echo "No results found";
                  }

                } else if ($arg1 != '' && $arg2 != ''){
                  $sql = "SELECT * FROM `Power` WHERE `pName` = '$arg1' AND `Discription` = '$arg2'";
                  $results = $conn->query($sql);

                  if ($results->num_rows > 0) {
                    while ($row = $results->fetch_assoc()){
                      echo nl2br($row["pName"]. ": burning " .$row["mName"]. " will " .$row["Discription"]. "\n");
                    }
                  } else {
                    echo "No results found";
                  }

                } else if ($arg1 != '' && $arg3 != ''){
                  $sql = "SELECT * FROM `Power` WHERE `pName` = '$arg1' AND `mName` = '$arg3'";
                  $results = $conn->query($sql);

                  if ($results->num_rows > 0) {
                    while ($row = $results->fetch_assoc()){
                      echo nl2br($row["pName"]. ": burning " .$row["mName"]. " will " .$row["Discription"]. "\n");
                    }
                  } else {
                    echo "No results found";
                  }

                } else if ($arg2 != '' && $arg3 != ''){
                  $sql = "SELECT * FROM `Power` WHERE `Discription` = '$arg1' AND `mName` = '$arg2'";
                  $results = $conn->query($sql);

                  if ($results->num_rows > 0) {
                    while ($row = $results->fetch_assoc()){
                      echo nl2br($row["pName"]. ": burning " .$row["mName"]. " will " .$row["Discription"]. "\n");
                    }
                  } else {
                    echo "No results found";
                  }

                } else if ($arg1 != ''){
                  $sql = "SELECT * FROM `Power` WHERE `pName` = '$arg1'";
                  $results = $conn->query($sql);

                  if ($results->num_rows > 0) {
                    while ($row = $results->fetch_assoc()){
                      echo nl2br($row["pName"]. ": burning " .$row["mName"]. " will " .$row["Discription"]. "\n");

                    }
                  } else {
                    echo "No results found";
                  }

                } else if ($arg2 != ''){
                  $sql = "SELECT * FROM `Power` WHERE `Discription` = '$arg2'";
                  $results = $conn->query($sql);

                  if ($results->num_rows > 0) {
                    while ($row = $results->fetch_assoc()){
                      echo nl2br($row["pName"]. ": burning " .$row["mName"]. " will " .$row["Discription"]. "\n");
                    }
                  } else {
                    echo "No results found";
                  }


              } else if ($arg3 != ''){
                $sql = "SELECT * FROM `Power` WHERE `mName` = '$arg3'";
                $results = $conn->query($sql);

                if ($results->num_rows > 0) {
                  while ($row = $results->fetch_assoc()){
                    echo nl2br($row["pName"]. ": burning " .$row["mName"]. " will " .$row["Discription"]. "\n");
                  }
                } else {
                  echo "No results found";
                }
              }

            }
            ?>

          </p>
        </div>

    </main>

  </body>

  <script src="search.js" charset="utf-8"></script>

</html>
