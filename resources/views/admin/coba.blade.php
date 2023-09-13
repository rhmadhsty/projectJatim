@extends('template.app')

@section('content')
    {{-- <div class="card">
    <div class="card-header">
        <h4>The Bootstrap Way</h4>
    </div>
    <div class="card-body">
        <p class="mb-2">Use the Bootstrap method to create modal. You need to create
            an HTML structure for modal and the following button will trigger it.</p>
        <button class="btn btn-primary" data-toggle="modal"
            data-target="#exampleModal">Aw, yeah!</button>
    </div>
</div>

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
</div> --}}

    <div class="main-content">
        <section class="section">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>The Bootstrap Way</h4>
                        </div>
                        <div class="card-body">
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
    </div>
@endsection
