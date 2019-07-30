<?php 
	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM Rooms WHERE id=$id");

        if (count($record) == 1 ) 
        {
			$n = mysqli_fetch_array($record);
			$RoomNumber = $n['RoomNumber'];
			$RoomType = $n['RoomType'];
		}
	}
?>
/////////////////////


function UpdateRooms()
    {
        $sql="update tb_Rooms set RoomNumber='".$this->RoomNumber."', RoomType='".$this->RoomType."' where ID = ".$this->ID="";
        mysql_query($sql);
    }