@extends('template.app')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card gradient-bottom">
                        <div class="card-header">
                            <h4>DATA PERKELAS</h4>
                        </div>
                        <div class="card-body">
                            <ul class="nav nav-pills flex-column" id="myTab4" role="tablist">
                                {{-- if else jika tidak ada data --}}
                                @if ($kelas->count())
                                    {{-- Perulangan Data Perkelas --}}
                                    @foreach ($kelas as $item)
                                        <li class="nav-item">
                                            {{-- <a class="nav-link" id="home-tab4" data-toggle="tab" href="#kelas" role="tab"
                                aria-controls="home" aria-selected="true"
                                onclick="dataSiswa('{{ $item->kelas_id }}')">{{ $item->kelas }} -
                                {{ $item->jurusan }}</a> --}}
                                            <a class="nav-link"
                                                href="{{ route('data_kelas.getData.index', $item->kelas_id) }}">{{ $item->kelas }}
                                                -
                                                {{ $item->jurusan }}</a>
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
                @yield('get')
            </div>
        </section>
    </div>


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
@endsection
