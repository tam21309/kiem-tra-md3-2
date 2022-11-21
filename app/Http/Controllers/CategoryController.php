<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $count = 1;
        $items = Category::paginate(3);
        foreach ($items as $key => $item) {
            $count += $item->so_tien;
         
        }
        $params = [
            'count' => $count,
            'items' => $items
        ];

        return view ('index',$params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $validated = $request->validate([
        //     'name' => 'required|unique:categories|max:255',
        //     'desc' => 'required',
        // ],[
        //     'required'=>'Trường Bắt Buộc',
        // ]);
        $objCategory = new Category();
        $objCategory->name = $request->name;
        // $objCategory->description = $request->desc;
        $objCategory->ngay = $request->ngay;
        $objCategory->so_tien = $request->so_tien;
        
        // echo '<pre>';
        // print_r($_REQUEST);
        // die();
        $objCategory->save();
        // Session::flash('success', 'Sửa thành công');
        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = DB::table('categories')->find($id);
        return view('edit',compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'ngay' => 'required',
            'so_tien' => 'required',
        ],[
            'required'=>'Trường Bắt Buộc',
        ]);
        $objCategory = Category::find($id);
        $objCategory->name = $request->name;
        // $objCategory->description = $request->desc;
        $objCategory->ngay = $request->ngay;
        $objCategory->so_tien = $request->so_tien;
        
        $objCategory->save();
        Session::flash('success', 'Cập nhật thành công');
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category  = Category::find($id);
        $category->delete();
        return redirect()->route('categories.index');
    }
}
