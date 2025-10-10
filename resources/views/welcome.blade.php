@extends('layouts.app')
@section('title','Dashboard - XIWAY NOTE')
@section('content')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Dashboard</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="/">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- Statistics Cards -->
            <section id="dashboard-analytics">
                <div class="row match-height">
                    <!-- Total Jokis -->
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-body text-center">
                                <div class="avatar bg-light-primary mb-2">
                                    <div class="avatar-content">
                                        <i class="feather icon-check-square text-primary font-medium-5"></i>
                                    </div>
                                </div>
                                <h3 class="fw-bolder mb-1">{{ $totalJokis }}</h3>
                                <p class="card-text">Total Jokian</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Total Users -->
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-body text-center">
                                <div class="avatar bg-light-success mb-2">
                                    <div class="avatar-content">
                                        <i class="feather icon-users text-success font-medium-5"></i>
                                    </div>
                                </div>
                                <h3 class="fw-bolder mb-1">{{ $totalUsers }}</h3>
                                <p class="card-text">Total Users</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Total Paid -->
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-body text-center">
                                <div class="avatar bg-light-info mb-2">
                                    <div class="avatar-content">
                                        <i class="feather icon-dollar-sign text-info font-medium-5"></i>
                                    </div>
                                </div>
                                <h3 class="fw-bolder mb-1">Rp {{ number_format($totalPaid, 0, ',', '.') }}</h3>
                                <p class="card-text">Sudah Dibayar</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Total Unpaid -->
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-body text-center">
                                <div class="avatar bg-light-warning mb-2">
                                    <div class="avatar-content">
                                        <i class="feather icon-alert-circle text-warning font-medium-5"></i>
                                    </div>
                                </div>
                                <h3 class="fw-bolder mb-1">Rp {{ number_format($totalUnpaid, 0, ',', '.') }}</h3>
                                <p class="card-text">Belum Dibayar</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            
            <!-- Jokis Status Overview -->
            <section id="jokis-overview">
                <div class="row">
                    <!-- Completed Jokis -->
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Jokian Selesai</h4>
                                <a href="{{ route('jokis.index') }}" class="btn btn-success btn-sm">
                                    <i data-feather='eye'></i> Lihat Semua
                                </a>
                            </div>
                            <div class="card-body">
                                @if($completedJokis->count() > 0)
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Nama Aplikasi</th>
                                                    <th>Customer</th>
                                                    <th>Harga</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($completedJokis as $joki)
                                                <tr>
                                                    <td>{{ $joki->app_name }}</td>
                                                    <td>{{ $joki->customer_name }}<br><small>{{ $joki->phone }}</small></td>
                                                    <td>Rp {{ number_format($joki->price, 0, ',', '.') }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @else
                                    <div class="text-center py-4">
                                        <p class="text-muted">Belum ada jokian yang selesai</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    
                    <!-- Pending Jokis -->
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Jokian Belum Selesai</h4>
                                <a href="{{ route('jokis.index') }}" class="btn btn-warning btn-sm">
                                    <i data-feather='eye'></i> Lihat Semua
                                </a>
                            </div>
                            <div class="card-body">
                                @if($pendingJokis->count() > 0)
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Nama Aplikasi</th>
                                                    <th>Customer</th>
                                                    <th>Harga</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($pendingJokis as $joki)
                                                <tr>
                                                    <td>{{ $joki->app_name }}</td>
                                                    <td>{{ $joki->customer_name }}<br><small>{{ $joki->phone }}</small></td>
                                                    <td>Rp {{ number_format($joki->price, 0, ',', '.') }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @else
                                    <div class="text-center py-4">
                                        <p class="text-muted">Belum ada jokian yang belum selesai</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection