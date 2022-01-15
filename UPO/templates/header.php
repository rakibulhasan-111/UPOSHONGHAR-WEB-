<?php 
    session_start();
 
    // Check if the user is already logged in, if yes then redirect him to welcome page
    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
        
    } else{
        header("location: signin.php");
        exit;
    }
?>

<head>
    <title>UPOSHONGHAR</title>

    <link rel="stylesheet" href="css/style.css">

</head>

<body>
    
    <div class="header">
        <a href="index.php" class="logo"> <img src="pic/logo.png" alt="উ প সং হা র" width="100"> </a>
        <div class="header-right">
            <a href="add.php">A D D</a>
            <a href="profile.php">P R O F I L E</a>
            <a href="signout.php">S I G N O U T</a>
        </div>
    </div>