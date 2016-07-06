<?php

namespace App\Services;


use App\Repositories\FileRepository;
use App\User;
use Illuminate\Http\UploadedFile;

class FileService
{
    /**
     * @var FileRepository
     */
    protected $fileRepository;

    /**
     * @var string
     */
    protected $baseDir = 'uploaded_files/';

    /**
     * FileService constructor.
     * @param FileRepository $repository
     */
    public function __construct(FileRepository $repository)
    {
        $this->fileRepository = $repository;
    }

    /**
     * @param UploadedFile $file
     * @param User $uploadedBy
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function create(UploadedFile $file, User $uploadedBy)
    {
        $uniqName = uniqid() . $file->getClientSize();

        $createdFile = $uploadedBy->files()->create([
            'name' => str_slug($file->getClientOriginalName()),
            'type' => $file->getClientMimeType(),
            'size' => $file->getClientSize(),
            'downloads_count' => 0,
            'path' => $this->baseDir . $uniqName,
            'link' => base64_encode(uniqid())
        ]);

        $file->move($this->baseDir, $uniqName);

        return $createdFile;
    }
}