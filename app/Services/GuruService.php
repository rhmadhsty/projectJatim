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
        return $this->model->create($dataGuru);
    }

    public function update(User $user, array $dataGuru = [])
    {
        // return $kelas->where('kelas_id', $data_kelas['kelas_id'])->update($data_kelas);
        // dd( $dataGuru);
        return $user->where('user_id', $dataGuru['user_id'])->update($dataGuru);
    }

    public function delete(User $user, $id)
    {
        // dd($user);
        return $user->where('user_id', $id)->delete($user);
    }
}
