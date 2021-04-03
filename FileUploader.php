<?php

use \Exception;

/**
 * TODO:
 *  - Check filetypes
 *  - Create functons for isImage, isDocument
 *      - after check wrap in general check. (checkFilyType)
 *  - Finish the upload file function
 */

class FileUploader
{
    private array $mimeTypes = [
        'image' => ['image/jpeg', 'image/gif', 'image/png', 'image/svg+xml'],
        'audio' => ['audio/mpeg', 'audio/mp4', 'audio/ogg', 'audio/mid', 'audio/x-aiff', 'audio/wav'],
        'video' => ['videp/mp4', 'video/webm', 'video/quicktime'],
        'webcontent' => ['text/css', 'text/javascript', 'text/html'],
        'document' => ['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingm'],
        'other' => ['application/json', 'application/xml', 'text/xml'],
        'archive' => ['application/x-7z-compressed', 'application/zip', 'application/gzip', 'application/x-bzip', 'application/x-bzip2']
    ];

    private string $uploadFolder = 'upload/';

    /** 
     * Check if the file is not larger then 40M
     * @param int $filesize
     * @return bool
     */
    public function checkFilesize(int $filesize): bool
    {
        if ($filesize > 40000000) {
            throw new Exception('The file size is too large (max: 40MB)');
        }

        return true;
    }

    /**
     * Check filetype
     * @param string $type
     * @param string $filetype
     * @return bool
     */
    public function checkFileType(string $type, string $filetype): bool
    {
        if (!in_array($filetype, $this->mimeTypes[$type])) {
            throw new Exception("This file is not suported! (filetype: ${$filetype})");
        }

        return true;
    }

    /** 
     * Generate random string
     * @param int $length
     * @return $randomString
     */
    private function generateRandomString($length)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    /** 
     * Check if the filename already exists
     * @param string $filename
     * @return bool
     */
    public function checkFileExists(string $filename): bool
    {
        if (file_exists($this->uploadFolder . $filename)) {
            $filename = $filename . '_' . $this->generateRandomString(5);
        }

        return true;
    }

    /**
     * Move the uploaded file to the destination folder
     * @param string $filename
     * @param string $destination
     * @return bool
     */
    function moveUploadedFile(string $filename, string $destination): bool
    {
        if (!move_uploaded_file($filename, $destination)) {
            throw new Exception('Cannot move file');
        }

        return true;
    }

    public function upload(string $file)
    {
        $filename = $_FILES['file']['name'];
        $filesize = $_FILES['file']['size'];
        $filetype = $_FILES['file']['type'];
        $filetemp = $_FILES['file']['tmp_name'];

        $this->checkFilesize($filesize);
        // $this->checkFileType($filetype);
    }
}
