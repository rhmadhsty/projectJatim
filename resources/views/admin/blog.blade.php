@extends('template.app')

@push('css')
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush

@section('content')
    <div class="main-content">
        <div class="section">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Halaman BLOG</h4>
                            <div class="card-header-action">
                                <button class="btn btn-primary" data-toggle="modal" data-target="#TambahBlog">
                                    <i class="bi bi-plus-lg">Tambah data</i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <tr>
                                    {{-- <th>Foto</th> --}}
                                    <th>Judul</th>
                                    <th>Subjudul</th>
                                    <th>content</th>
                                    <th>Image</th>
                                    <th class="text-center"><i class="bi bi-gear"></i></th>
                                </tr>
                                {{-- Perulangan Data Blog --}}
                                @if ($blog->count())
                                    @foreach ($blog as $item)
                                        <tr>
                                            <td>{{ $item->judul }}</td>
                                            <td>{{ $item->subjudul }}</td>
                                            <td>{!! $item->content !!}</td>
                                            <td>{{ request()->is($item->image_blog) ? '' : 'Tidak ada image untuk Blog ini' }}
                                            </td>
                                            <td class="text-center">
                                                {{-- <a type="button" class="btn btn-primary" id="tambah-kelas">Edit</a> --}}
                                                <a type="button" class="btn btn-primary" href="#" data-toggle="modal"
                                                    data-target="#editBlog-{{ $item->blog_id }}">Edit</a>
                                                <a type="button" class="btn btn-success" href="#" data-toggle="modal"
                                                    data-target="#absensi-{{ $item->siswa_id }}">Hapus</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="5" class="text-center">Tidak Ada Data Blog.</td>
                                    </tr>
                                @endif
                                {{-- /Perulangan Data Blog --}}
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" id="TambahBlog">
        <div class="modal-dialog modal-fullscreen" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Blog</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Judul</label>
                            <input type="text" class="form-control" name="judul">
                        </div>
                        <div class="form-group">
                            <label>Subjudul</label>
                            <input type="text" class="form-control" name="subjudul">
                        </div>
                        <div class="form-group">
                            <label>Uploud
                                Gambar</label>
                            <div class="needsclick dropzone" id="blogImage">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Content</label>
                            <textarea name="content" id="editor"></textarea>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Publish</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@foreach ($blog as $item)
    {{-- Detail Siswa --}}
    <div class="modal fade" tabindex="1" role="dialog" id="editBlog-{{ $item->blog_id }}">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Blog</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="">
                        <div class="form-group">
                            <label>Judul</label>
                            <input type="text" class="form-control" name="judul" value="{{ $item->judul }}">
                        </div>
                        <div class="form-group">
                            <label>Subjudul</label>
                            <input type="text" class="form-control" name="subjudul" value="{{ $item->subjudul }}">
                        </div>
                        <div class="form-group">
                            <label>Uploud
                                Gambar</label>
                            <div class="needsclick dropzone" id="blogImage" value="{{ $item->image_blog }}" name="image_blog">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Content</label>
                            <textarea name="content" id="editor" value="{{ $item->content }}">{!! $item->content !!}</textarea>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Publish</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="submit" class="btn btn-primary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    {{-- End Detail Siswa --}}
@endforeach


@push('js')
    <script src="{{ asset('assets/CK/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('editor');
    </script>
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
    <script>
        Dropzone.options.blogImage = {
            url: "{{ route('blog.store') }}",
            acceptedFiles: '.jpeg,.jpg,.png',
            maxFiles: 1,
            maxFilesize: 2, // satuan MB(Mega Byte)
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            success: function(file, response) {
                $('form').find('input[name="image_blog"]').remove()
                $('form').append('<input type="hidden" name="image_blog" value="' + response.name + '">')
            },
            removedfile: function(file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('form').find('input[name="image_blog"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            error: function(file, response) {
                if ($.type(response) === 'string') {
                    var message = response //dropzone sends it's own error messages in string
                } else {
                    var message = response.errors.file
                }
                file.previewElement.classList.add('dz-error')
                _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
                _results = []
                for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                    node = _ref[_i]
                    _results.push(node.textContent = message)
                }
                return _results
            }
        }
    </script>
@endpush
