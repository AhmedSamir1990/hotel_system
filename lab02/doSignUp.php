<?php

    include_once "UserClass.php";
    $FullName=$_REQUEST["FullName"];
    $SSN=$_REQUEST["SSN"];
    $Email=$_REQUEST["Email"];
    $DOB=$_REQUEST["DOB"];
    $Password=$_REQUEST["Password"];
    
    $UseObject=User::InsertInDB_static($FullName,$SSN,$Email,$DOB,$Password);

    if($UseObject!=NULL)
    {
        session_start();
        $_SESSION["UserID"]=$UseObject;
        echo "<br>sign up Success";
        
        
    }
    

?>