@extends('template.template')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Product</h1>
                </div>
                <div class="col-sm-6">
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="card">
            <form action="{{ url('product/update/' . $product->id, []) }}" method="post">
                <div class="card-body">
                    @csrf
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                            placeholder="Nama" value="{{ $product->name }}">
                    </div>

                    @error('type')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="form-group">
                        <label for="">Jenis</label>
                        <select name="type" id="" class="form-control @error('type') is-invalid @enderror">
                            @foreach ($type as $item)
                                @if ($item == $product->type)
                                    <option value="{{ $item }}" selected>{{ $item }}</option>
                                @else
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    @error('price')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="form-group">
                        <label for="">Harga / Kg (Rp.)</label>
                        <input type="number" name="price" class="form-control @error('price') is-invalid @enderror"
                            placeholder="Harga" value="{{ $product->price }}">
                    </div>
                </div>
                <div class="card-footer float-right">
                    <a href="{{ url('product', []) }}" class="btn btn-secondary">Tutup</a>
                    <button type="submmit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </section>
@endsection
