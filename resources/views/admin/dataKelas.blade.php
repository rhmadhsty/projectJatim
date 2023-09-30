@extends('template.app')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="row">
<<<<<<< HEAD
                <div class="col-lg-4">
                    <div class="card gradient-bottom">
                        <div class="card-header">
                            <h4>DATA PERKELAS</h4>
=======
                <div class="col-lg-5">
                    <div class="card">
                        <div class="card-header">
                            <h4><a href="{{ route('data_kelas.index') }}">KELAS</a> ({{ $kelas->count() }})</h4>
                            <div class="card-header-form">
                                <form action="{{ route('data_kelas.index') }}">
                                    <div class="input-group">
                                        <input type="search" class="form-control" placeholder="Search" name="search"
                                            value="{{ request('search') }}">
                                        <div class="input-group-btn">
                                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
>>>>>>> dev-rhma
                        </div>
                        <div class="card-body">
                            <ul class="nav nav-pills flex-column" id="myTab4" role="tablist">
                                {{-- if else jika tidak ada data --}}
                                @if ($kelas->count())
                                    {{-- Perulangan Data Perkelas --}}
                                    @foreach ($kelas as $item)
                                        <li class="nav-item">
<<<<<<< HEAD
                                            {{-- <a class="nav-link" id="home-tab4" data-toggle="tab" href="#kelas" role="tab"
                                aria-controls="home" aria-selected="true"
                                onclick="dataSiswa('{{ $item->kelas_id }}')">{{ $item->kelas }} -
                                {{ $item->jurusan }}</a> --}}
                                            <a class="nav-link"
                                                href="{{ route('data_kelas.getData.index', $item->kelas_id) }}">{{ $item->kelas }}
                                                -
                                                {{ $item->jurusan }}</a>
=======
                                            <a class="nav-link float-left"
                                                href="{{ route('data_kelas.getData.index', $item->kelas_id) }}">{{ $item->kelas }}
                                                -
                                                {{ $item->jurusan }}</a>
                                            <form action="{{ route('data_kelas.destroy', $item->kelas_id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="badge badge-pill btn btn-danger float-right" type="submit"
                                                    onclick="return confirm('Yakin Mau Dihapus?')"><i
                                                        class="fa fa-trash"></i></button>
                                            </form>
>>>>>>> dev-rhma
                                        </li>
                                    @endforeach
                                    {{-- /End Perulangan Data Perkelas --}}
                                @else
                                    <li class="nav-item text-center">Tidak Ada Data Kelas.</li>
                                @endif
                                {{-- /end if else --}}
                            </ul>
                        </div>
                        <div class="card-footer pt-3 d-flex justify-content-center">
<<<<<<< HEAD
                            <div class="budget-price justify-content-center">
                                <div class="budget-price-square bg-primary" data-width="20"></div>
                                <div class="budget-price-label">Selling Price</div>
                            </div>
                            <div class="budget-price justify-content-center">
                                <div class="budget-price-square bg-danger" data-width="20"></div>
                                <div class="budget-price-label">Budget Price</div>
=======
                            <div class="budget-price-square justify-content-center">
                                <button class="btn btn-success" data-toggle="modal" type="button"
                                    data-target="#importKelas">Import Data Kelas</button>
                                <button class="btn btn-primary" data-toggle="modal" type="button"
                                    data-target="#tambahKelas"><i class="bi bi-plus-lg"> Tambah
                                        data</i></button>
>>>>>>> dev-rhma
                            </div>
                        </div>
                    </div>
                </div>
                @yield('get')
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
=======
<<<<<<< HEAD
=======
    
>>>>>>> 9b64a56c6e68bd83319d935a2ab64b45b930dea3




    <div class="modal fade" tabindex="-1" role="dialog" id="tambahGuru">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Guru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ route('data_guru.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nama Guru</label>
                            <input type="text" class="form-control" required name="name">
                        </div>
                        <input type="hidden" name="role" value="guru">
                        <div class="form-group">
                            <label>Ema-il</label>
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
                            <label>Divisi</label>
                            <input type="text" class="form-control" required name="divisi">
                        </div>
                        <div class="form-group">
                            <label>NIK</label>
                            <input type="text" class="form-control" required name="nik">
                        </div>
                        <div class="form-group">
                            <label>Tanggal Lahir</label>
                            <input type="text" class="form-control datemask" placeholder="YYYY/MM/DD"
                                name="tanggal_lahir">
                        </div>
                        <div class="form-group">
                            <label>No Telepon</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-phone"></i>
                                    </div>
                                </div>
                                <input type="text" class="form-control phone-number" required name="no_telp">
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

>>>>>>> dev-rhma

    {{-- Form Tambah Data Kelas --}}
    {{-- <form class="modal-part" id="modal-kelas" method="POST" action="{{ route('data_kelas.store') }}"
        enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Kelas</label>
            <input type="text" class="form-control" required name="kelas">
        </div>
        <div class="form-group">
            <label>Jurusan</label>
            <input type="text" class="form-control" required name="jurusan">
        </div>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button class="btn btn-primary" type="submit">Tambah Data</button>
    </form> --}}
    {{-- /End Form Tambah Data Kelas --}}
<<<<<<< HEAD
=======

    {{-- Modal Tambah Data Kelas --}}
    <div class="modal fade" tabindex="-1" role="dialog" id="importKelas">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Import Kelas</h5>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('kelas.import') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <div class="section-title">File Data Kelas</div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="import-kelas" name="import-kelas"
                                    accept=".xlsx, .xls">
                                <label class="custom-file-label" for="import-kelas">Choose file</label>
                            </div>
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

    {{-- Import Kelas --}}
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
<<<<<<< HEAD
    {{-- /End Import Kelas --}}
=======
    {{-- /End Modal Tambah Data Kelas --}}
>>>>>>> dev-rhma
>>>>>>> 9b64a56c6e68bd83319d935a2ab64b45b930dea3
@endsection
