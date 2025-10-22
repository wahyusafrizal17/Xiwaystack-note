<div class="card-body">

    <div class="form-group row mt-2">
        <label class="col-sm-2 col-form-label">Nama Pengeluaran</label>
        <div class="col-sm-10">
            {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nama pengeluaran'])}}
            @if ($errors->has('name')) <span class="help-block" style="color:red">{{ $errors->first('name') }}</span> @endif
        </div>
    </div>

    <div class="form-group row mt-2">
        <label class="col-sm-2 col-form-label">Kategori</label>
        <div class="col-sm-10">
            {{ Form::select('category', [
                'domain' => 'Domain',
                'hosting' => 'Hosting',
                'tools' => 'Tools/Software',
                'marketing' => 'Marketing',
                'transport' => 'Transport',
                'other' => 'Lainnya'
            ], null, ['class' => 'form-control select2', 'placeholder' => 'Pilih Kategori']) }}
            @if ($errors->has('category')) <span class="help-block" style="color:red">{{ $errors->first('category') }}</span> @endif
        </div>
    </div>

    <div class="form-group row mt-2">
        <label class="col-sm-2 col-form-label">Jumlah</label>
        <div class="col-sm-10">
            {{ Form::number('amount', null, ['class' => 'form-control', 'placeholder' => 'Jumlah pengeluaran', 'min' => 0])}}
            @if ($errors->has('amount')) <span class="help-block" style="color:red">{{ $errors->first('amount') }}</span> @endif
        </div>
    </div>

    <div class="form-group row mt-2">
        <label class="col-sm-2 col-form-label">Tanggal</label>
        <div class="col-sm-10">
            {{ Form::date('expense_date', null, ['class' => 'form-control'])}}
            @if ($errors->has('expense_date')) <span class="help-block" style="color:red">{{ $errors->first('expense_date') }}</span> @endif
        </div>
    </div>

    <div class="form-group row mt-2">
        <label class="col-sm-2 col-form-label">Deskripsi</label>
        <div class="col-sm-10">
            {{ Form::textarea('description', null, ['class' => 'form-control', 'rows' => 3, 'placeholder' => 'Deskripsi pengeluaran (opsional)'])}}
            @if ($errors->has('description')) <span class="help-block" style="color:red">{{ $errors->first('description') }}</span> @endif
        </div>
    </div>

</div>

<div class="card-footer">
    <div class="form-group">
        <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-save"></i> Simpan</button>
        <a href="{{ route('expenses.index') }}" class="btn btn-danger btn-sm"><i class="fas fa-backward"></i> Kembali</a>
    </div>
</div>
