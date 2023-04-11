<?php
namespace App\Repositories\Post;

use App\Repositories\EloquentRepository;

class PostEloquentRepository extends EloquentRepository
{

    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return \App\Models\Task::class;
    }
}
