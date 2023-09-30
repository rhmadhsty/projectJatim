<?php

namespace App\Services;

use App\Models\Blog;

/**
 * @author rahmafitriani
 */
class BlogService
{
    protected Blog $model;


    public function __construct(Blog $model)
    {
        $this->model = $model;
    }

    function create(array $dataBlog = [])
    {   
        dd($dataBlog);
        return $this->model->create([
            'judul' => $dataBlog['judul'],
            'subjudul' => $dataBlog['subjudul'],
            'content' => $dataBlog['content'],
        ]);
    }

}