@extends('template.app')


@section('search')
<<<<<<< HEAD
    {{-- <form action="{{ route('data_guru.index') }}"> --}}
    <div class="search-element">
        {{-- mengirim data search kepada ajax --}}
        {{-- <form action="{{ route('guru.search') }}"> --}}
        <input class="form-control" type="text" placeholder="Search" aria-label="Search" data-width="250" name="search_guru"
            id="search_guru">
        <button class="btn" type="submit"><i class="fas fa-search"></i></button>
        {{-- </form> --}}
        {{-- <div class="search-backdrop"></div> --}}
    </div>
    {{-- </form> --}}
=======
<<<<<<< HEAD
    <div class="search-element">
        <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="250">
        <button class="btn" type="submit"><i class="fas fa-search"></i></button>
        <div class="search-backdrop"></div>
    </div>
=======
    <form action="{{ route('data_guru.index') }}">
        <div class="search-element">
            <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="250" name="search"
                value="{{ request('search') }}">
            <button class="btn" type="submit"><i class="fas fa-search"></i></button>
            <div class="search-backdrop"></div>
        </div>
    </form>
>>>>>>> dev-rhma
>>>>>>> 9b64a56c6e68bd83319d935a2ab64b45b930dea3
@endsection

@push('js')
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
    <script>
        $(document).ready(function() {
            $('#search_guru').on('input', function() {
                var query = $(this).val();
                // console.log(query);

                $.ajax({
                    url: "{{ route('guru.search') }}",
                    type: "GET",
                    data: {
                        'search': query
                    },
                    success: function(data) {
                        var results = '';
                        $.each(data, function(index, article) {
                            results += '<div>' + article.title + '</div>';
                        });
                        $('#search-results').html(results);
                    }
                });
            });
        });
    </script>
@endpush

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="row">
                <div class="col-12 ">
                    <div class="card">
                        <div class="card-header">
                            <h4>Jumlah Guru ({{ $guru->count() }})</h4>
                            <div class="card-header-action">
                                <button class="btn btn-success" data-toggle="modal" data-target="#ImportGuru">
                                    Import data Guru
                                </button>
                                <button class="btn btn-primary" data-toggle="modal" data-target="#TambahGuru">
                                    <i class="bi bi-plus-lg">Tambah data</i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled list-unstyled-border" id="search-results" >
                                {{-- Perulangan Data guru --}}

                                {{-- Perhitungan data guru untuk media search --}}
                                @if ($guru->count())
                                    @foreach ($guru as $item)
                                        {{-- @dd($item->role == 'admin') --}}
<<<<<<< HEAD
                                        @if ($item == true)
=======
                                        @if ($item->role == 'guru')
<<<<<<< HEAD
                                            {{-- @dd($item->image_user) --}}
=======
>>>>>>> dev-rhma
>>>>>>> 9b64a56c6e68bd83319d935a2ab64b45b930dea3
                                            <li class="media">
                                                <div class="avatar-item">
                                                    <img alt="image"
                                                        @if ($item->image_user == true) src="{{ asset('storage/' . $item->image_user) }}"
                                                        @else
                                                        src="{{ asset('stisla/assets/img/avatar/avatar-2.png') }}" @endif
                                                        width="50" class="img-fluid mr-3 rounded" data-toggle="tooltip"
                                                        title="" data-original-title="{{ $item->name }}">
                                                    <div class="avatar-badge" title="" data-toggle="tooltip"
                                                        data-original-title="Edit">
<<<<<<< HEAD
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
=======
                                                        <a href="#" type="button" data-toggle="modal"
                                                            data-target="#editGuru-{{ $item->user_id }}"><i
                                                                class="fas fa-pencil-alt"></i></a>
                                                    </div>
                                                </div>
                                                <div class="media-body">
                                                    <form action="{{ route('data_guru.destroy', $item->user_id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="badge badge-pill btn btn-danger mb-1 float-right"
                                                            type="submit" onclick="return confirm('Yakin Mau Dihapus?')"><i
                                                                class="fa fa-trash"></i></button>
                                                    </form>
                                                    <a type="button"
                                                        class="badge badge-pill btn btn-success mb-1 float-right"
                                                        href="#" data-toggle="modal"
                                                        data-target="#detailGuru-{{ $item->user_id }}">Detail</a>
>>>>>>> dev-rhma
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
<<<<<<< HEAD
                                    <p class="text-center">Tidak Ada Data Guru.</p>
=======
<<<<<<< HEAD
=======
                                    <p>Tidak Ada Data Guru tersebut.</p>
>>>>>>> dev-rhma
>>>>>>> 9b64a56c6e68bd83319d935a2ab64b45b930dea3
                                @endif

                                {{-- End Perulangan --}}
                            </ul>
<<<<<<< HEAD
                            <p class="mb-2">Use the Bootstrap method to create modal. You need to create an HTML
                                structure for modal and the following button will trigger it.</p>
                            <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Aw,
                                yeah!</button>
=======
>>>>>>> dev-rhma
                        </div>
                    </div>
                </div>
            </div>
        </section>

