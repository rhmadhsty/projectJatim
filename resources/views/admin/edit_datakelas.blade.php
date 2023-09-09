@extends('template.app')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="row">
                <div class="col-12 ">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Guru</h4>
                        </div>
                        <div class="card-body">
                                <form method="POST" action="{{ route('data_kelas.update', $kelas->kelas_id) }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('put')
                                    <input type="hidden" name="kelas_id" value="{{ $kelas->kelas_id }}">
                                    <div class="form-group">
                                        <label>Kelas</label>
                                        <input type="text" class="form-control" required name="kelas" value="{{ $kelas->kelas }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Jurusan</label>
                                        <input type="text" class="form-control" required name="jurusan" value="{{ $kelas->jurusan }}">
                                    </div>
                                    <a href="{{ route('data_siswa.index') }}" type="button"
                                        class="btn btn-secondary">Kembali</a>
                                    <button class="btn btn-primary" type="submit">Edit Kelas</button>
                                </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
