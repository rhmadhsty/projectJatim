<?php

namespace App\Services;

use App\Models\Kelas;

/**
 * @author rahmafitriani
 */
class KelasService
{
    protected Kelas $model;

    public function __construct(Kelas $model)
    {
        $this->model = $model;
    }

    function create(array $data_kelas = [])
    {
        // dd($data_kelas);
        return $this->model->create($data_kelas);
    }

    public function getData($id)
    {
        return Kelas::where('kelas_id', $id)->get();
    }

    public function update(Kelas $kelas, array $data_kelas = [])
    {
        dd($kelas);
        return $kelas->update($data_kelas);
    }
}
