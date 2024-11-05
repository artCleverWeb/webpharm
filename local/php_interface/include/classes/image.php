<?
class Image
{
    public static function getWebp(string $src): string
    {
        if ($src && function_exists("imagewebp"))
        {
            $newImgPath = str_ireplace([".jpg", ".jpeg", ".gif", ".png"], ".webp", $src);
            if (!file_exists($_SERVER["DOCUMENT_ROOT"].$newImgPath))
            {
                $info = getimagesize($_SERVER["DOCUMENT_ROOT"].$src);
                if ($info !== false && ($type = $info[2]))
                {
                    switch ($type)
                    {
                        case IMAGETYPE_JPEG:
                            $newImg = imagecreatefromjpeg($_SERVER["DOCUMENT_ROOT"].$src);
                            break;
                        case IMAGETYPE_GIF:
                            $newImg = imagecreatefromgif($_SERVER["DOCUMENT_ROOT"].$src);
                            break;
                        case IMAGETYPE_PNG:
                            $newImg = imagecreatefrompng($_SERVER["DOCUMENT_ROOT"].$src);
                            imagepalettetotruecolor($newImg);
                            imagealphablending($newImg, true);
                            imagesavealpha($newImg, true);
                            break;
                    }
                    if ($newImg)
                    {
                        imagewebp($newImg, $_SERVER["DOCUMENT_ROOT"].$newImgPath, 90);
                        imagedestroy($newImg);
                    }
                }
            }
            if (file_exists($_SERVER["DOCUMENT_ROOT"].$newImgPath))
            {
                return $newImgPath;
            }
        }
        return $src;
    }

    public static function setWebp(array $image, array $size): array
    {
        $image["WEBP"] = $image["SRC"];
        $file = \CFile::ResizeImageGet(
            $image["ID"],
            array_merge(
                [
                    "width"  => 1000,
                    "height" => 1000,
                ],
                $size
            ),
            BX_RESIZE_IMAGE_PROPORTIONAL,
            true
        );
        if ($file)
        {
            $image["WEBP"] = self::getWebp($file["src"]);
        }
        return $image;
    }
}
?>