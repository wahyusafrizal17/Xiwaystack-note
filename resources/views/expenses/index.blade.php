@extends('layouts.app')
@section('title','Data Pengeluaran - XIWAY NOTE')
@section('content')

    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
         <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-1">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Pengeluaran</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('expenses.index') }}">Pengeluaran</a>
                                </li>
                                <li class="breadcrumb-item active">index
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
                              <h4 class="card-title">Data Pengeluaran</h4>
                              <a href="{{ route('expenses.create') }}" class="btn btn-primary btn-sm">
                                 <i data-feather='plus'></i> Tambah
                              </a>
                          </div>
                           <div class="card-body">
                              <div class="table-responsive">
                                 <table id="basic-datatables" class="display table table-striped table-hover">
                                    <thead>
                                       <tr>
                                          <th style="width: 5%">No</th>
                                          <th>Nama</th>
                                          <th>Kategori</th>
                                          <th>Jumlah</th>
                                          <th>Tanggal</th>
                                          <th>Deskripsi</th>
                                          <th style="width: 22%" class="text-center">Action</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($expenses as $row)
                                       <tr>
                                          <td>{{ $loop->iteration }}</td>
                                          <td>{{ $row->name }}</td>
                                          <td><span class="badge bg-info">{{ $row->category }}</span></td>
                                          <td>{{ $row->formatted_amount }}</td>
                                          <td>{{ $row->expense_date->format('d/m/Y') }}</td>
                                          <td>{{ Str::limit($row->description, 50) ?: '-' }}</td>
                                         <td class="text-center">
                                             <div class="form-button-action">
                                                <a href="{{ route('expenses.edit',[$row->id]) }}" class="btn btn-link btn-primary btn-sm" title="Edit">
                                                   <i data-feather='edit'></i>
                                                </a>
                                                <form action="{{ route('expenses.destroy', $row->id) }}" method="POST" style="display:inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-link btn-danger btn-sm" onclick="return confirm('Hapus data ini?')"><i data-feather='trash-2'></i></button>
                                                </form>
                                             </div>
                                          </td>
                                       </tr>
                                       @endforeach
                                    </tbody>
                                 </table>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                </section>
            </div>
        </div>
    </div>
@endsection
