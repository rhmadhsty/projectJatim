<?php

namespace App\Services;

use App\Models\Siswa;

/**
 * @author rahmafitriani
 */
class SiswaService
{
    protected Siswa $model;

    public function __construct(Siswa $model)
    {
        $this->model = $model;
    }

    public function create(array $data_siswa)
    {
        // dd($data_siswa);
        return $this->model->create($data_siswa);
    }
}