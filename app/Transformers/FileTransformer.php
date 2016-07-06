<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\File;

/**
 * Class FileTransformer
 * @package namespace App\Transformers;
 */
class FileTransformer extends TransformerAbstract
{

    /**
     * Transform the \File entity
     * @param File $model
     *
     * @return array
     */
    public function transform(File $model)
    {
        return [
            'id' => (int)$model->id,
            'user' => (int)$model->user->id,
            'name' => $model->name,
            'type' => $model->type,
            'size' => $model->size,
            'link' => $model->link,
            'downloads_count' => $model->downloads_count
        ];
    }
}
