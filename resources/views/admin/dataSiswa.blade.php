@extends('template.app')

@section('content')

    <div class="main-content">
        <section class="section">
            <div class="row">
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>



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


    {{-- Form Tambah Data Siswa --}}
    <div class="modal fade" tabindex="-1" role="dialog" id="tambahSiswa">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data Kelas</h5>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('data_siswa.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Nama Siswa</label>
                            <input type="text" class="form-control" required name="nama">
                        </div>
                        <div class="form-group">
                            <label>NIS</label>
                            <input type="text" class="form-control" required name="NIS">
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
    {{-- /End Form Tambah Data Siswa --}}


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
@endsection
