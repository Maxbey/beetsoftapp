<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = ['name', 'path', 'link', 'size', 'type', 'downloads_count'];

    /**
     * Each file belongs to User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
