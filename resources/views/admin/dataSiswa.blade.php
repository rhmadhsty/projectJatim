@extends('template.app')

<<<<<<< HEAD
=======

@section('search')
    <div class="search-element">
        <form action="{{ route('data_siswa.index') }}">
            <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="250" name="search"
                value="{{ request('search') }}">
            <button class="btn" type="submit"><i class="fas fa-search"></i></button>
            <div class="search-backdrop"></div>
        </form>
    </div>
@endsection

>>>>>>> dev-rhma
@section('content')

    <div class="main-content">
        <section class="section">
            <div class="row">
<<<<<<< HEAD
                <div class="col-lg-4">
                    <div class="card gradient-bottom">
                        <div class="card-header">
                            <h4>DATA SISWA</h4>
                        </div>
                        <div class="card-body">
                            <ul class="nav nav-pills flex-column" id="myTab4" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link" id="home-tab4" data-toggle="tab" href="#kelas" role="tab"
                                        aria-controls="home" aria-selected="true">Kelas</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="contact-tab4" data-toggle="tab" href="#data_siswa"
                                        role="tab" aria-controls="contact" aria-selected="false">Data Siswa</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-footer pt-3 d-flex justify-content-center">
                            <div class="budget-price justify-content-center">
                                <div class="budget-price-square bg-primary" data-width="20"></div>
                                <div class="budget-price-label">Selling Price</div>
                            </div>
                            <div class="budget-price justify-content-center">
                                <div class="budget-price-square bg-danger" data-width="20"></div>
                                <div class="budget-price-label">Budget Price</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="tab-content no-padding" id="myTab2Content">
                        <div class="tab-pane fade" id="kelas" role="tabpanel" aria-labelledby="home-tab4">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Data Kelas ({{ $kelas->count() }})</h4>
                                    <div class="card-header-form">
                                        <form>
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Search">
                                                <div class="input-group-btn">
                                                    <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                                    <a class="btn btn-primary" data-toggle="modal" type="button"
                                                        data-target="#tambahKelas"><i class="bi bi-plus-lg"> Tambah
                                                            data</i></a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <tr>
                                                <th class="text-center">Kelas</th>
                                                <th class="text-center">Nama Jurusan</th>
                                                <th class="text-center"><i class="bi bi-gear"></i></th>
                                            </tr>
                                            {{-- Perulangan Data Siswa --}}
                                            @if ($kelas->count())
                                                @foreach ($kelas as $item)
                                                    <tr>
                                                        <td class="text-center">{{ $item->kelas }}</td>
                                                        <td class="text-center">{{ $item->jurusan }}</td>
                                                        <td class="text-center">
                                                            {{-- <a type="button" class="btn btn-primary" id="edit-kelas"
                                                                onclick="editKelas('{{ $item->kelas_id }}', '{{ $item->kelas }}', '{{ $item->jurusan }}')">Edit</a> --}}
                                                                <a href="{{ route('data_kelas.edit', $item->kelas_id) }}" class="btn btn-primary">Edit Kelas</a>
                                                            <button class="btn btn-primary" data-toggle="modal"
                                                                data-target="#exampleModal">Aw, yeah!</button>
                                                            <a href="#" class="btn btn-danger">Hapus</a>
                                                        </td>
                                                    </tr>
                                                    {{-- Modal Tambah Data Kelas --}}
                                                    <div class="modal fade" tabindex="-1" role="dialog" id="editKelas">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Tambah Data Kelas</h5>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form method="POST"
                                                                        action="{{ route('data_kelas.store') }}"
                                                                        enctype="multipart/form-data">
                                                                        @csrf
                                                                        <div class="form-group">
                                                                            <label>Kelas</label>
                                                                            <input type="text" class="form-control"
                                                                                required name="kelas"
                                                                                value="{{ $item->kelas }}">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Jurusan</label>
                                                                            <input type="text" class="form-control"
                                                                                required name="jurusan"
                                                                                value="{{ $item->jurusan }}">
                                                                        </div>
                                                                </div>
                                                                <div class="modal-footer bg-whitesmoke br">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary">Save
                                                                        changes</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- /End Modal Tambah Data Kelas --}}
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td colspan="3" class="text-center">Tidak Ada Data Kelas.</td>
                                                </tr>
                                            @endif
                                            {{-- /Perulangan Data Siswa --}}
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="data_siswa" role="tabpanel" aria-labelledby="contact-tab4">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Data Siswa ({{ $siswa->count() }})</h4>
                                    <div class="card-header-form">
                                        <form>
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Search">
                                                <div class="input-group-btn">
                                                    <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                                    <a class="btn btn-primary" data-toggle="modal" type="button"
                                                        data-target="#tambahSiswa"><i class="bi bi-plus-lg"> Tambah
                                                            data</i></a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <tr>
                                                <th>Foto</th>
                                                <th>Nama</th>
                                                <th>NIS</th>
                                                <th>Kelas</th>
                                                <th>Jurusan</th>
                                                <th class="text-center"><i class="bi bi-gear"></i></th>
                                            </tr>
                                            {{-- Perulangan Data Siswa --}}
                                            @if ($siswa->count())
                                                @foreach ($siswa as $item)
                                                    <tr>
                                                        <td>
                                                            <img alt="image"
                                                                src="{{ asset('stisla/assets/img/avatar/avatar-4.png') }}"
                                                                width="50" class="img-fluid"
                                                                data-toggle="tooltip" title=""
                                                                data-original-title="{{ $item->name }}">
                                                        </td>
                                                        <td>{{ $item->nama }}</td>
                                                        <td>{{ $item->NIS }}</td>
                                                        <td>{{ $item->siswaKelas->kelas }}</td>
                                                        <td>{{ $item->siswaKelas->jurusan }}</td>
                                                        <td class="text-center">
                                                            <a type="button" class="btn btn-primary"
                                                                id="tambah-kelas">Edit</a>
                                                            <a href="#" class="btn btn-danger">Hapus</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td colspan="5" class="text-center">Tidak Ada Data Siswa.</td>
                                                </tr>
                                            @endif
                                            {{-- /Perulangan Data Siswa --}}
                                        </table>
                                    </div>
                                </div>
