<meta charset="utf-8">
<?php
if( $_FILES["profile-pic"]["type"] == "image/jpeg" or $_FILES["profile-pic"]["type"] == "image/png")
{
    move_uploaded_file($_FILES["profile-pic"]["tmp_name"] , "../Pictures/".$_FILES["profile-pic"]["name"]);
    echo "A képecske feltöltésre került!";
}
else{
    echo "A fájl feltöltés nem sikerült!";
}
?>
