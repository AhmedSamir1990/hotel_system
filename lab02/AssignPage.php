<?phpinclude_once"UserTypeClass.php";

if(isset($_POST['submit'])){//check if it was submitted

    $sql = "delete from usertype_pages where usertypeid=".$_POST{"UserType"}.";";
    $i=1;
    mysql_query($sql);
    foreach($_POST["choosen-pages"] as $page ){
        $sql ="insert into usertype_pages(usertypeid,pageid,ordervalue)
        values(".$_POST["UserType"].".".$page.",".$i++.");";
        mysql_query($sql);
}
}?>
<!DOCTYPE html>
<html>
<head>
        <title></title>
        <script src="https://code.jquery.com/jquery-1.9.1.js"></script>
        <script type = "text/javascript">
        $(document).ready(function(){
            $("#btnLeft").click(function(){
                var selectedItem = $("#rightValues option :selected");
                $("#leftValues").append(selectedItem);
            });
            $("#btnRight").click(function(){
                var selectedItem = $("#leftValues option :selected");
                $("#leftValues").append(selectedItem);
            });
        });
        </script>
 </head>
 <body>
<Form action="" method="post">
    <table>
<tr>
<td>allpages</td>
<td></td>
<td>choose pages</td>
</tr>
<tr>
<td>
<select id="leftValue" STYLE="width: 160px;box-sizing: border-box;" size="5" multiple>
<?php 
$obj=pages::SelectAllPagesInDB();
for($i=0;$i<count($obj);$i++)
{ echo"<option value'".$obj[$i]->ID."'>".$obj[$i]->FreindlyName."</option>";

}
?>
</select>
</td>
<td align="center">
<input type="button" id="btnLeft" value"<<" />
<input type="button" id="btnRight" value">>" />
</td>
<td>
<select id="rightValues" name="choosen-pages[]" TYLE="width: 160px;box-sizing: border-box;" size="5" multiple>
</select>
</td>
</tr>
<tr>
<td>
choose your user type :
</td>
<td>
<select name="UserType">
<?php
$obj=UserType::SelectAllUserTypesInDB();
for($i=0;$i<count($obj);$i++)
{ echo"<option value'".$obj[$i]->ID."'>".$obj[$i]->UsertypeName."</option>";
    

}?>
</select>
</td>
</tr>
<tr>
<td>
<input type="submit" name="submit">
</td>
</tr>
</table>
</form>
</body>
</html>       