=======
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Data Siswa ({{ $siswa->count() }})</h4>
                            <div class="card-header-action">
                                <button class="btn btn-success" data-toggle="modal" data-target="#ImportSiswa">
                                    Import data Siswa
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <tr>
                                        {{-- <th>Foto</th> --}}
                                        <th>Nama</th>
                                        <th>NIS</th>
                                        <th>Kelas</th>
                                        <th>Jurusan</th>
                                        <th class="text-center"><i class="bi bi-gear"></i></th>
                                    </tr>
                                    {{-- Perulangan Data Siswa --}}
                                    @if ($siswa->count())
                                        @foreach ($siswa as $item)
                                            <tr>
                                                <td>{{ $item->nama }}</td>
                                                <td>{{ $item->nis }}</td>
                                                <td>{{ $item->siswaKelas->kelas }}</td>
                                                <td>{{ $item->siswaKelas->jurusan }}</td>
                                                <td class="text-center">
                                                    {{-- <a type="button" class="btn btn-primary" id="tambah-kelas">Edit</a> --}}
                                                    <a type="button" class="btn btn-primary" href="#"
                                                        data-toggle="modal"
                                                        data-target="#detailSiswa-{{ $item->siswa_id }}">Detail</a>
                                                    <a type="button" class="btn btn-success" href="#"
                                                        data-toggle="modal"
                                                        data-target="#absensi-{{ $item->siswa_id }}">ABSENSI</a>
                                                    {{-- <a type="button" class="btn btn-success" href="#"
                                                        data-toggle="modal"
                                                        data-target="#editSiswa-{{ $item->siswa_id }}">Edit</a>
                                                    <a type="button" class="btn btn-danger badge badge-pil" href="#"
                                                        data-toggle="modal"
                                                        data-target="#detailSiswa-{{ $item->siswa_id }}"><i
                                                            class="bi bi-trash"></i></a> --}}
                                                    {{-- <a href="#" class="btn btn-danger">Hapus</a> --}}
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="5" class="text-center">Tidak Ada Data Siswa.</td>
                                        </tr>
                                    @endif
                                    {{-- /Perulangan Data Siswa --}}
                                </table>
>>>>>>> dev-rhma
                            </div>
                        </div>
                    </div>
                </div>
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======

>>>>>>> dev-rhma
>>>>>>> 9b64a56c6e68bd83319d935a2ab64b45b930dea3
            </div>
        </section>
    </div>

<<<<<<< HEAD
    {{-- Modal Import --}}
    <div class="modal fade" tabindex="-1" role="dialog" id="ImportSiswa">
=======

<<<<<<< HEAD

    {{-- Modal Tambah Data Kelas --}}
    <div class="modal fade" tabindex="-1" role="dialog" id="tambahKelas">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data Kelas</h5>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('data_kelas.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Kelas</label>
                            <input type="text" class="form-control" required name="kelas">
                        </div>
                        <div class="form-group">
                            <label>Jurusan</label>
                            <input type="text" class="form-control" required name="jurusan">
                        </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- /End Modal Tambah Data Kelas --}}


