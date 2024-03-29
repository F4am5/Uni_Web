<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="reference.css">
        <title>the Crew Song Collection</title>
    </head>
    <body>
        <div id="container">
            <h2>Song Update Save</h2>

            <?php
            
                $songID = $_POST['songID'];
                $songTitle = $_POST['songTitle'];
                $artistBandName = $_POST['artistBandName'];
                $audioVideoLink = $_POST['audioVideoLink'];
                $genre = $_POST['genre'];
                $language = $_POST['language'];
                $releaseDate = $_POST['releaseDate'];
                $status = $_POST['agreement'];

                //Declare DB connection variables
                $host = "localhost"; //Hostname
                $user = "root"; //Database userid
                $pass = ""; //Database pwd
                $db = "thecrew_songcollectiondb"; //Please write your DB

                //Create connection
                $conn = new mysqli($host, $user, $pass, $db);

                //Check connection
                if($conn->connect_error) //To check if DB connection IS NOT OK
                {
                    die("Connection failed: ".$conn->connect_error); //Display MSQL error
                }
                else //Connection OK - update new form data into database
                {
                    //SOMETHING SOMEWHERE HERE IS GOOFY AH  //HONEST HTML/PHP STUDENT REACTION
                    $queryUpdate = "UPDATE SONG SET
                                    songTitle = '".$songTitle."',
                                    artistBandName = '".$artistBandName."',
                                    audioVideoLink = '".$audioVideoLink."',
                                    genre = '".$genre."',
                                    language = '".$language."',
                                    releaseDate = '".$releaseDate."',
                                    status = '".$status."'
                                    WHERE songID = '".$songID."'";

                    //To execute $queryUpdate query & assign query result to $resultUpdate
                    if($conn->query($queryUpdate) === TRUE)
                    {
                        echo "Successfully updated with new data";
                        echo "<br><br>";
                        echo "<a href='viewSong.php'><button>View Song List</button></a>";
                    }
                    else
                    {
                        echo "Error updating record: ".$conn->error;
                    }
                }
                $conn->close();
            ?>
        </div>
    </body>
</html>