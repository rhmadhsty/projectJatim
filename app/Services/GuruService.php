<?php

namespace App\Services;

use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;

/**
 * @author rahmafitriani
 */
class GuruService
{
    protected User $model;
    
    public function __construct(User $model)
    {
        $this->model = $model;
    }
    
    
    public function create(array $dataGuru = [])
    {
        dd($dataGuru);
        return $this->model->create($dataGuru);
    }
}

