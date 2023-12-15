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
        <h1>Add Parent</h1>
        <form method="post">
          <label for="parentName">Parent Name</label>
          <input type="text" name="parentName"><br>
          <label for="parentaddress">Parent address</label>
          <input type="text" name="parentaddress"><br>
          <label for="parentphone">Parent phone</label>
          <input type="text" name="parentphone"><br>
          <label for="parentEmail">Parent Email</label>
          <input type="text" name="parentEmail"><br>
          <input type="submit" value="Add" name="submit"><br>
        </form>

        <?php
$link = mysqli_connect("localhost", "root", "", "school");
if ($link === false) {
  die("Connection failed: ");
}

if (isset($_POST['submit'])) {
    $parentName = $_POST['parentName'];
    $parentaddress = $_POST['parentaddress'];
    $parentphone = $_POST['parentphone'];
    $parentEmail = $_POST['parentEmail'];
    $sql = "INSERT INTO parent (pname,paddress,pphone,pemail) VALUES ('$parentName','$parentaddress','$parentphone','$parentEmail')";

if (mysqli_query($link,$sql)) {
  echo "New record created successfully";
} else {
    echo "Error adding record";
}
}

?>
    </body>
</html>