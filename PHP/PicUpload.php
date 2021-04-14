<meta charset="utf-8">
<?php
//fájl típusú paraméter fogadása
// $_FILES ["paraméter neve"]["tulajdonságok"]
// $_FILES ["kep"]["name"] , $_FILES["kep"]["type"]
//print( $_FILES["kep"]["name"]." , ".$_FILES["kep"]["type"] );

if( $_FILES["profile-pic"]["type"] == "image/jpeg" or $_FILES["profile-pic"]["type"] == "image/png")
{
    move_uploaded_file($_FILES["profile-pic"]["tmp_name"] , "../Pictures/".$_POST["gallery"]."/".$_FILES["profile-pic"]["name"]);
    header("Location:index.php?pics=".$_POST["gallery"]);
}
else header("Location:index.php?err=1&err=1&pics=".$_POST["gallery"]);
?>
