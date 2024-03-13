<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\khuvucfpt;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class khuvucfptController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = khuvucfpt::orderBy('id','desc')->paginate(15);
        return view('admin.khuvuc.index', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function create() 
    {
        return view('admin.khuvuc.add');
    }
    public function store(Request $request)
    {
        $request->validate([
            'ten_khu_vuc' => "required|string|max:255"
        ]);

        $data = new khuvucfpt();

        $data->ten_khu_vuc = $request->ten_khu_vuc;
        $data->slug = Str::slug($request->ten_khu_vuc, '-');

        $data->save();
        return redirect()->route('regions.index')->with('success', 'Thêm thành công');

    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, string $id)
    {
        //
        $data = khuvucfpt::find($id);

        return view('admin.khuvuc.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'ten_khu_vuc' => "required|string|max:255",
        ]);

        $data = khuvucfpt::find($id);
        
        $data->ten_khu_vuc = $request->ten_khu_vuc;
        $data->slug = Str::slug($request->ten_khu_vuc, '-');

        $data->update();

        return redirect()->route('regions.index')->with('success', 'Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        $data = khuvucfpt::where('id', $id)->forceDelete();
        return redirect()->route('regions.index')->with('success', 'Xóa thành công'); 
    }
}
