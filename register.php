<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>CEH</title>
        <?php require 'utils/styles.php'; ?><!--css links. file found in utils folder-->
        
  
    <body>
    <?php require 'utils/header.php'; ?>
    <script>
            function scrollToContent() {
                var element = document.getElementById("content");
                var rect = element.getBoundingClientRect();
                var scrollTop = window.pageYOffset || document.documentElement.scrollTop;
                var finalScroll = rect.top + scrollTop - 90; // adjust the offset value as per your requirement
                window.scroll({
                    top: finalScroll,
                    behavior: 'smooth' // add smooth scrolling behavior
                });
            }
        </script>
    </head>
    <body onload="scrollToContent()">
   
    <div id="content" class ="content"><!--body content holder-->
            <div class = "container">
                <div class ="col-md-6 col-md-offset-3">
    <form method="POST">

   
        <label>Student Roll number:</label><br>
        <input type="text" name="Roll_number" class="form-control" required><br><br>

        <label>Student Name:</label><br>
        <input type="text" name="name" class="form-control" required><br><br>

        <label>Branch:</label><br>
        <input type="text" name="branch" class="form-control" required><br><br>

        <label>Semester:</label><br>
        <input type="text" name="sem" class="form-control" required><br><br>

        <label>Email:</label><br>
        <input type="text" name="email"  class="form-control" required ><br><br>

        <label>Phone:</label><br>
        <input type="text" name="phone"  class="form-control" required><br><br>

        <label>College:</label><br>
        <input type="text" name="college"  class="form-control" required><br><br>

        <button type="submit" name="update" required>Submit</button><br><br>
        <a href="Roll_number.php" ><u>Already registered ?</u></a>

    </div>
    </div>
    </div>
    </form>
    

    <?php require 'utils/footer.php'; ?>
    </body>
</html>

<?php

    if (isset($_POST["update"]))
    {
        $Roll_number=$_POST["Roll_number"];
        $name=$_POST["name"];
        $branch=$_POST["branch"];
        $sem=$_POST["sem"];
        $email=$_POST["email"];
        $phone=$_POST["phone"];
        $college=$_POST["college"];


        if( !empty($Roll_number) || !empty($name) || !empty($branch) || !empty($sem) || !empty($email) || !empty($phone) || !empty($college) )
        {
        
            include 'classes/db1.php';     
                $INSERT="INSERT INTO participent (Roll_number,name,branch,sem,email,phone,college) VALUES('$Roll_number','$name','$branch',$sem,'$email','$phone','$college')";

          
            

          
                if($conn->query($INSERT)===True){
                    echo "<script>
                    alert('Registered Successfully!');
                    window.location.href='Roll_number.php';
                    </script>";
                }
                else
                {
                    echo"<script>
                    alert(' Already registered this Roll_number');
                    window.location.href='Roll_number.php';
                    </script>";
                }
               
                $conn->close();
            
        }
        else
        {
            echo"<script>
            alert('All fields are required');
            window.location.href='register.php';
                    </script>";
        }
    }
    
?>