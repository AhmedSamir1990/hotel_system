<?php 
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'HotelSystem');

	
	$RoomNumber = "";
	$RoomType = "";


    if (isset($_POST['save']))
    {
		$RoomNumber = $_POST['RoomNumber'];
		$RoomType = $_POST['RoomType'];

		mysqli_query($db, "INSERT INTO Rooms (RoomNumber, RoomType) VALUES ('$RoomNumber', '$RoomType')"); 
		$_SESSION['message'] = "Room saved"; 
	
    }
    