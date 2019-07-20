<?php

include_once "UserClass.php";
$Email=$_REQUEST["Email"];
$Password=$_REQUEST["Password"];
$UseObject=User::login($Email,$Password);
if($UseObject!=NULL)
{
    session_start();
    $_SESSION["UserID"]=$UseObject;
    //print_r( $UseObject);
    //$conn= new mysqli("localhost","root","","student");
    $conn = db::MakeConn();

    echo "<br>Login Success";

    $x=(int)$UseObject;
   // $x=$UseObject->
    for($i=0;$i<3;$i++)
    {  $sql="SELECT pages.FreindlyName , pages.Linkaddress from pages 
    where pages.ID=(SELECT usertype_pages.PageID FROM `usertype_pages`
     where usertype_pages.UserTypeID = $x AND usertype_pages.ordervalue=$i)";
     $result = mysqli_query($conn,$sql);
     //$row=mysqli_fetch_array($result);
    // echo "<br><a href=".$UseObject->UserType_OBJ->ArrayOfPages[$i]->Linkaddress."<".$UseObject->UserType_OBJ->ArrayOfPages[$i]->FriendlyName."</a>";
    $row = $result->fetch_assoc();
    // {
        //echo $row['FreindlyName'];
       
        // echo $row['Linkaddress'] ;
        // echo '<a href="' . $row['Linkaddress'] . '">[a name here would be nice]</a>';
       // echo '<a href="' . $row['Linkaddress'] . '">"' .$row['FreindlyName'].</a>';
        echo '<br> <a href="../' . $row['Linkaddress'] . '"> '. $row['FreindlyName'] .'</a>';  
 
       
    // }
   
   }
   
}
 else
     {
         echo "<br> Login bad";
     }
?>