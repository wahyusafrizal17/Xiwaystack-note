@extends('layouts.app')
@section('title','Data Jokian - XIWAY NOTE')
@section('content')

    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
         <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-1">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Jokian</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('jokis.index') }}">Jokian</a>
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
                              <h4 class="card-title">Data Jokian</h4>
                              <a href="{{ route('jokis.create') }}" class="btn btn-primary btn-sm">
                                 <i data-feather='plus'></i> Tambah
                              </a>
                          </div>
                           <div class="card-body">
                              <div class="table-responsive">
                                 <table id="basic-datatables" class="display table table-striped table-hover">
                                    <thead>
                                       <tr>
                                          <th style="width: 5%">No</th>
                                          <th>Nama Aplikasi</th>
                                          <th>Customer</th>
                                          <th>Harga</th>
                                          <th>DP</th>
                                          <th>Sisa</th>
                                          <th>Rekening</th>
                                          <th>Status</th>
                                          <th style="width: 22%" class="text-center">Action</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($jokis as $row)
                                       <tr>
                                          <td>{{ $loop->iteration }}</td>
                                          <td>{{ $row->app_name }}</td>
                                          <td>{{ $row->customer_name }}<br><small>{{ $row->phone }}</small></td>
                                          <td>Rp {{ number_format($row->price,0,',','.') }}</td>
                                          <td>Rp {{ number_format($row->dp_amount,0,',','.') }}</td>
                                          <td>Rp {{ number_format($row->remaining_balance,0,',','.') }}</td>
                                          <td>{{ $row->bankAccount ? $row->bankAccount->bank_name : '-' }}</td>
                                          <td><span class="badge bg-{{ $row->status === 'completed' ? 'success' : ($row->status === 'in_progress' ? 'info' : ($row->status === 'cancelled' ? 'danger' : 'warning')) }}">{{ strtoupper($row->status) }}</span></td>
                                         <td class="text-center">
                                             <div class="form-button-action">
                                                <a href="{{ route('jokis.edit',[$row->id]) }}" class="btn btn-link btn-primary btn-sm" title="Edit">
                                                   <i data-feather='edit'></i>
                                                </a>
                                                <a href="{{ route('jokis.whatsapp', $row->id) }}" class="btn btn-link btn-success btn-sm" title="Kirim WhatsApp" target="_blank">
                                                  <i data-feather='send'></i>
                                                </a>
                                                <form action="{{ route('jokis.destroy', $row->id) }}" method="POST" style="display:inline">
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


