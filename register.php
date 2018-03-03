<?php 
$con = mysqli_connect("localhost", "root", "", "social");//connection variable

if(mysqli_connect_errno())
 {
     echo "Failed to connect" . mysqli_connect_errno();
 }
//decalring variables

$fname = "";
$lname = "";
$em = "";
$em2 = "";
$password = "";
$password2 = "";
$date = ""; //sign up date
$error_array = "";//holds error message

if(isset($_POST['register_button'])){

    $fname = strip_tags($_POST['reg_fname']);//remove html tags
    $fname = str_replace(' ','', $fname );//remove spaces
    $fname = ucfirst(strtolower($fname));//upper case first letter 

    $lname = strip_tags($_POST['reg_lname']);//remove html tags
    $lname = str_replace(' ','', $lname );//remove spaces
    $lname = ucfirst(strtolower($lname));//upper case first letter 

    $em = strip_tags($_POST['reg_email']);//remove html tags
    $em = str_replace(' ','', $em );//remove spaces
    $em = ucfirst(strtolower($em));//upper case first letter

    $em2 = strip_tags($_POST['reg_email2']);//remove html tags
    $em2 = str_replace(' ','', $em2 );//remove spaces
    $em2 = ucfirst(strtolower($em2));//upper case first letter


    $password = strip_tags($_POST['reg_password']);//remove html tags
    $password2 = strip_tags($_POST['reg_password2']);//remove html tags

    $date = date("Y-m-d"); //current date



    if($em == $em2) {
        if(filter_var($em, FILTER_VALIDATE_EMAIL)){
            $em = filter_var($em, FILTER_VALIDTE_EMAIL);
        }

        else {
            echo "INVALID FORMAT OF EMAIL";
        }

    }

    else {
        echo "Emails don't match" ;
    }     
    


 
}

?>

<html>
<head>
    <title>Welcome to social website</title>
    <link rel="stylesheet" type="text/css" href="assets/css/register_style.css">
</head>
<body>
    <div class="wrapper">
       <div class="login_box">
            <div class="login_header">
                <h1>Website Name</h1>
                Login or sign up below!
                
            
            </div>
            <form action = "register.php" method= "POST">
        
                <input type="text" name="reg_fName" placeholder="First name" required>
                <br>
                <input type="text" name="reg_lName" placeholder="Last Name" >
                <br>
                <input type="email" name="reg_Email" placeholder="Email" required>
                <br>
                <input type="email2" name="reg_Email2" placeholder="Confirm Email" required>
                <br>
                <input type="password" name="reg_Password" placeholder="Password" required>
                <br>
                <input type="password2" name="reg_Password2" placeholder="Confirm Password" required>
                <br>
                <input type="submit" name="reg_Button" value="Register">
        
            </form>
        </div>
     </div>
</body>




</html>