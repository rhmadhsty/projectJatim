@extends('admin.dataKelas')

@section('get')
<<<<<<< HEAD
    <div class="col-lg-8">
        <div class="tab-content no-padding" id="myTab2Content">
            <div class="card">
                <div class="card-header">
                    <h4>Data Kelas </h4>
                    <div class="card-header-form">
                        <form>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search">
                                <div class="input-group-btn">
                                    <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                    <button type="button" class="btn btn-primary" id="tambah-siswa"><i
                                            class="bi bi-plus-lg"> Tambah
                                            data</i></button>
                                </div>
                            </div>
                        </form>
=======
    <div class="col-lg-7">
        <div class="tab-content no-padding" id="myTab2Content">
            <div class="card">
                <div class="card-header">
                    <h4>Data Siswa </h4>
                    <div class="card-header-form">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahSiswa">
                            <i class="bi bi-plus-lg">Tambah Siswa</i>
                        </button>
>>>>>>> dev-rhma
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tr>
                                <th class="text-center">Nama Siswa</th>
                                <th class="text-center">NIS</th>
<<<<<<< HEAD
=======
                                <th class="text-center"><i class="bi bi-gear"></i></th>
>>>>>>> dev-rhma
                            </tr>
                            {{-- Perulangan Data Siswa --}}
                            @if ($siswa->count())
                                @foreach ($siswa as $item)
                                    <tr>
                                        <td class="text-center">{{ $item->nama }}</td>
<<<<<<< HEAD
                                        <td class="text-center">{{ $item->nis }}</td>
                                        {{-- <td class="text-center">{{ $item->NIS }}</td> --}}
=======
                                        <td class="text-center">{{ $item->NIS }}</td>
<<<<<<< HEAD
                                    </tr>
                                @endforeach
                                {{-- @endif --}}
                                {{-- Form Tambah Data Siswa --}}
                                <form class="modal-part" id="modal-siswa" method="POST"
                                    action="{{ route('data_kelas.getData.store', $item->kelas_id ? $item->kelas_id : 1) }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="kelas_id" value="{{ $item->kelas_id }}">
                                    <div class="form-group">
                                        <label>Nama Siswa</label>
                                        <input type="text" class="form-control" required name="nama">
                                    </div>
                                    <div class="form-group">
                                        <label>NIS</label>
                                        <input type="text" class="form-control" required name="NIS">
                                    </div>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button class="btn btn-primary" type="submit">Tambah Data</button>
                                </form>
                                {{-- /End Form Tambah Data Siswa --}}
=======
>>>>>>> 9b64a56c6e68bd83319d935a2ab64b45b930dea3
                                        <td class="text-center">
                                            <div class="input-group text-center ">
                                                <button class="btn btn-success" data-toggle="modal"
                                                    data-target="#editSiswa-{{ $item->siswa_id }}">Edit</button>
                                                <form action="{{ route('data_siswa.destroy', $item->siswa_id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-danger " type="submit"
                                                        onclick="return confirm('Yakin Mau Dihapus?')"><i
                                                            class="fa fa-trash"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                {{-- @endif --}}
<<<<<<< HEAD

                                </tr>
=======
>>>>>>> dev-rhma
>>>>>>> 9b64a56c6e68bd83319d935a2ab64b45b930dea3
                            @else
                                <tr>
                                    <td colspan="2" class="text-center">Tidak Ada Data Siswa.</td>
                                </tr>
                            @endif
                            {{-- /Perulangan Data Siswa --}}
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<<<<<<< HEAD



@endsection
=======
@endsection
{{-- @dd($kelas) --}}


@foreach ($kelas as $item)
    <div class="modal fade" tabindex="-1" role="dialog" id="tambahSiswa">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Siswa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ route('data_kelas.getData.store', $item->kelas_id) }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="kelas_id" value="{{ $item->kelas_id }}">
                        <input type="hidden" name="is_active" value="1">
                        <div class="form-group">
                            <div class="section-title">Foto Siswa</div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image-siswa" name="image-siswa">
                                <label class="custom-file-label" for="image-siswa">Choose file</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Nama Siswa</label>
                            <input type="text" class="form-control" required name="nama">
                        </div>
                        <div class="form-group">
                            <label>NIS</label>
                            <input type="text" class="form-control" required name="nis">
                        </div>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" required name="username">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" required name="email">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="showHide"><i class="bi bi-eye"></i></span>
                                </div>
                                <input type="password" class="form-control pwstrength" data-indicator="pwindicator"
                                    name="password" id="password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Telepon</label>
                            <input type="text" class="form-control" required name="telepon">
                        </div>
                        <div class="form-group">
                            <label>Tanggal Lahir</label>
                            <input type="date" class="form-control pwstrength" data-indicator="pwindicator"
                                name="tanggal_lahir" id="tanggal_lahir">
                        </div>
                    </div>
                    <div class="modal-footer bg-whitesmoke br">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Tambah data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach

@foreach ($siswa as $item)
    {{-- edit siswa --}}
    <div class="modal fade" tabindex="1" role="dialog" id="editSiswa-{{ $item->siswa_id }}">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="POST" action="{{ route('data_siswa.update', $item->siswa_id) }}"
                    enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Siswa</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="siswa_id" id="siswa_id" value="{{ $item->siswa_id }}">
                        <input type="hidden" name="kelas_id" id="kelas_id" value="{{ $item->kelas_id }}">
                        <div class="form-group">
                            <div class="section-title">Foto Siswa</div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image_siswa" name="image_siswa" value="{{ $item->image_siswa }}">
                                <label class="custom-file-label" for="image_siswa">Choose file</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Nama Siswa</label>
                            <input type="text" class="form-control" required name="nama"
                                value="{{ $item->nama }}">
                        </div>
                        <div class="form-group">
                            <label>NIS</label>
                            <input type="text" class="form-control" required name="nis"
                                value="{{ $item->nis }}">
                        </div>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" required name="username"
                                value="{{ $item->nama }}">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" required name="email"
                                value="{{ $item->email }}">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="showHide"><i class="bi bi-eye"></i></span>
                                </div>
                                <input type="password" class="form-control pwstrength" data-indicator="pwindicator"
                                    name="password" id="password" value="{{ $item->password }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Telepon</label>
                            <input type="text" class="form-control" required name="telepon"
                                value="{{ $item->telepon }}">
                        </div>
                        <div class="form-group">
                            <label>Tanggal Lahir</label>
                            <input type="date" class="form-control pwstrength" data-indicator="pwindicator"
                                name="tanggal_lahir" id="tanggal_lahir" value="{{ $item->tanggal_lahir }}">
                        </div>
                    </div>
                    <div class="modal-footer bg-whitesmoke br">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Edit data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach
>>>>>>> dev-rhma
