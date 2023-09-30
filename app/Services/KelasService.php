<?php

namespace App\Services;

use App\Models\Kelas;
use illuminate\Support\Facades\DB;
use Exception;

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
        return $this->model->create($data_kelas);
    }

    public function getData($id)
    {
        return Kelas::where('kelas_id', $id)->get();
    }

    public function update(Kelas $kelas, array $data_kelas = [])
    {
        // $data = $kelas->where('kelas_id', $data_kelas['kelas_id'])->update($data_kelas);
        // dd($data, $data_kelas);
        // return $user->where('user_id', $dataGuru['user_id'])->update($dataGuru);
        return $kelas->where('kelas_id', $data_kelas['kelas_id'])->update($data_kelas);
    }

    public function delete(Kelas $kelas, $id)
    {
        return $kelas->where('kelas_id', $id)->delete($kelas);
    }
}
