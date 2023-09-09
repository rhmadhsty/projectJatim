@extends('template.app')


@section('search')
    <div class="search-element">
        <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="250">
        <button class="btn" type="submit"><i class="fas fa-search"></i></button>
        <div class="search-backdrop"></div>
    </div>
@endsection

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="row">
                <div class="col-12 ">
                    <div class="card">
                        <div class="card-header">
                            <h4>Jumlah Guru ({{ $guru->count() }})</h4>
                            <div class="card-header-action">
                                <button class="btn btn-primary" data-toggle="modal" data-target="#TambahGuru">
                                    <i class="bi bi-plus-lg">Tambah data</i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled list-unstyled-border">
                                {{-- Perulangan Data guru --}}

                                {{-- Perhitungan data guru untuk media search --}}
                                @if ($guru->count())
                                    @foreach ($guru as $item)
                                        {{-- @dd($item->role == 'admin') --}}
                                        @if ($item == true)
                                            <li class="media">
                                                <div class="avatar-item">
                                                    <img alt="image"
                                                        src="{{ asset('stisla/assets/img/avatar/avatar-4.png') }}"
                                                        width="50" class="img-fluid mr-3" data-toggle="tooltip"
                                                        title="" data-original-title="{{ $item->name }}">
                                                    <div class="avatar-badge" title="" data-toggle="tooltip"
                                                        data-original-title="Edit">
                                                        <a href="#" type="button"
                                                            onclick="editGuru('{{ $item->user_id }}','{{ $item->name }}', '{{ $item->divisi }}', '{{ $item->nik }}', '{{ $item->email }}', '{{ $item->password }}', '{{ $item->no_telp }}', '{{ $item->tanggal_lahir }}')"
                                                            data-toggle="modal" data-target="#editGuru"><i
                                                                class="fas fa-pencil-alt"></i></a>
                                                        <div class="modal fade" tabindex="-1" role="dialog"
                                                            id="editGuru">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title">Edit Guru</h5>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form method="POST"
                                                                            action="{{ route('data_guru.store') }}"
                                                                            enctype="multipart/form-data">
                                                                            @csrf
                                                                            <div class="form-group">
                                                                                <label>Nama Guru</label>
                                                                                <input type="text" class="form-control"
                                                                                    required name="name"
                                                                                    value="{{ $item->name }}">
                                                                            </div>
                                                                            <input type="hidden" name="role"
                                                                                value="guru">
                                                                            <div class="form-group">
                                                                                <label>Ema-il</label>
                                                                                <input type="email" class="form-control"
                                                                                    required name="email">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label>Password</label>
                                                                                <div class="input-group">
                                                                                    <div class="input-group-prepend">
                                                                                        <span class="input-group-text"
                                                                                            id="showHide"><i
                                                                                                class="bi bi-eye"></i></span>
                                                                                    </div>
                                                                                    <input type="password"
                                                                                        class="form-control pwstrength"
                                                                                        data-indicator="pwindicator"
                                                                                        name="password" id="password">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label>Divisi</label>
                                                                                <input type="text" class="form-control"
                                                                                    required name="divisi">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label>NIK</label>
                                                                                <input type="text" class="form-control"
                                                                                    required name="nik">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label>Tanggal Lahir</label>
                                                                                <input type="text"
                                                                                    class="form-control datemask"
                                                                                    placeholder="YYYY/MM/DD"
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
                                                                                    <input type="text"
                                                                                        class="form-control phone-number"
                                                                                        required name="no_telp">
                                                                                </div>
                                                                            </div>
                                                                    </div>
                                                                    <div class="modal-footer bg-whitesmoke br">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">Close</button>
                                                                        <button type="submit"
                                                                            class="btn btn-primary">Tambah data</button>
                                                                    </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="media-body">
                                                    <div class="badge badge-pill badge-success mb-1 float-right">Online
                                                    </div>
                                                    <h6 class="media-title">{{ $item->name }}</h6>
                                                    <div class="text-small text-muted">{{ $item->divisi }} <div
                                                            class="bullet">
                                                        </div>
                                                        <span class="text-primary">{{ $item->email }}</span>
                                                    </div>
                                                </div>
                                            </li>
                                        @endif
                                    @endforeach
                                @else
                                @endif

                                {{-- End Perulangan --}}
                            </ul>
                            <p class="mb-2">Use the Bootstrap method to create modal. You need to create an HTML
                                structure for modal and the following button will trigger it.</p>
                            <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Aw,
                                yeah!</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

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



        <div class="modal fade" tabindex="-1" role="dialog" id="TambahGuru">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Guru</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('data_guru.store') }}" enctype="multipart/form-data">
                            @csrf
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
    </div>



@endsection