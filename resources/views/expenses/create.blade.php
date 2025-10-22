@extends('layouts.app')
@section('title','Tambah Pengeluaran - XIWAY NOTE')
@section('content')

    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
         <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-1">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Tambah Pengeluaran</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('expenses.index') }}">Pengeluaran</a>
                                </li>
                                <li class="breadcrumb-item active">Tambah
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <div class="content-body">
                <section id="dashboard-analytics">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="card">
                           <div class="card-header">
                              <h4 class="card-title">Form Tambah Pengeluaran</h4>
                          </div>
                           <div class="card-body">
                              {!! Form::open(['route' => 'expenses.store', 'method' => 'POST']) !!}
                                  @include('expenses._form')
                              {!! Form::close() !!}
                           </div>
                        </div>
                     </div>
                  </div>
                </section>
            </div>
        </div>
    </div>
@endsection
