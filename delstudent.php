<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
        body {
          font-family: Arial, Helvetica, sans-serif;
        }

        .navbar {
          overflow: hidden;
          background-color: #333;
        }

        .navbar a {
          float: left;
          font-size: 16px;
          color: white;
          text-align: center;
          padding: 14px 16px;
          text-decoration: none;
        }

        .dropdown {
          float: left;
          overflow: hidden;
        }

        .dropdown .dropbtn {
          font-size: 16px;
          border: none;
          outline: none;
          color: white;
          padding: 14px 16px;
          background-color: inherit;
          font-family: inherit;
          margin: 0;
        }

        .navbar a:hover, .dropdown:hover .dropbtn {
          background-color: red;
        }

        .dropdown-content {
          display: none;
          position: absolute;
          background-color: #f9f9f9;
          min-width: 160px;
          box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
          z-index: 1;
        }

        .dropdown-content a {
          float: none;
          color: black;
          padding: 12px 16px;
          text-decoration: none;
          display: block;
          text-align: left;
        }

        .dropdown-content a:hover {
          background-color: #ddd;
        }

        .dropdown:hover .dropdown-content {
          display: block;
        }
        </style>
    </head>
    <body>
        <div class="navbar">
            <a href="home.php">Home</a>
            <div class="dropdown">
                <button class="dropbtn">View
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                    <a href="ViewStudent.php">Student</a>
                    <a href="ViewParent.php">Parent</a>
                    <a href="ViewTeacher.php">Teacher</a>
                    <a href="ViewClass.php">Class</a>
                </div>
            </div>
            <div class="dropdown">
                <button class="dropbtn">Add
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                    <a href="AddStudent.php">Student</a>
                    <a href="AddParent.php">Parent</a>
                    <a href="AddTeacher.php">Teacher</a>
                    <a href="AddClass.php">Class</a>
                </div>
            </div>
            <div class="dropdown">
              <button class="dropbtn">Delete
                  <i class="fa fa-caret-down"></i>
              </button>
              <div class="dropdown-content">
                  <a href="delstudent.php">Student</a>
                  <a href="delParent.php">Parent</a>
                  <a href="delTeacher.php">Teacher</a>
                  <a href="delClass.php">Class</a>
              </div>
          </div>
          <div class="dropdown">
            <button class="dropbtn">Update
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a href="updstudent.php">Student</a>
                <a href="updParent.php">Parent</a>
                <a href="updTeacher.php">Teacher</a>
                <a href="updClass.php">Class</a>
            </div>
            </div>
        </div>
        <h1>Delete student</h1>
        <form method="post">
        <label for="studentID">Student ID:<select name="sid"><?php
            $link = mysqli_connect("localhost", "root", "", "school");
            if ($link === false) {
                die("Connection failed: " . mysqli_connect_error());
            }
            $sql = "SELECT sid FROM student";
            $result = mysqli_query($link, $sql);
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='" . $row['sid'] . "'>" . $row['sid'] . "</option>";
                }
            } else {
                echo "<option value=''>No Student ID found</option>";
            }
            mysqli_close($link);
            ?></select></label>
          <input type="submit" name="submit" value="Delete" >
        </form>
        <?php
       $link = mysqli_connect("localhost", "root", "", "school");
       if ($link === false) {
       die("Connection failed: ");
      }

      if (isset($_POST['submit'])) {
        $studentID = $_POST['sid'];
        $sql = "DELETE FROM student WHERE sid=$studentID";
        if (mysqli_query($link,$sql)) {
          echo "Record deleted successfully";
        } else {
            echo "Error deleting record" . $link->error;
        }
        $link->close();
        
          echo"delete operation";
        }
        
        ?>
    </body>
</html>