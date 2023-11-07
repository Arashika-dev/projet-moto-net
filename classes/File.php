<?php
require_once __DIR__ ."/Exceptions/FailedUploadexception.php";
class File {
    private string $fileName;

    public function __construct(string $fileName){
        $this->fileName = $fileName;
    }

    public function uploadFile(string $filePath,string $filetype ) : string
    {
        $file = $_FILES[$filetype];
        //Generate random name
        $bytes = random_bytes(10);
        $fileName = bin2hex($bytes);
        //Extract extension file
        $fileExt = pathinfo($file["name"], PATHINFO_EXTENSION);
        $fileName .=".". $fileExt;
        //Construct full path file
        $destination = $filePath . $fileName;

        if (!is_uploaded_file($file['tmp_name']) || $file['error'] !== UPLOAD_ERR_OK) {
            throw new FailedUploadException;
        }
    
        if (!move_uploaded_file($file['tmp_name'], $destination)) {
            throw new FailedUploadException;
        }

        return $fileName;
    }
    public function getFileName(): string { return $this->fileName; }
}