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