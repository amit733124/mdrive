<form action="" method="post" enctype="multipart/form-data">
    Select a file: <input type="file" name="upload">
<input type="submit">
<?php
if(isset($_POST['upload']))
{
    session_start();
    $allowedExts = array("doc", "docx");
    $extension = end(explode(".", $_FILES["upload"]["name"]));

    if (($_FILES["upload"]["size"] < 200000)
    && in_array($extension, $allowedExts)) {
        if ($_FILES["upload"]["error"] > 0)
        {
            echo "Return Code: " . $_FILES["upload"]["error"] . "<br />";
        }
        else
        {
            echo "Upload: " . $_FILES["upload"]["name"] . "<br />";
            echo "Type: " . $_FILES["upload"]["type"] . "<br />";
            echo "Size: " . ($_FILES["upload"]["size"] / 1024) . " Kb<br />";
            echo "Temp file: " . $_FILES["upload"]["tmp_name"] . "<br />";

            if (file_exists("Proposals/".$_SESSION["FirstName"] ."/" . $_FILES["upload"]["name"]))
            {
                echo $_FILES["upload"]["name"] . " already exists. ";
            }
            else
            {
                move_uploaded_file($_FILES["upload"]["tmp_name"],
                "Proposals/". $_SESSION["FirstName"] ."/". $_FILES["upload"]["name"]);
                echo "Stored in: " . "Proposals/". $_SESSION["FirstName"] ."/". $_FILES["upload"]["name"];
            }
        }
    } else {
        echo "Invalid file";
    }
}
?>