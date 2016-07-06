<?php

namespace App\Http\Controllers;

use App\Presenters\FilePresenter;
use App\Repositories\FileRepository;
use App\Services\FileService;
use Exception;
use Illuminate\Http\Request;

use App\Http\Requests;

class FilesController extends Controller
{
    /**
     * @var FileService
     */
    protected $fileService;

    protected $fileRepository;

    /**
     * FilesController constructor.
     * @param FileService $fileService
     */
    public function __construct(FileService $fileService, FileRepository $fileRepository)
    {
        $this->fileService = $fileService;

        $this->fileRepository = $fileRepository;
    }

    /**
     * Show information about the file
     *
     * @param $link
     * @return mixed
     */
    public function show($link)
    {
        $this->fileRepository->setPresenter(FilePresenter::class);

        return $this->fileRepository->findByLink($link);
    }

    /**
     * Store the new instance of File
     *
     * @param Requests\FileRequest $request
     * @return string
     * @throws Exception
     */
    public function store(Requests\FileRequest $request)
    {
        
       $user = \JWTAuth::parseToken()->authenticate();

        $file = $request->file('file');

        if($file->getClientMimeType() == 'application/x-ms-dos-executable')
            throw new Exception('the download of the executable file is invalid');

        $this->fileService->create($file, $user);

        return response('File successfully uploaded', 201);
    }

    /**
     * Download the file
     *
     * @param $link
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function download($link)
    {
        $file = $this->fileRepository->findByLink($link)->first();

        $file->downloads_count++;
        $file->save();

        return response()->download(public_path() . '/' . $file->path, $file->name);
    }

    /**
     * Endpoint for deleting
     *
     * @param $id
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function destroy($id)
    {
        $user = \JWTAuth::parseToken()->authenticate();

        $file = $this->fileRepository->find($id);

        if(!$user->id === $file->user->id)
            throwException('Delete a file can only author');

        $this->fileRepository->delete($id);

        \File::delete(public_path() . '/' . $file->path);

        return response('File successfully deleted', 202);
    }
}
