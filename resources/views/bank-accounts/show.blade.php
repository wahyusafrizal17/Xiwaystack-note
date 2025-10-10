@extends('layouts.app')
@section('title','Detail Rekening Bank - Bank Account Manager')
@section('content')

    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
         <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-1">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Detail Rekening Bank</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('bank-accounts.index') }}">Rekening Bank</a>
                                </li>
                                <li class="breadcrumb-item active">Detail
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <div class="content-body">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h4>{{ $bankAccount->bank_name }}</h4>
                                <p><b>Nomor Rekening:</b> {{ $bankAccount->account_number }}</p>
                                <p><b>Nama Pemilik:</b> {{ $bankAccount->account_holder_name }}</p>
                                <p><b>Status:</b> 
                                    <span class="badge bg-{{ $bankAccount->is_active ? 'success' : 'danger' }}">
                                        {{ $bankAccount->is_active ? 'Aktif' : 'Tidak Aktif' }}
                                    </span>
                                </p>
                                <p><b>Dibuat:</b> {{ $bankAccount->created_at->format('d M Y H:i') }}</p>
                                <p><b>Diperbarui:</b> {{ $bankAccount->updated_at->format('d M Y H:i') }}</p>
                                
                                <div class="mt-3">
                                    <a href="{{ route('bank-accounts.edit', $bankAccount->id) }}" class="btn btn-primary">Edit</a>
                                    <a href="{{ route('bank-accounts.index') }}" class="btn btn-secondary">Kembali</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
