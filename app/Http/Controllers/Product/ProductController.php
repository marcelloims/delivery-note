<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $data['products'] = Product::select('id', 'name', 'type', 'price')->get();
        return view('product', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required',
            'type'  => 'required',
            'price' => 'required',
        ], [
            'name.required'     => 'Nama tidak boleh kosong!',
            'type.required'     => 'Jenis tidak boleh kosong!',
            'price.required'    => 'Harga tidak boleh kosong!'
        ]);

        $data = array_merge([
            'name'          => $request->name,
            'type'          => $request->type,
            'price'         => $request->price,
        ], $this->auditTableInsert());

        Product::insert($data);

        return redirect('/product')->with(['success' => 'Data berhasil disimpan!']);
    }

    public function edit($id)
    {
        $data['type'] = ['Fresh', 'Frozen'];
        $data['product'] = Product::where('id', $id)
            ->select('id', 'name', 'type', 'price')->first();
        return view('product_edit', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'  => 'required',
            'type'  => 'required',
            'price' => 'required',
        ], [
            'name.required'     => 'Nama tidak boleh kosong!',
            'type.required'     => 'Jenis tidak boleh kosong!',
            'price.required'    => 'Harga tidak boleh kosong!'
        ]);

        $data = array_merge([
            'name'          => $request->name,
            'type'          => $request->type,
            'price'         => $request->price,
        ], $this->auditTableUpdate());

        Product::where('id', $id)->update($data);

        return redirect('/product')->with(['success' => 'Data berhasil diupdate!']);
    }

    public function destroy($id)
    {
        Product::where('id', $id)->delete();
        return redirect('/product')->with(['success' => 'Data berhasil dihapus!']);
    }
}
