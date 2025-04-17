<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $data['customers'] = Customer::select('id', 'name', 'telephone', 'address', 'gender')->get();
        return view('customer', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'          => 'required',
            'telephone'     => 'required',
            'address'       => 'required',
            'gender'        => 'required'
        ], [
            'name.required'         => 'Nama tidak boleh kosong!',
            'telephone.required'    => 'Telepon tidak boleh kosong!',
            'address.required'      => 'Address tidak boleh kosong!',
            'gender.required'       => 'Jenis Kelamin tidak boleh kosong!',
        ]);

        $data = array_merge([
            'name'          => $request->name,
            'telephone'     => $request->telephone,
            'address'       => $request->address,
            'gender'        => $request->gender,
        ], $this->auditTableInsert());

        Customer::insert($data);

        return redirect('/customer')->with(['success' => 'Data berhasil disimpan!']);
    }

    public function edit($id)
    {
        $data['gender'] = ['Ibu' => 0, 'Bapak' => 1];
        $data['customer'] = Customer::where('id', $id)
            ->select('id', 'name', 'telephone', 'address', 'gender')->first();
        return view('customer_edit', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'          => 'required',
            'telephone'     => 'required',
            'address'       => 'required',
            'gender'        => 'required'
        ], [
            'name.required'         => 'Nama tidak boleh kosong!',
            'telephone.required'    => 'Telepon tidak boleh kosong!',
            'address.required'      => 'Address tidak boleh kosong!',
            'gender.required'       => 'Jenis Kelamin tidak boleh kosong!',
        ]);

        $data = array_merge([
            'name'          => $request->name,
            'telephone'     => $request->telephone,
            'address'       => $request->address,
            'gender'        => $request->gender,
        ], $this->auditTableInsert());

        Customer::where('id', $id)->update($data);

        return redirect('/customer')->with(['success' => 'Data berhasil diupdate!']);
    }

    public function destroy($id)
    {
        Customer::where('id', $id)->delete();
        return redirect('/customer')->with(['success' => 'Data berhasil dihapus!']);
    }
}
