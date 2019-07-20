<?php

class db
{
    function MakeConn()
    {
        $conn = new mysqli("localhost","root","","hotel_system");
        
        if ($conn->connect_error) 
        {
            die("Connection failed: " . $conn->connect_error);
        } 
        else
        {
            echo "Connected successfully";
        }
        return $conn;
    }      
}

?>