@extends('template.template')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Produk</h1>
                </div>
                <div class="col-sm-6">
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-plus"> Data Produk</i>
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" data-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <form action="{{ url('product/add', []) }}" method="post">
                @csrf
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Formulir tambah</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <div class="form-group">
                                <label for="">Nama</label>
                                <input type="text" name="name"
                                    class="form-control @error('name') is-invalid @enderror" placeholder="Nama">
                            </div>

                            @error('type')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <div class="form-group">
                                <label for="">Jenis</label>
                                <select name="type" id=""
                                    class="form-control @error('type') is-invalid @enderror">
                                    <option disabled selected>--Silahkan Pilih--</option>
                                    <option value="Fresh">Fresh</option>
                                    <option value="Frozen">Frozen</option>
                                </select>
                            </div>

                            @error('price')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <div class="form-group">
                                <label for="">Harga / Kg (Rp.)</label>
                                <input type="number" name="price"
                                    class="form-control @error('price') is-invalid @enderror" placeholder="Harga">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submmit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data Produk</h3>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr class="text-center">
                            <th>No</th>
                            <th>Nama</th>
                            <th>Jenis</th>
                            <th>Harga (Kg)</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $product->name }}</td>
                                <td class="text-center">{{ $product->type }}</td>
                                <td class="text-right">Rp. {{ number_format($product->price, 0, ',', '.') }}</td>
                                <td class="text-center">
                                    <a href="{{ url('product/edit/' . $product->id, []) }}"
                                        class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                                    <a href="{{ url('product/delete/' . $product->id, []) }}"
                                        class="btn btn-sm btn-danger tombol-hapus"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                Ini adalah data Produk yang kamu punya!
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
    <script src="<?= asset('assets/plugins/jquery/jquery.min.js') ?>"></script>
    <script>
        $('.tombol-hapus').on('click', function(e) {
            e.preventDefault();
            const hapus = $(this).attr('href')
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Data Toping akan di HAPUS!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus Data Toping!',
                cancelButtonText: 'Tidak, batalkan'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.location.href = hapus
                }
            })
        })
    </script>
@endsection
