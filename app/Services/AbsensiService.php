<?php

namespace App\Services;

use App\Models\Absensi;
use Exception;
use Illuminate\Support\Facades\DB;

/**
 * @author rahmafitriani
 */
class AbsensiService
{
    protected Absensi $model;

    public function __construct(Absensi $model)
    {
        $this->model = $model;
    }

    public function create(array $dataAbsen = [])
    {
        // dd($dataAbsen);
        return $this->model->create($dataAbsen);
    }
}
