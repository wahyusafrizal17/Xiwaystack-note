@extends('layouts.app')
@section('title','Detail Pengeluaran - XIWAY NOTE')
@section('content')

    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
         <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-1">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Detail Pengeluaran</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('expenses.index') }}">Pengeluaran</a>
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
                <section id="dashboard-analytics">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="card">
                           <div class="card-header">
                              <h4 class="card-title">Detail Pengeluaran</h4>
                              <a href="{{ route('expenses.index') }}" class="btn btn-secondary btn-sm">
                                 <i data-feather='arrow-left'></i> Kembali
                              </a>
                          </div>
                           <div class="card-body">
                              <div class="row">
                                  <div class="col-md-6">
                                      <table class="table table-bordered">
                                          <tr>
                                              <th width="30%">Nama</th>
                                              <td>{{ $expense->name }}</td>
                                          </tr>
                                          <tr>
                                              <th>Kategori</th>
                                              <td>
                                                  <span class="badge bg-info">{{ $expense->category }}</span>
                                              </td>
                                          </tr>
                                          <tr>
                                              <th>Jumlah</th>
                                              <td class="font-weight-bold text-danger">{{ $expense->formatted_amount }}</td>
                                          </tr>
                                          <tr>
                                              <th>Tanggal</th>
                                              <td>{{ $expense->expense_date->format('d F Y') }}</td>
                                          </tr>
                                          <tr>
                                              <th>Deskripsi</th>
                                              <td>{{ $expense->description ?: '-' }}</td>
                                          </tr>
                                      </table>
                                  </div>
                              </div>
                              <div class="mt-3">
                                  <a href="{{ route('expenses.edit', $expense->id) }}" class="btn btn-warning">
                                      <i data-feather='edit'></i> Edit
                                  </a>
                                  <form action="{{ route('expenses.destroy', $expense->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pengeluaran ini?')">
                                      @csrf
                                      @method('DELETE')
                                      <button type="submit" class="btn btn-danger">
                                          <i data-feather='trash-2'></i> Hapus
                                      </button>
                                  </form>
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
