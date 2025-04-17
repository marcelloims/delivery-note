@extends('template.template')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Pelanggan</h1>
                </div>
                <div class="col-sm-6">
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="card">
            <form action="{{ url('customer/update/' . $customer->id, []) }}" method="post">
                <div class="card-body">
                    @csrf
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                            placeholder="Nama" value="{{ $customer->name }}">
                    </div>
                    @error('telephone')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="form-group">
                        <label for="">Telepon</label>
                        <input type="text" name="telephone" class="form-control @error('telephone') is-invalid @enderror"
                            placeholder="Telepon" value="{{ $customer->telephone }}">
                    </div>
                    @error('address')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="form-group">
                        <label for="">Alamat</label>
                        <input type="text" name="address" class="form-control @error('address') is-invalid @enderror"
                            placeholder="Alamat" value="{{ $customer->address }}">
                    </div>
                    @error('gender')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="form-group">
                        <label for="">Jenis Kelamin</label>
                        <select name="gender" id="" value="{{ $customer->name }}"
                            class="form-control @error('gender') is-invalid @enderror">
                            @foreach ($gender as $item => $value)
                                @if ($value == $customer->gender)
                                    <option selected value="{{ $value }}">{{ $item }}</option>
                                @else
                                    <option value="{{ $value }}">{{ $item }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="card-footer float-right">
                    <a href="{{ url('customer', []) }}" class="btn btn-secondary">Tutup</a>
                    <button type="submmit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </section>
@endsection
