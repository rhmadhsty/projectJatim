@extends('template.app')


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

@section('content')

    <div class="main-content">
        <section class="section">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Data Siswa ({{ $siswa->count() }})</h4>
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
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </div>



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
                                        <img src="{{ asset('stisla/assets/img/avatar/avatar-2.png') }}" alt="foto Guru">
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
                                        value="{{ $item->password }}"><i
                                            class="bi bi-eye"></i>
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
    @endforeach
@endsection
