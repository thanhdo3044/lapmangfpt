<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\khuvucfpt;
use App\Models\thanhpho;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class thanhphoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = thanhpho::with('khuvucfpt')->orderBy('id', 'desc')->paginate(15);

        return view('admin.tinhthanh.index', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function create()
    {
        $data = khuvucfpt::all();

        return view('admin.tinhthanh.add', compact('data'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'ten_thanh_pho' => 'required',
            'slug' => 'required',
            'id_khu_vuc' => 'require'
        ]);

        $data = new thanhpho();

        $data->ten_thanh_pho = $request->ten_thanh_pho;
        $data->slug = Str::slug($request->ten_thanh_pho);
        $data->ten_thanh_pho = $request->ten_thanh_pho;

        $data->save();

        return redirect()->route('city.index')->with('success', 'Thêm thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = thanhpho::find($id);
        return view('admin.tinhthanh.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'ten_thanh_pho' => 'required',
            'slug' => 'required',
            'id_khu_vuc' => 'require'
        ]);

        $data = thanhpho::find($id);
        $data->ten_thanh_pho = $request->ten_thanh_pho;
        $data->slug = Str::slug($request->ten_thanh_pho);
        $data->ten_thanh_pho = $request->ten_thanh_pho;

        $data->update();

        return redirect()->route('city.index')->with('success', 'Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = thanhpho::where('id', $id)->forceDelete();

        return redirect()->route('city.index')->with('success', 'Xóa thành công');
    }
}
