<?php
include "db_con.php";
$student_id = $_GET['student_id'];

if(isset($_POST["submit"])){
    $student_id=$_POST["student_id"];
    $last_name=$_POST["last_name"];
    $first_name=$_POST["first_name"];
    $gender=$_POST["gender"];
    $age=$_POST["age"];
    $contact_number=$_POST["contact_number"];
    $email=$_POST["email"];
    $department=$_POST["department"];
    $major=$_POST["major"];
    $year=$_POST["year"];

    $sql = "UPDATE `student_info` SET `student_id`='$student_id',`last_name`='$last_name',`first_name`='$first_name',`gender`='$gender',`age`='$age',`contact_number`='$contact_number',`email`='$email',`department`='$department',`major`='$major',`year`='$year' WHERE student_id=$student_id";

    $result = mysqli_query($conn, $sql);

    if($result) {
        header("Location: index.php?msg=Data updated successfully");
    }
    else {
        echo"Failed: " .mysqli_error( $conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Document</title>
</head>
<body>
    <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color:rgb(0, 0, 0);">
        <b style="color:rgb(255, 255, 255)">STUDENT INFORMATION SYSTEM</b>
    </nav>

    <div class="container">
        <div class="text-center mb-4">
            <h3>Edit Student Information</h3>
            <p class="text-muted">Cick update after changing any information</p>
        </div>
        <?php
        $student_id = $_GET['student_id'];
        $sql = "SELECT * FROM `student_info` WHERE student_id = $student_id LIMIT 1";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        ?>

        <div class="container d-flex justify-content-center">
            <form action="" method="post" style="width:25vw; min-width:300px;">
          
                <div class="col">
                    <label class="form-label">Student ID:</label>
                    <input type="text" class="form-control" name="student_id" 
                    value="<?php echo $row['student_id'] ?>">
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">Last Name:</label>
                        <input type="text" class="form-control" name="last_name" 
                        value="<?php echo $row['last_name'] ?>">
                    </div>

                    <div class="col">
                        <label class="form-label">First Name:</label>
                        <input type="text" class="form-control" name="first_name" 
                        value="<?php echo $row['first_name'] ?>">
                    </div>

                </div>
            

                <div class="form-group mb-3">
                    <label>Gender:</label><br>
                    <input type="radio" class="form-check-input" name="gender" 
                    id="male" value="male" <?php echo ($row['gender'] == 'male') ?"checked":""; ?>>
                    <label for="male" class="form-input-label">Male</label>
                    &nbsp;
                    <input type="radio" class="form-check-input" name="gender" 
                    id="female" value="female" <?php echo ($row['gender'] == 'female') ?"checked":""; ?>>>
                    <label for="female" class="form-input-label">Female</label>
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">Age:</label>
                        <input type="text" class="form-control" name="age" 
                        value="<?php echo $row['age'] ?>">
                    </div>

                    <div class="col">
                        <label class="form-label">Contact Number:</label>
                        <input type="text" class="form-control" name="contact_number" 
                        value="<?php echo $row['contact_number'] ?>">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email:</label>
                    <input type="email" class="form-control" name="email" 
                    value="<?php echo $row['email'] ?>">
                </div>

                <div class="col">
                    <label class="form-label">Department:</label>
                    <input type="text" class="form-control" name="department" 
                    value="<?php echo $row['department'] ?>">
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">Major:</label>
                        <input type="text" class="form-control" name="major" 
                        value="<?php echo $row['major'] ?>">
                    </div>

                    <div class="col">
                        <label class="form-label">Year:</label>
                        <input type="text" class="form-control" name="year" 
                        value="<?php echo $row['year'] ?>">
                    </div>
                </div>

                <div>
                    <button type="submit" class="btn btn-success" name="submit">Update</button>
                    <a href="index.php" class="btn btn-danger">Cancel</a>
                </div>
            </form>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>