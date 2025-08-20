@extends('app')
@section('title','Ubah Pengguna')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">{{$title ?? ''}}</h3>
                <form action="{{ route('user.update', $edit->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="" class="form-label">Nama *</label>
                        <input type="text" class="form-control" name="name" placeholder="Masukkan Nama"  value="{{$edit->name??''}}"required>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Email *</label>
                        <input type="email" class="form-control" name="email" placeholder="Masukkan Email" value="{{$edit->email??''}}"required>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Password *</label>
                        <input type="password" class="form-control" name="password" placeholder="Masukkan Password">
                        <small class="text-danger">* Jika ingin diubah silahkan isi Password</small>
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary">Simpan</button>
                        <a href="{{ url()->previous() }}" class="text-muted">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
