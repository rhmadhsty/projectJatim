<?php

namespace App\Services;

use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;

/**
 * @author rahmafitriani
 */
class GuruService
{
    // protected atau mengganti nama model agar mudah diingat/ mudah di pakai
    protected User $model;

    // penyambungan guru servuce dengan guru controller
    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function create(array $dataGuru = [], $image)
    {
        // dd($image);
        // langsung validasi untuk menambahkan ke database
        return $this->model->create([
            'name'=>$dataGuru['name'],
            'role'=>$dataGuru['role'],
            'email'=>$dataGuru['email'],
            'password'=>$dataGuru['password'],
            'divisi'=>$dataGuru['divisi'],
            'nik'=>$dataGuru['nik'],
            'tanggal_lahir'=>$dataGuru['tanggal_lahir'],
            'no_telp'=>$dataGuru['no_telp'],
            'image_user'=>$image,
        ]);
    }

    public function update($dataImage ,User $user, array $dataGuru = [])
    {
        // dd($dataGuru);   
        // langsung validasi untuk update
        return $user->where('user_id', $dataGuru['user_id'])->update([
            'name'=>$dataGuru['name'],
            'role'=>$dataGuru['role'],
            'email'=>$dataGuru['email'],
            'password'=>$dataGuru['password'],
            'divisi'=>$dataGuru['divisi'],
            'nik'=>$dataGuru['nik'],
            'tanggal_lahir'=>$dataGuru['tanggal_lahir'],
            'no_telp'=>$dataGuru['no_telp'],
            'image_user'=>$dataImage,
        ]);
    }

    public function delete(User $user, $id)
    {
        // dd($user);
        // menghapus data guru
        return $user->where('user_id', $id)->delete($user);
    }
}
