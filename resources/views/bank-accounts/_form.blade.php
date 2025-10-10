<div class="card-body">

    <div class="form-group row mt-2">
      <label class="col-sm-2 col-form-label">Nama Bank</label>
      <div class="col-sm-10">
         {{ Form::text('bank_name',null,['class'=>'form-control','placeholder'=>'Nama Bank'])}}
         @if ($errors->has('bank_name')) <span class="help-block" style="color:red">{{ $errors->first('bank_name') }}</span> @endif
      </div>
  </div>

  <div class="form-group row mt-2">
      <label class="col-sm-2 col-form-label">Nomor Rekening</label>
      <div class="col-sm-10">
         {{ Form::text('account_number',null,['class'=>'form-control','placeholder'=>'Nomor Rekening'])}}
         @if ($errors->has('account_number')) <span class="help-block" style="color:red">{{ $errors->first('account_number') }}</span> @endif
      </div>
  </div>

  <div class="form-group row mt-2">
      <label class="col-sm-2 col-form-label">Nama Pemilik</label>
      <div class="col-sm-10">
         {{ Form::text('account_holder_name',null,['class'=>'form-control','placeholder'=>'Nama Pemilik Rekening'])}}
         @if ($errors->has('account_holder_name')) <span class="help-block" style="color:red">{{ $errors->first('account_holder_name') }}</span> @endif
      </div>
  </div>

  <div class="form-group row mt-2">
    <label class="col-sm-2 col-form-label">Status</label>
    <div class="col-sm-10">
      {{ Form::select('is_active',[
        '1' => 'Aktif',
        '0' => 'Tidak Aktif'
      ], null, ['class' => 'form-control select2']) }}
       @if ($errors->has('is_active')) <span class="help-block" style="color:red">{{ $errors->first('is_active') }}</span> @endif
    </div>
  </div>

  </div>
  
  <div class="card-footer">
    <div class="form-group">
        <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-save"></i> Simpan</button>
        <a href="{{ route('bank-accounts.index') }}" class="btn btn-danger btn-sm"><i class="fas fa-backward"></i> Kembali</a>
    </div>
  </div>

</div>
