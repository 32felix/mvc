<?php

/**
 * Created by PhpStorm.
 * User: Івася
 * Date: 23.07.2017
 * Time: 18:32
 */
class Image
{
    public static function genImage($content, $imageName)
    {

        return file_put_contents(ROOT . '/res/' . $imageName, $content);
    }

    public static function getImage($files, $width=320, $height=240)
    {
        $path = ROOT . '/res/';

        if (!is_dir($path))
            mkdir($path, 0777, true);

        $db = Db::getConnection();

        $result = $db->query("SELECT * FROM Task WHERE imageName='".$files['image']['name']."'");

        while ($result->fetch_array(MYSQLI_ASSOC))
            $files['image']['name'] = 1 . $files['image']['name'];

        $path .= $files['image']['name'];

        move_uploaded_file($files['image']['tmp_name'],$path);

        $type = exif_imagetype($path);
        if ($type != IMAGETYPE_JPEG && $type != IMAGETYPE_GIF && $type != IMAGETYPE_PNG)
            return false;

        self::getSize($path, $type, $width, $height);

        return $files['image']['name'];
    }

    private static function getSize ($path, $type, $width, $height)
    {
        list($width_orig, $height_orig) = getimagesize($path);

        $ratio_orig = $width_orig/$height_orig;

        if ($width/$height > $ratio_orig) {
            $width = $height*$ratio_orig;
        } else {
            $height = $width/$ratio_orig;
        }

        $image_p = imagecreatetruecolor($width, $height);

        if ($type == IMAGETYPE_JPEG)
            $image = imagecreatefromjpeg($path);
        elseif ($type == IMAGETYPE_GIF)
            $image = imagecreatefromgif($path);
        elseif ($type == IMAGETYPE_PNG)
            $image = imagecreatefrompng($path);

        imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);

        if ($type == IMAGETYPE_JPEG)
            imagejpeg($image_p,$path, 100);
        elseif ($type == IMAGETYPE_GIF)
            imagegif($image_p,$path);
        elseif ($type == IMAGETYPE_PNG)
            imagepng($image_p,$path, 100);

        imagedestroy($image_p);
        return true;
    }
}