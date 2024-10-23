<?php

namespace Kolos\Studio\File;

class FileService
{
    public static function createPath(string $path): void
    {
        if (!is_dir($path)) {
            mkdir($path, 0777, true);
        }
    }

    public static function addDocumentRoot(string &$path): string
    {
        return $_SERVER['DOCUMENT_ROOT'] . "/" . $path;
    }

    public static function getPublicLink(string $file): string
    {
        return str_replace($_SERVER['DOCUMENT_ROOT'], '', $file);
    }

    public static function existsFile(string $file): bool
    {
        return file_exists($file);
    }

    public static function createPagePdf(string $file, string $saveTo, int $pageNum): void
    {
        $page = new Imagick();
        $page->setResolution(150, 150);
        $page->readimage($_SERVER["DOCUMENT_ROOT"] . $file . "[" . $pageNum . "]");
        $page->setImageBackgroundColor("#ffffff");
        $page = $page->flattenImages();
        $page->setCompressionQuality(100);
        $page->setImageFormat("jpg");
        $page->writeImage($saveTo);
    }
}
