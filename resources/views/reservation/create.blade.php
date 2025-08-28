@extends('app')
@section('title','Tambah Reservasi Baru')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">{{$title ?? ''}}</h3>
                <form action="{{ route('reservation.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <label for="" class="form-label">No Revervasi</label>
                                <input type="text" class="form-control" name="reservation_number"
                                    placeholder="Masukkan No Revervasi" value="{{ $reservation_number ?? '' }}" readonly>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="" class="form-label">Nama Tamu*</label>
                                <input type="text" class="form-control" name="guest_name"
                                    placeholder="Masukkan Nama Tamu" required>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Telpon/Hp</label>
                                <input type="number" class="form-control" name="guest_phone"
                                    placeholder="Masukkan No Telp/HP">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Kategori Kamar*</label>
                                <select name="category_id" id="category_id" class="form-control">
                                    <option value="">Pilih Kategori Kamar</option>
                                    @foreach ($categories as $category )
                                    <option value="{{ $category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">No Kamar*</label>
                                <select name="guest_room_number" id="category_id" class="form-control">
                                    <option value="">Pilih Kategori Kamar</option>
                                    @foreach ($categories as $category )
                                    <option value="{{ $category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Check In*</label>
                               <input type="date" id="checkin" name="guest_check_in" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Metode Kamar*</label>
                                <select name="payment_method" id="" class="form-control">
                                    <option value="cc">Credit Card</option>
                                    <option value="cash">Cash</option>
                                    <option value="bank">Bank Transfer</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="" class="form-label">Email</label>
                                <input type="email" class="form-control" name="guest_email"
                                    placeholder="Masukkan Email">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Jumlah Tamu</label>
                                <select name="guest_qty" id='' class="form-control">
                                    <option value="1">1 Tamu</option>
                                    <option value="2">2 Tamu</option>
                                    <option value="3">3 Tamu</option>
                                    <option value="4">4 Tamu</option>
                                    <option value="5">5 Tamu</option>
                                    <option value="6">6 Tamu</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Nama Kamar</label>
                                <select name="category_id" id="room_id" class="form-control">
                                    <option value="">Pilih Kamar</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Spesial Request / Note*</label>
                                <textarea name="guest_note" id="" class="form-control"></textarea>
                            </div>
                             <div class="mb-3">
                                <label for="" class="form-label">Check Out*</label>
                               <input type="date" id="checkout" name="guest_check_out" class="form-control">
                            </div>
                            <div class="card bg-light">
                                <div class="card-body">
                                    <h6 class="card-title">Rangkuman Pembayaran</h6>
                                    <div class="d-flex justify-content-between">
                                        <span>Harga Kamar (Per malam)</span>
                                        <span id="roomRate">Rp.0</span>
                                        <input type="hidden" id="roomRateVal">
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <span>Berapa Malam</span>
                                        <span id="totalNight">Rp.0</span>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <span>Sub Total</span>
                                        <span id="subtotal">Rp.0</span>
                                        <input type="hidden" id="subTotalVal">
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <span>Tax (10%)</span>
                                        <span id="tax">Rp.0</span>
                                        <input type="hidden" id="taxVal">
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <span>Grand Total</span>
                                        <span id="totalAmount">Rp.0</span>
                                        <input type="hidden" id="totalAmountVal">

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    {{-- <div class="mb-3">
                        <label for="" class="form-label">Gambar *</label>
                        <input type="file" name="image_cover" required>
                    </div> --}}
                    <div class="mb-3">
                        <button class="btn btn-primary" id="save" type="button">Simpan</button>
                        <a href="{{ url()->previous() }}" class="text-muted">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="successModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content text-center">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h4 class="mb-3">Reservasi Berhasil!!</h4>
        <p class="text-muted mb-4">
            Nomor Reservasi : <strong id="reservationNumber">#</strong>
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">
            <i class="bi bi-print"></i> Print Confirmation
        </button>
      </div>
    </div>
  </div>
</div>
@endsection
