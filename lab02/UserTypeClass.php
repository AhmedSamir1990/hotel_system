<?php
    include_once "My_DBDirect.php";
    class UserType
    {
        public $id;
        public $UserTypeName;
        public $ArrayOfPages;

        function __construct($id)
        {
            if ($id!="")
            {
                $conn = db::MakeConn();
                $sql ="select * from usertypes where ID=$id";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result))
                {
                    echo "yenf3";
                }
                
                
            }
        }
        static function SelectAllUserTypesInDB()
        {
            $sql="select * from usertypes";
            $TypeDataSet = mysql_query($sql) or die(mysql_error());

            $i=0;
            $Result;
            while ($row = mysql_fetch_array($TypeDataSet))
            {
                $MyObj= new UserType($row["ID"]);
                $Result[$i]=$MyObj;
                $i++;
            }
            return $Result;
        }
    }
    
    class pages
    {
        public $id;
        public $friendlyname;
        public $Linkaddress;
        public $HTML;

        function __construct($id)
        {
            if ($id!="")
            {

            
                $sql ="select * from pages where ID=$id";

                $result2 = mysql_query($sql);
                if ($row2 = mysql_fetch_array($result2))
                {
                    $this->friendlyname=$row2["FriendlyName"];
                    $this->Linkaddress=$row2["Linkaddress"];
                    $this->HTML=$row2["HTML"];
                    $this->id=$row2["ID"];
                }
            }
        }
        static function SelectAllPagesInDB()
        {
            $sql="select * from pages";
            $PageDataSet = mysql_query($sql) or die(mysql_error());

            $i=0;
            $Result;
            while ($row = mysql_fetch_array($PageDataSet))
            {
                $MyObj= new pages($row["ID"]);
                $Result[$i]=$MyObj;
                $i++;
            }
            return $Result;
        }

    }
?>