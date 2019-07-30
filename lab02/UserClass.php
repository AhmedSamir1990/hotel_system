<?php
include_once "My_DBDirect.php";
include_once "UserTypeClass.php";
class User
{
    public $FullName;
    public $Email;
    public $Dob;
    public $Password;
    public $UserType_Obj;
    public $ID;
    public $Mobile;
    public $SSN;
    private $GPA;

    function __construct($id)
    {
        if ($id !="")
        { 
            $conn = db::MakeConn();

            $sql="select * from tb_users where ID=$id";
            //echo $sql;
            $studentDataSet = mysqli_query($conn,$sql) or die(mysql_error());
            if ($row = mysqli_fetch_array($studentDataSet))
            {
                $this->FullNmae=$row["FullName"];
                $this->Email=$row["Email"];
                $this->Password=$row["Password"];
                $this->DOB=$row["DOB"];
                $this->DOB=$row["SSN"];
                $this->ID=$row["ID"];
                $this->ID=$row["Mobile"];
                $this->UserType_OBJ=new UserType ($row["UserType_id"]);
                
            }
        }

    }

    static function login($Username,$Password)
    {  
        //$conn= new mysqli("localhost","root","","student");
        $conn = db::MakeConn();

        $sql="select * from person where Email = '$Username' and Password = '$Password'";
        $result = mysqli_query($conn,$sql);
        if ($row=mysqli_fetch_array($result))
        {  
               return new User($row[0]->UserType_id);
               
        }
        return NULL;
    }

    static function deleteUser($ObjUser)
    {
        // $conn= new mysqli("localhost","root","","lab02");
        $conn = db::MakeConn();

        $sql="delete from tb_users where ID=".$ObjUser->ID;
        mysqli_query($conn,$sql);

    }

    static function InsertInDB_static($FullName,$SSN,$Email,$DOB,$Password,$Mobile)
    {
        // $conn= new mysqli("localhost","root","","student");
        $conn = db::MakeConn();

        $sql="insert into person(FullName,SSN,Email,DOB,Password,UserType_id,Mobile) values
        ('$FullName','$SSN','$Email','$DOB','$Password',1,'$Mobile')";
        //echo $sql;
        mysqli_query($conn,$sql);
    }

    function UpdateMyDB()
    {        $conn = db::MakeConn();

        $sql="update tb_user set FullName='".$this->FullName."', Email='".$this->Email."', 
        Password='".$this->Password."', DOB= '".$this->DOB."' where ID = ".$this->ID="";
        mysqli_query($conn,$sql);
    }

    static function SelectAllUsersInDB()
    {        $conn = db::MakeConn();

        $sql="select * from tb_users order by FullName";
        $StudentDataSet = mysqli_query($conn,$sql) or die(mysql_error());
        $i=0;
        $Result;
        while ($row = mysql_fetch_array($StudentDataSet))
        {
            $MyObj= new pages($row["ID"]);
            $Result[$i]=$MyObj;
            $i++;
        }
        return $Result;
    }




}