<?php
    include 'conn.php';
    $usere="";
    $pww="";
    if(isset($_POST['submit'])){
    $tea = $_POST['username'];
    $pw = $_POST['password'];
    $Cpw = $_POST['confirm'];

    $resulta =mysqli_query($conn,"SELECT * from user where username = '$tea'");
    if(mysqli_num_rows($resulta)>0 ){
       $usere = "Username already taken.";
    }
    else if($tea == NULL){
        $usere = "Enter a username.";
    }
    else if($Cpw == NULL){
        $pww ="Enter a password.";
    }
    else if($Cpw != $pw){
        $pww ="Passwords do not match.";
    }
    else{
        $resultdo =mysqli_query($conn,"INSERT into user(username, passwords, roles)
        VALUES('$tea', '$pw','teacher')");
         echo '<script type="text/javascript">'.'alert("Registered successfully.");</script>';
         echo '<script type="text/javascript">' . 'window.location = "Log_in1.php?teach='.$tea.'"'.'</script>';
    }
}

?>
<!doctype html>
<html lang="en">
  <head>
    <title>Admin</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../asset/bootstrap-5.0.1-dist/css/bootstrap.min.css">
    <!---Sign in CSS -->
    <link rel="stylesheet" href="../css/register.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/common.css">
</head>
  <body>
    <!----MAIN CONTAINER-->
    <div class="Main container-lg align-items-sm-center">
        <!-----SIGN IN CONTAINER-->
        <form class="form-container-style" method ="POST" action=''>
            <div class="blocks form-group container mt-5">
                <h1 class="display-4 text-center">Register</h1>
                <!------USER INPUT START-->
                    <!----USERNAME-->
                    <label><?=$usere?></label>
                <div class="Username input-group">
                    <span class="input-group-text" ><img src="../img/person-circle.svg"></span>
                    
                    <input type="text" name='username' class="form-control" placeholder="Username" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                </div>
                    <!-----PASSWORD-->
                    <label><?=$pww?></label>
                <div class="Password input-group">
                    <span class="input-group-text" ><img src="../img/lock-fill.svg"></span>
                    <input id = "password"type="password"  onKeyUp=check() maxlength="15"name='password' class="form-control" placeholder="Password" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    <span class="input-group-text"id="eye" style ="--icon: url(../img/eye-fill.svg);"></span>
                </div>
               

                <div class="max" id="max"></div>
                <div class="min" id="min"></div>
                
                <div class="CPassword input-group">
                    <span class="input-group-text" ><img src="../img/lock-fill.svg"></span>
                    <input id = "cpassword"type="password"  name='confirm'maxlength="15"class="form-control" placeholder="Confirm Password" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    <span class="input-group-text" id="ceye" style ="--icon: url(../img/eye-fill.svg);"></span>
                </div>
                
                <!--USER INPUT END-->
                <!-------BUTTON-------->
                <div class = "button d-flex justify-content-center mb-2">
                        <button type="submit" name="submit" class="button">
                            Register
                            <span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span>
                        </button>
                        
                </div>
                <div class = "button d-flex justify-content-center mb-2">
                <a href="../../user/view/table.php" type="button" class="button ">
                Back
                </span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span>
               
              </a>
</div>
            </div>
        </form>
        <script>
           
           function check() {
    stringLength = document.getElementById('password').value.length;
    if (stringLength >= 15) {
         document.getElementById('max').innerText = "Maximum characters are 15";
    } 
    else if (stringLength == 4 ||stringLength ==3 ||stringLength ==2 ||stringLength ==1){
        document.getElementById('min').innerText = "Minimum characters are 4";
    }
    else if (stringLength === 0){
        document.getElementById('min').innerText = "";
    }
    else {
        document.getElementById('max').innerText = "";
        document.getElementById('min').innerText = "";
    }
}
            </script> 
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="../../asset/bootstrap-5.0.1-dist/js/bootstrap.bundle.min.js"></script>
    <!--Sign in JS-->
    <script src="../js/register.js"></script>
</body>
</html>