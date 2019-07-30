<?php 
static function deleteRoom()
    {
        $conn= new mysqli("localhost","root","","HotelSystem");
        $sql="delete from tb_Room where ID=".->ID;
        mysqli_query($conn,$sql);

    }

    ///////////////

    if (isset($_GET['delete'])) {
        $id = $_GET['delete'];
        mysqli_query($db, "DELETE FROM Rooms WHERE id=$id");
        $_SESSION['message'] = "Room deleted!"; 
        
    }