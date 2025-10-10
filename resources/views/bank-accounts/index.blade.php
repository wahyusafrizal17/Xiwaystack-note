@extends('layouts.app')
@section('title','Data Rekening Bank - Bank Account Manager')
@section('content')

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
         <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-1">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Rekening Bank</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('bank-accounts.index') }}">Rekening Bank</a>
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
                <!-- Dashboard Analytics Start -->
                <section id="dashboard-analytics">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="card">
                           <div class="card-header">
                              <h4 class="card-title">Data Rekening Bank</h4>
                              <a href="{{ route('bank-accounts.create') }}" class="btn btn-primary btn-sm">
                                 <i data-feather='plus'></i> Tambah
                              </a>
                          </div>
                           <div class="card-body">
                              <div class="table-responsive">
                                 <table id="basic-datatables" class="display table table-striped table-hover">
                                    <thead>
                                       <tr>
                                          <th style="width: 5%">No</th>
                                          <th>Nama Bank</th>
                                          <th>Nomor Rekening</th>
                                          <th>Nama Pemilik</th>
                                          <th>Status</th>
                                          <th style="width: 20%" class="text-center">Action</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($bankAccounts as $row)
                                       <tr>
                                          <td>{{ $loop->iteration }}</td>
                                          <td>{{ $row->bank_name }}</td>
                                          <td>{{ $row->account_number }}</td>
                                          <td>{{ $row->account_holder_name }}</td>
                                          <td>
                                             <span class="badge bg-{{ $row->is_active ? 'success' : 'danger' }}">
                                                {{ $row->is_active ? 'Aktif' : 'Tidak Aktif' }}
                                             </span>
                                          </td>
                                         <td class="text-center">
                                             <div class="form-button-action">
                                                <a href="{{ route('bank-accounts.show',[$row->id]) }}" data-toggle="tooltip" title="" class="btn btn-link btn-info btn-sm" data-original-title="Detail">
                                                   <i data-feather='eye'></i>
                                                </a>
                                                <a href="{{ route('bank-accounts.edit',[$row->id]) }}" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-sm" data-original-title="Edit">
                                                   <i data-feather='edit'></i>
                                                </a>
                                                <form action="{{ route('bank-accounts.destroy', $row->id) }}" method="POST" style="display:inline">
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

                    <!--/ List DataTable -->
                </section>
                <!-- Dashboard Analytics end -->

            </div>
        </div>
    </div>
    <!-- END: Content-->
@endsection
