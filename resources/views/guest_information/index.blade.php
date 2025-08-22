@extends('app')
@section('title', 'Guest Information')
@section('content')
 <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Guest Information</h3>
                    <div align="right" class="mb-3">
                        <a href="{{ url('create/guestinformation') }}" class="btn btn-primary">Tambah</a>
                    </div>
                    <table class="table table-bordered">
                         <tr>
                                <th>No</th>
                                <th>Nama Tamu</th>
                                <th>Tanggal Check-in & Check-out</th>
                                <th>Nomor Kamar</th>
                                <th>Kontak Tamu</th>
                                <th>Actions</th>
                        </tr>
                      @foreach ( $datas as $index => $item )

                      <tr>
                          <td>{{$index += 1}}</td>
                          <td>{{$item->nama_tamu}}</td>
                          <td>{{$item->check_in.'-'.$item->check_out}}</td>
                          <td>{{$item->no_kamar}}</td>
                          <td>{{$item->email . ',' .  $item->no_tel}}</td>
                          <td>
                              <a href="{{route('guest.edit', $item->id)}}" class="btn btn-success">Edit</a>
                              <form action="" method="POST" onclick="return confirm('Yakin delete ?')" style="display: inline">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>

                        </tr>
                        @endforeach



@endsection
