<?php
require 'config/config.php';
require 'includes/form_handlers/login_handler.php';

?>

<?php
//decalring variables

$fname = "";
$lname = "";
$em = "";
$em2 = "";
$password = "";
$password2 = "";
$date = ""; //sign up date
$error_array = array();//holds error message

if(isset($_POST['register_button'])){

    $fname = strip_tags($_POST['reg_fname']);//remove html tags
    $fname = str_replace(' ','', $fname );//remove spaces
    $fname = ucfirst(strtolower($fname));//upper case first letter 
    $_SESSION['reg_fname']= $fname;

    $lname = strip_tags($_POST['reg_lname']);//remove html tags
    $lname = str_replace(' ','', $lname );//remove spaces
    $lname = ucfirst(strtolower($lname));//upper case first letter 
    $_SESSION['reg_lname']= $lname;


    $em = strip_tags($_POST['reg_email']);//remove html tags
    $em = str_replace(' ','', $em );//remove spaces
    $_SESSION['reg_email']= $em;

    

    $em2 = strip_tags($_POST['reg_email2']);//remove html tags
    $em2 = str_replace(' ','', $em2 );//remove spaces
    $_SESSION['reg_email2']= $em2;

 


    $password = strip_tags($_POST['reg_password']);//remove html tags
    $password2 = strip_tags($_POST['reg_password2']);//remove html tags

    $date = date("Y-m-d"); //current date



    if($em == $em2) {
        if(filter_var($em, FILTER_VALIDATE_EMAIL)){//check if email is valid format
            $em = filter_var($em, FILTER_VALIDATE_EMAIL);

            //check if email already exist
            $e_check= mysqli_query($con, "SELECT email FROM users WHERE email= '$em' ");

            $num_rows = mysqli_num_rows($e_check);
            if($num_rows>0){
                array_push($error_array, "Email already exist<br>") ;
            }
        }

        else {
            array_push($error_array, "INVALID FORMAT OF EMAIL<br>");
        }

    }

    else {
        array_push($error_array, "Emails don't match<br>") ;
    }
    
    if(strlen($fname)>25 || strlen($fname)<2){
        array_push($error_array, "Your first name must be between 2 to 25 characters <br>");
    }

    if(strlen($lname)>25 || strlen($lname)<2){
        array_push($error_array, "Your last name must be between 2 to 25 characters<br>");
    }
    
    if($password != $password2){
        array_push($error_array, "Password don't match<br>");
    }

    else{

        if(preg_match('/[^A-Za-z0-9]/', $password))
            {
            array_push($error_array, "Password can only contain alphabets and numbers<br>");
        }
    }

    if(strlen($password)>30||strlen($password)<5){
        array_push($error_array, "Your password must be of length between 5 to 30<br>");
    }

    if(empty($error_array)){
        $password = md5($password); //Encrypt password

        //Generating username
        $username= strtolower($fname . "_" . $lname);
        $check_username_query= mysqli_query($con, "SELECT username FROM users WHERE username= '$username'");


        $i=0;
        while(mysqli_num_rows($check_username_query) != 0){
            $username= $username . "_" . $i;
            $check_username_query= mysqli_query($con, "SELECT username FROM users WHERE username= '$username'");
        }
    }



 
}

?>

<html>
<head>
    <title>Welcome to social website</title>
    <link rel="stylesheet" type="text/css" href="assets/css/register_style.css">
</head>
<body>

    <form action="register.php" method="POST"> 
        <input type="email" name="log_email" placeholder="Email Address">
        <br>
        <input type="password" name="log_password" placeholder="Password">
        <br>
        <input type="submit" name="login_button" value="login">
    </form>

  
    <div class="wrapper">
       <div class="login_box">
            <div class="login_header">
                <h1>Website Name</h1>
                Login or sign up
                
            
            </div>
            <form action = "register.php" method= "POST">
        
                <input type="text" name="reg_fname" placeholder="First name" value="<?php
                    if(isset($_SESSION['reg_fname']))
                        echo $_SESSION['reg_fname'];?>" required>
                <br>

                <?php if(in_array("Your first name must be between 2 to 25 characters <br>", $error_array)) 
                echo "Your first name must be between 2 to 25 characters <br>" ?>

                <input type="text" name="reg_lname" placeholder="Last Name" value="<?php
                    if(isset($_SESSION['reg_lname']))
                        echo $_SESSION['reg_lname']; ?>" >
                <br>
                <?php if(in_array("Your last name must be between 2 to 25 characters<br>", $error_array)) 
                echo "Your last name must be between 2 to 25 characters<br>" ?>

                <input type="email" name="reg_email" placeholder="Email" value="<?php
                    if(isset($_SESSION['reg_email']))
                        echo $_SESSION['reg_email'];?>" required>
                <br>

                <input type="email" name="reg_email2" placeholder="Confirm Email" value="<?php
                    if(isset($_SESSION['reg_email2']))
                        echo $_SESSION['reg_email2'];?>"  required>
                <br>
                <?php if(in_array( "Emails don't match<br>", $error_array)) echo  "Emails don't match<br>" ;
                 else if(in_array(  "INVALID FORMAT OF EMAIL<br>", $error_array)) echo   "INVALID FORMAT OF EMAIL<br>" ;
                 else if(in_array( "Email already exist<br>", $error_array)) echo  "Email already exist<br>" ?>   

                <input type="password" name="reg_password" placeholder="Password" required>
                <br>
                <input type="password" name="reg_password2" placeholder="Confirm Password" required>
                <br>
                <?php if(in_array( "Password don't match<br>", $error_array)) echo  "Password don't match<br>" ;
                 else if(in_array(  "Password can only contain alphabets and numbers<br>", $error_array)) echo  "Password can only contain alphabets and numbers<br>" ;
                 else if(in_array("Your password must be of length between 5 to 30<br>", $error_array)) echo  "Your password must be of length between 5 to 30<br>" ?> 

                <input type="submit" name="register_button" value="Register">
        
            </form>
        </div>
     </div>
</body>




</html>