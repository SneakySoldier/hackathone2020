<?php

require_once 'Database.php';

class File
{
    private static function create($title, $uuidCode)
    {
        $sql = "INSERT INTO files (title, uuidCode) VALUES (\"".$title."\", \"".$uuidCode."\")";
        Database::exec($sql);
    }

    private static function getLatestId()
    {
        $sql = "SELECT id FROM files ORDER BY id DESC LIMIT 1";
        $rows = Database::query($sql);
        return $rows[0]['id'];
    }

    public static function upload($file)
    {
        // <form action="upload.php" method="post" enctype="multipart/form-data">
        // Select image to upload:
        // <input type="file" name="fileToUpload" id="fileToUpload">
        // <input type="submit" value="Upload Image" name="submit">
        // </form>

        $uuidCode = uniqid();

        $target_dir = __DIR__."/../uploads/";
        $target_file = $target_dir . $uuidCode . '_' . $file["name"];
        // $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        // if(isset($_POST["submit"])) {
        //     $check = getimagesize($file["tmp_name"]);
        //     if($check !== false) {
        //         // echo "File is an image - " . $check["mime"] . ".";
        //     } else {
        //         throw new Exception("File is not an image.");
        //     }
        // }

        // Check if file already exists
        // if (file_exists($target_file)) {
        //     throw new Exception("Sorry, file already exists.");
        // }

        // Check file size
        // if ($file["size"] > 500000) {
        //     throw new Exception("Sorry, your file is too large.");
        // }

        // Allow certain file formats
        // if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
        //     throw new Exception("Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
        // }

        if (move_uploaded_file($file["tmp_name"], $target_file)) {
            $title = basename($file["name"]);
            self::create($title, $uuidCode);
            return File::getLatestId();
            // return $uuidCode . '_' . $file["name"];
            // return "The file ". htmlspecialchars( basename($file["name"])). " has been uploaded.";
        }
        throw new Exception("Sorry, there was an error uploading your file.");
    }
}
