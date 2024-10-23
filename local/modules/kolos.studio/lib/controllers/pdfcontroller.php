<?php

namespace Kolos\Studio\Controllers;

use Bitrix\Main\Engine\ActionFilter;
use Kolos\Studio\File\FileService;

class PdfController extends \Bitrix\Main\Engine\Controller
{
    private string $pdfToJpegCacheDir = "/bitrix/cache/pdf_to_jpeg/";

    public function configureActions(): array
    {
        return [
            'pagesPDF' => [
                'prefilters' => [
                    new ActionFilter\HttpMethod(
                        [ActionFilter\HttpMethod::METHOD_POST]
                    ),
                    new ActionFilter\Csrf()
                ]
            ],
        ];
    }

    public function pagesPDFAction(int $id, int $pageNum = 1): array
    {
        $result = [
            'file' => '',
            'count' => 0,
        ];

        FileService::addDocumentRoot($this->pdfToJpegCacheDir);

        if ($filePath = \CFile::GetPath($id)) {

            FileService::addDocumentRoot($filePath);
            $pdfDocument = new Imagick($_SERVER["DOCUMENT_ROOT"] . $filePath);
            $result['count'] = $pdfDocument->getNumberImages();

            FileService::createPath($this->pdfToJpegCacheDir);
            
            $this->pdfToJpegCacheDir .= "/" . $id;
            FileService::createPath($this->pdfToJpegCacheDir);

            $saveFilePath = $this->pdfToJpegCacheDir . "/" . $pageNum . ".jpg";

            if(!FileService::existsFile($saveFilePath)){
                FileService::createPath($filePath, $saveFilePath, $pageNum);
            }

            if(!FileService::existsFile($saveFilePath)){
                $result['file'] = FileService::getPublicLink($saveFilePath);

            }
        }

        return $result;
    }
}