<<<<<<< HEAD
=======
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

<<<<<<< HEAD
=======
>>>>>>> 9b64a56c6e68bd83319d935a2ab64b45b930dea3
        @foreach ($guru as $item)
            {{-- @dd($item) --}}
            <div class="modal fade" tabindex="1" role="dialog" id="editGuru-{{ $item->user_id }}">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form method="POST" action="{{ route('data_guru.update', $item->user_id) }}"
                            enctype="multipart/form-data">
                            <div class="modal-header">
                                <h5 class="modal-title">Edit Guru</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="user_id" id="user_id" value="{{ $item->user_id }}">
                                <input type="hidden" name="role" id="role" value="{{ $item->role }}">
                                {{-- <input type="hidden" name="role" id="role" value="{{ $item->role }}"> --}}
                                <div class="form-group">
                                    <div class="section-title">File Data Guru</div>
                                    <div class="custom-file">
                                        {{-- @dd($item->image_user) --}}
                                        <input type="file" class="custom-file-input" id="image_user" name="image_user"
                                            value="{{ $item->image_user }}">
                                        <label class="custom-file-label" for="image_user">{{ $item->image_user }}</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Nama Guru</label>
                                    <input type="text" class="form-control" required name="name"
                                        value="{{ $item->name }}">
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
                                            <span class="input-group-text" id="showHide"><i
                                                    class="bi bi-eye"></i></span>
                                        </div>
                                        <input type="password" class="form-control pwstrength"
                                            data-indicator="pwindicator" name="password" id="password"
                                            value="{{ $item->password }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Divisi</label>
                                    <input type="text" class="form-control" required name="divisi"
                                        value="{{ $item->divisi }}">
                                </div>
                                <div class="form-group">
                                    <label>NIK</label>
                                    <input type="text" class="form-control" required name="nik"
                                        value="{{ $item->nik }}">
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Lahir</label>
                                    <input type="date" class="form-control pwstrength" data-indicator="pwindicator"
                                        name="tanggal_lahir" id="tanggal_lahir" value="{{ $item->tanggal_lahir }}">
                                </div>
                                <div class="form-group">
                                    <label>No Telepon</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-phone"></i>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control phone-number" required name="no_telp"
                                            value="{{ $item->no_telp }}">
                                    </div>
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
            {{-- Detail Guru --}}
            <div class="modal fade" tabindex="1" role="dialog" id="detailGuru-{{ $item->user_id }}">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form method="POST" action="{{ route('data_guru.update', $item->user_id) }}"
                            enctype="multipart/form-data">
                            <div class="modal-header">
                                <h5 class="modal-title">Detail guru</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="user_id" id="user_id" value="{{ $item->user_id }}">
                                <div class="row">
                                    {{-- <div class="row mb-3"></div> --}}
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Foto Guru</label>
                                            <br>
                                            {{-- <p> --}}
                                            <figure class="avatar avatar-xl text-center">
                                                <img @if ($item->image_user == true) src="{{ asset('storage/' . $item->image_user) }}"
                                                @else
                                                src="{{ asset('stisla/assets/img/avatar/avatar-2.png') }}" @endif
                                                    class="rounded" style="height: 100px;" alt="foto Guru">
                                            </figure>
                                            {{-- </p> --}}
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="form-group ">
                                            <label>Nama Guru</label>
                                            <input type="text" disabled class="form-control" required
                                                value="{{ $item->name }}">
                                        </div>
                                        <div class="form-group ">
                                            <label>NIK</label>
                                            <input type="text" disabled class="form-control" required
                                                value="{{ $item->nik }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-grup">
                                            <label>Divisi</label>
                                            <input type="text" disabled class="form-control" required
                                                value="{{ $item->divisi }}">
                                        </div>
                                        <div class="form-grup">
                                            <label>No Telepon</label>
                                            <input type="text" disabled class="form-control" required
                                                value="{{ $item->no_telp }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-grup">
                                            <label>Email</label>
                                            <input type="text" disabled class="form-control" required
                                                value="{{ $item->email }}">
                                        </div>
                                        <div class="form-grup">
                                            <label>Tanggal Lahir</label>
                                            <input type="text" disabled class="form-control pwstrength"
                                                data-indicator="pwindicator" required value="{{ $item->tanggal_lahir }}">
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
            {{-- End Detail Guru --}}
        @endforeach
>>>>>>> dev-rhma

        <div class="modal fade" tabindex="-1" role="dialog" id="ImportGuru">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Import Guru</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('guru.import') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <div class="section-title">File Data Guru</div>
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
                                <div class="section-title">Foto Guru</div>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="image_user" name="image_user">
                                    <label class="custom-file-label" for="image_user">Choose file</label>
                                </div>
                            </div>
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
                                <input type="date" class="form-control pwstrength" data-indicator="pwindicator"
                                    name="tanggal_lahir" id="tanggal_lahir">
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
<<<<<<< HEAD



=======
>>>>>>> dev-rhma
@endsection
