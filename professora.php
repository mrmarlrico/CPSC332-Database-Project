<html>
    <body>
        <?php

        // username and password need to be replaced by your username and password
        $link = mysqli_connect('mariadb', 'cs332s30', 'iDl06Vq9','cs332s30');
        if (!$link) {
            die('Could not connect: ' . mysql_error());
        }

        $SSN = $_POST["SSN"];
        
        $query = "SELECT Title, Classroom, Meet_day, Beg_time, End_time
                  FROM Section as s, Course as c 
                  WHERE s.P_SSN = '".$SSN."' and s.Course_num = c.Course_num;";
        
        $result = $link->query($query);

        if ($result->num_rows > 0) {
            // output data of each row
            echo "SSN - " .$SSN. "<br>";
            while($row = $result->fetch_assoc()) {
                echo "Title: " . $row["Title"]. " - Classroom: " .$row["Classroom"]. " - Meeting days: " . $row["Meet_day"]. " - Start time: " . $row["Beg_time"]. " - End time: " . $row["End_time"].  "<br>";
            }
        }
        else {
            echo "0 results";
        }
        
        $result->free_result();
        $link->close();

        ?>
    </body>
</html>