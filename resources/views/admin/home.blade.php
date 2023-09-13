@extends('template.app')

{{-- @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in Admin!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="row">
                <div class="col-12">
                    <div class="card card-statistic-2">
                        <div class="card-stats">
                            <div class="card-stats-title">jumlah absen
                            </div>
                            <div class="card-stats-items">
                                <div class="card-stats-item">
                                    <div class="card-stats-item-count">{{ $sakit->count() }}</div>
                                    <div class="card-stats-item-label">Sakit</div>
                                </div>
                                <div class="card-stats-item">
                                    <div class="card-stats-item-count">{{ $izin->count() }}</div>
                                    <div class="card-stats-item-label">Izin</div>
                                </div>
                                <div class="card-stats-item">
                                    <div class="card-stats-item-count">{{ $alfa->count() }}</div>
                                    <div class="card-stats-item-label">Alfa</div>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="card-icon shadow-primary bg-primary">
                            <i class="fas fa-archive"></i>
                        </div> --}}
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4></h4>
                            </div>
                            <div class="card-body">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </div>
@endsection
