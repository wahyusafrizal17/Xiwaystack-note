<div class="card-body">

    <div class="form-group row mt-2">
      <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
      <div class="col-sm-10">
         {{ Form::text('name',null,['class'=>'form-control','placeholder'=>'Name'])}}
         @if ($errors->has('name')) <span class="help-block" style="color:red">{{ $errors->first('name') }}</span> @endif
      </div>
  </div>
  
  <div class="form-group row mt-2">
      <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
      <div class="col-sm-10">
         {{ Form::text('email',null,['class'=>'form-control','placeholder'=>'Email'])}}
         @if ($errors->has('email')) <span class="help-block" style="color:red">{{ $errors->first('email') }}</span> @endif
      </div>
  </div>
  
  <div class="form-group row mt-2">
      <label for="inputEmail3" class="col-sm-2 col-form-label">Password</label>
      <div class="col-sm-10">
         {{ Form::password('password',['class'=>'form-control','placeholder'=>'Password'])}}
         @if ($errors->has('password')) <span class="help-block" style="color:red">{{ $errors->first('password') }}</span> @endif
      </div>
  </div>

  <div class="form-group row mt-2">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Foto</label>
        <div class="col-sm-10">
        {{ Form::file('foto',['class'=>'form-control','placeholder'=>'Email'])}}
        @if ($errors->has('foto')) <span class="help-block" style="color:red">{{ $errors->first('foto') }}</span> @endif
        </div>
    </div>
  
  <div class="form-group row mt-2">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Role</label>
    <div class="col-sm-10">
      {{ Form::select('level',['Admin' => 'Admin' , 'Pengguna' => 'Pengguna'], null, ['class' => 'form-control select2']) }}
       @if ($errors->has('level')) <span class="help-block" style="color:red">{{ $errors->first('level') }}</span> @endif
    </div>
  </div>
  
  
  </div>
  
  <div class="card-footer">
    <div class="form-group">
        <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-save"></i> Simpan</button>
            
        <a href="{{ route('users.index') }}" class="btn btn-danger btn-sm"><i class="fas fa-backward"></i> Kembali</a>
    </div>
  </div>