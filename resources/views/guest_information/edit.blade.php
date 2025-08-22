@extends('app')
@section('title','Tambah Tamu')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div>
                    @foreach ($errors->all() as $i )
                    <ul style="background-color: red ">
                        <li>{{$i}}</li>
                    </ul>
                    @endforeach
                </div>
                <h3 class="card-title">{{$title ?? ''}}</h3>
                <form action="{{ route('guest.update', $guest->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="" class="form-label">Nama Tamu *</label>
                        <input type="text" class="form-control" name="nama_tamu" placeholder="Nama Tamu" value="{{ $guest->nama_tamu  }}">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Check-In *</label>
                        <input type="date" class="form-control" name="check_in" placeholder="Chech-In"  value="{{ $guest->check_in}}">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Check-Out *</label>
                        <input type="date" class="form-control" name="check_out" placeholder="Check-Out" value="{{ $guest->check_out}}">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">No Kamar *</label>
                        <select name="no_kamar" id="" class="form-select">
                            <option value="">--Pilih No--</option>
                            <option value="A01">A01</option>
                            <option value="A02">A02</option>
                            <option value="A03">A03</option>
                            <option value="A04">A04</option>
                    value="{{ $guest->no_kamar  }}"    </select>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Email *</label>
                        <input type="email" class="form-control" name="email" placeholder="Masukkan Email" value="{{ $guest->email  }}">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">No Telepon *</label>
                        <input type="number" class="form-control" name="no_tel" placeholder="Masukkan No Telepon" value="{{ $guest->no_tel  }}">
                    </div>
                    {{-- @dd($categories) sama kaya fungsi vardump --}}
                    <div class="mb-3">
                        <label for="" class="form-label">Status Tamu *</label>
                        <select type="text" class="form-control" name="status_tamu" placeholder="Status Tamu" value="{{ $guest->status_tamu  }}">
                            <option value="">--Pilih No--</option>
                         @foreach ( $categories as $category )
                             <option value="{{ $category->name }}">{{ $category->name }}</option>
                         @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Alamat *</label>
                        <textarea  class="form-control" rows="10" cols="30" name="alamat" placeholder="Masukkan Alamat" value="{{ $guest->alamat }}"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Kebutuhan Khusus *</label>
                        <input type="radio" name="statusnya" id="ada" onclick="toggleinput(true)">Ada
                        <input type="radio" name="statusnya" id="tidak" onclick="toggleinput(false)">Tidak Ada
                        <input type="text" class="form-control" style="display:none" name="kebutuhan_khusus" id="kebutuhan_khusus" value="{{ $guest->kebutuhan_khusus }}">
                    </div>
                    <script>
                        function toggleinput(show){
                            const kebutuhan_khusus = document.querySelector("#kebutuhan_khusus");
                            kebutuhan_khusus.style.display = show ? 'block' : 'none';
                        }
                    </script>
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
