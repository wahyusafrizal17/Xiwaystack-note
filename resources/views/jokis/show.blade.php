@extends('layouts.app')
@section('title','Detail Jokian - XIWAY NOTE')
@section('content')

    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
         <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-1">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Detail Jokian</h2>
                    </div>
                </div>
            </div>
        </div>
            <div class="content-body">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                @if($joki->photo_path)
                                    <img src="{{ asset('storage/'.$joki->photo_path) }}" class="img-fluid"/>
                                @endif
                            </div>
                            <div class="col-md-8">
                                <h4>{{ $joki->app_name }}</h4>
                                <p><b>Domain:</b> {{ $joki->domain ?? '-' }}</p>
                                <p><b>Nama:</b> {{ $joki->customer_name }}</p>
                                <p><b>No HP:</b> {{ $joki->phone }}</p>
                                <p><b>Harga:</b> Rp {{ number_format($joki->price,0,',','.') }}</p>
                                <p><b>DP:</b> Rp {{ number_format($joki->dp_amount,0,',','.') }}</p>
                                <p><b>Sisa:</b> Rp {{ number_format($joki->remaining_balance,0,',','.') }}</p>
                                <p><b>Rekening Transfer:</b> {{ $joki->bankAccount ? $joki->bankAccount->bank_name . ' - ' . $joki->bankAccount->account_number : '-' }}</p>
                                <p><b>Status:</b> {{ strtoupper($joki->status) }}</p>
                                <p><b>Catatan:</b> {{ $joki->notes }}</p>
                                <a href="{{ route('jokis.whatsapp', $joki->id) }}" class="btn btn-success"><i data-feather="send"></i> Kirim WhatsApp</a>
                                <a href="{{ route('jokis.edit', $joki->id) }}" class="btn btn-primary">Edit</a>
                                <a href="{{ route('jokis.index') }}" class="btn btn-secondary">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