=======
>>>>>>> dev-rhma
    {{-- Form Tambah Data Siswa --}}
    <div class="modal fade" tabindex="-1" role="dialog" id="tambahSiswa">
>>>>>>> 9b64a56c6e68bd83319d935a2ab64b45b930dea3
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Import Siswa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('siswa.import') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <div class="section-title">File Data Siswa</div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="import-guru" name="import-guru"
                                    accept=".xlsx, .xls">
                                <label class="custom-file-label" for="import-guru">Choose file</label>
                            </div>
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
    {{-- /Modal Import --}}


<<<<<<< HEAD
    <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Modal body text goes here.</p>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
=======
    @foreach ($siswa as $item)
        {{-- Detail Siswa --}}
        <div class="modal fade" tabindex="1" role="dialog" id="detailSiswa-{{ $item->siswa_id }}">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Detail Siswa</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            {{-- <div class="row mb-3"></div> --}}
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Foto Siswa</label>
                                    <br>
                                    {{-- <p> --}}
                                    <figure class="avatar mr-2 avatar-xl text-center">
                                        <img @if ($item->image_siswa == true) src="{{ asset('storage/' . $item->image_siswa) }}"
                                                @else
                                                src="{{ asset('stisla/assets/img/avatar/avatar-2.png') }}" @endif
                                                    class="rounded" style="height: 100px;" alt="foto Siswa">
                                    </figure>
                                    {{-- </p> --}}
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="form-group ">
                                    <label>Nama Siswa / Username</label>
                                    <input type="text" disabled class="form-control" required
                                        value="{{ $item->nama }} / {{ $item->username }}">
                                </div>
                                <div class="form-group ">
                                    <label>NIS</label>
                                    <input type="text" disabled class="form-control" required
                                        value="{{ $item->nis }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-grup">
                                    <label>Kelas</label>
                                    <input type="text" disabled class="form-control" required
                                        value="{{ $item->siswaKelas->kelas }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-grup">
                                    <label>Jurusan</label>
                                    <input type="text" disabled class="form-control" required
                                        value="{{ $item->siswaKelas->jurusan }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-grup">
                                    <label>Email</label>
                                    <input type="text" disabled class="form-control" required
                                        value="{{ $item->email }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-grup">
                                    <label>Password</label>
                                    <input type="password" disabled class="form-control" required
                                        value="{{ $item->password }}"><i class="bi bi-eye"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer bg-whitesmoke br">
                        <button type="submit" class="btn btn-primary" data-dismiss="modal">Tutup</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- End Detail Siswa --}}

        {{-- Absen --}}
        <div class="modal fade" tabindex="1" role="dialog" id="absensi-{{ $item->siswa_id }}">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Absensi Siswa</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            {{-- <div class="row mb-3"></div> --}}
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Foto Siswa</label>
                                    <br>
                                    {{-- <p> --}}
                                        {{-- @dd($item->image_siswa) --}}
                                    <figure class="avatar mr-2 avatar-xl text-center">
                                        <img @if ($item->image_siswa == true) src="{{ asset('storage/' . $item->image_siswa) }}"
                                                @else
                                                src="{{ asset('stisla/assets/img/avatar/avatar-2.png') }}" @endif
                                            class="rounded" style="height: 100px;" alt="foto Guru">
                                    </figure>
                                    {{-- </p> --}}
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="form-group ">
                                    <label>Nama Siswa / Username</label>
                                    <input type="text" disabled class="form-control" required
                                        value="{{ $item->nama }} / {{ $item->username }}">
                                </div>
                                <div class="form-group ">
                                    <label>NIS</label>
                                    <input type="text" disabled class="form-control" required
                                        value="{{ $item->nis }}">
                                </div>
                            </div>
                        </div>
                        <form action="{{ route('absensi.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="siswa_id" id="siswa_id" value="{{ $item->siswa_id }}">
                            <div class="form-group">
                                <label>KEHADIRAN</label>
                                <select class="form-control" name="status">
                                    <option value="sakit">Sakit</option>
                                    <option value="izin">Izin</option>
                                    <option value="alfa">Alfa</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Keterangan</label>
                                <textarea type="text" class="form-control" required name="keterangan" value="{{ $item->nis }}"></textarea>
                            </div>
                    </div>
                    <div class="modal-footer bg-whitesmoke br">
                        <button type="submit" class="btn btn-danger">Simpan ?</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- /End Absen --}}
    @endforeach
>>>>>>> dev-rhma
@endsection
