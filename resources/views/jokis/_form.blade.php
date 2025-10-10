<div class="card-body">

    <div class="form-group row mt-2">
      <label class="col-sm-2 col-form-label">Nama Aplikasi</label>
      <div class="col-sm-10">
         {{ Form::text('app_name',null,['class'=>'form-control','placeholder'=>'Nama Aplikasi'])}}
         @if ($errors->has('app_name')) <span class="help-block" style="color:red">{{ $errors->first('app_name') }}</span> @endif
      </div>
  </div>

  <div class="form-group row mt-2">
        <label class="col-sm-2 col-form-label">Foto</label>
        <div class="col-sm-10">
        {{ Form::file('photo',['class'=>'form-control'])}}
        @if (!empty($joki->photo_path))
            <div class="mt-1"><img src="{{ asset('storage/'.$joki->photo_path) }}" alt="photo" height="80"></div>
        @endif
        @if ($errors->has('photo')) <span class="help-block" style="color:red">{{ $errors->first('photo') }}</span> @endif
        </div>
    </div>

  <div class="form-group row mt-2">
      <label class="col-sm-2 col-form-label">Domain</label>
      <div class="col-sm-10">
         {{ Form::text('domain',null,['class'=>'form-control','placeholder'=>'Domain (opsional)'])}}
         @if ($errors->has('domain')) <span class="help-block" style="color:red">{{ $errors->first('domain') }}</span> @endif
      </div>
  </div>

  <div class="form-group row mt-2">
      <label class="col-sm-2 col-form-label">Harga</label>
      <div class="col-sm-10">
         {{ Form::number('price',null,['class'=>'form-control','placeholder'=>'Harga','min'=>0])}}
         @if ($errors->has('price')) <span class="help-block" style="color:red">{{ $errors->first('price') }}</span> @endif
      </div>
  </div>

  <div class="form-group row mt-2">
      <label class="col-sm-2 col-form-label">Nama</label>
      <div class="col-sm-10">
         {{ Form::text('customer_name',null,['class'=>'form-control','placeholder'=>'Nama Customer'])}}
         @if ($errors->has('customer_name')) <span class="help-block" style="color:red">{{ $errors->first('customer_name') }}</span> @endif
      </div>
  </div>

  <div class="form-group row mt-2">
      <label class="col-sm-2 col-form-label">Nomor HP</label>
      <div class="col-sm-10">
         {{ Form::text('phone',null,['class'=>'form-control','placeholder'=>'628xxxxxxxxx'])}}
         @if ($errors->has('phone')) <span class="help-block" style="color:red">{{ $errors->first('phone') }}</span> @endif
      </div>
  </div>

  <div class="form-group row mt-2">
      <label class="col-sm-2 col-form-label">DP (>=50%)</label>
      <div class="col-sm-10">
         {{ Form::number('dp_amount',null,['class'=>'form-control','placeholder'=>'DP','min'=>0])}}
         @if ($errors->has('dp_amount')) <span class="help-block" style="color:red">{{ $errors->first('dp_amount') }}</span> @endif
      </div>
  </div>

  <div class="form-group row mt-2">
      <label class="col-sm-2 col-form-label">Rekening Transfer</label>
      <div class="col-sm-10">
         {{ Form::select('bank_account_id', $bankAccounts->pluck('bank_name', 'id')->prepend('Pilih Rekening', ''), null, ['class' => 'form-control select2']) }}
         @if ($errors->has('bank_account_id')) <span class="help-block" style="color:red">{{ $errors->first('bank_account_id') }}</span> @endif
      </div>
  </div>

  <div class="form-group row mt-2">
    <label class="col-sm-2 col-form-label">Status</label>
    <div class="col-sm-10">
      {{ Form::select('status',[
        'pending' => 'Pending',
        'in_progress' => 'Proses',
        'completed' => 'Selesai',
        'cancelled' => 'Batal'
      ], null, ['class' => 'form-control select2']) }}
       @if ($errors->has('status')) <span class="help-block" style="color:red">{{ $errors->first('status') }}</span> @endif
    </div>
  </div>

  <div class="form-group row mt-2">
      <label class="col-sm-2 col-form-label">Catatan</label>
      <div class="col-sm-10">
         {{ Form::textarea('notes',null,['class'=>'form-control','rows'=>3,'placeholder'=>'Catatan tambahan (opsional)'])}}
         @if ($errors->has('notes')) <span class="help-block" style="color:red">{{ $errors->first('notes') }}</span> @endif
      </div>
  </div>

  </div>
  
  <div class="card-footer">
    <div class="form-group">
        <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-save"></i> Simpan</button>
        <a href="{{ route('jokis.index') }}" class="btn btn-danger btn-sm"><i class="fas fa-backward"></i> Kembali</a>
    </div>
  </div>


