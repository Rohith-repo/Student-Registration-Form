<?php
// database connection code
if(isset($_POST['name'])) {
    // $con = mysqli_connect('localhost', 'database_user', 'database_password','database');
    $con = mysqli_connect('localhost', 'root', '741852963','test');

    // get the post records
    $name = $_POST['name'];
    $id = $_POST['id'];
    $email = $_POST['email'];
    $dept = $_POST['dept'];
    $gender = $_POST['gender'];

    // Check if ID already exists
    $check_query = "SELECT * FROM `registration` WHERE `id` = '$id'";
    $check_result = mysqli_query($con, $check_query);
    
    if(mysqli_num_rows($check_result) > 0) {
        echo "ID already exists";
    } else {
        // database insert SQL code
        $sql = "INSERT INTO `registration` (`name`, `id`, `email`, `dept`, `gender`) VALUES ('$name', '$id', '$email', '$dept', '$gender')";

        // insert in database 
        $rs = mysqli_query($con, $sql);
        
        if($rs) {
            echo "Data Inserted";
        } else {
            echo "Error inserting records: " . mysqli_error($con);
        }
    }
} else {
    echo "Are you a genuine visitor?";
}
?>
