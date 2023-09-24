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

    public function create(array $data_siswa = [], $dataImage)
    {
        // dd($dataImage);
        return $this->model->create([
                'kelas_id' => $data_siswa['kelas_id'],
                'nis' => $data_siswa['nis'],
                'username' => $data_siswa['username'],
                'nama' => $data_siswa['nama'],
                'tanggal_lahir' => $data_siswa['tanggal_lahir'],
                'email' => $data_siswa['email'],
                'password' => $data_siswa['password'],
                'telepon' => $data_siswa['telepon'],
                'image-siswa' => $dataImage,
        ]);
    }

    public function update(Siswa $siswa, array $data_siswa = [])
    {
        // dd($data_siswa);
        return $siswa->where('siswa_id', $data_siswa['siswa_id'])->update($data_siswa);
    }

    public function delete(Siswa $siswa, $id)
    {
        return $siswa->where('siswa_id', $id)->delete($siswa);
    }
}
