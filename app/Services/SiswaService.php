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

    public function create(array $data_siswa = [])
    {
        // dd($data_siswa);
        return $this->model->create($data_siswa);
    }

    public function update(Siswa $siswa, array $data_siswa = [])
    {
        return $siswa->where('siswa_id', $data_siswa['siswa_id'])->update($data_siswa);
    }

    public function delete(Siswa $siswa, $id)
    {
        return $siswa->where('siswa_id', $id)->delete($siswa);
    }
}
