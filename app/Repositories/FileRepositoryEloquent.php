<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\FileRepository;
use App\File;

/**
 * Class FileRepositoryEloquent
 * @package namespace App\Repositories;
 */
class FileRepositoryEloquent extends BaseRepository implements FileRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return File::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    /**
     * Find the file by open link
     *
     * @param $link
     * @return mixed
     */
    public function findByLink($link)
    {
        return $this->findByField('link', $link);
    }
}
