<?php

namespace App\Http\Controllers\Coordinator;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Type;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $types = Type::all();
        return view('1stRoleBlades.listAttribute',compact('categories','types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->cname != null){
            Category::create([
                'name' => $request->cname,
            ]);
        }

        if ($request->tname != null){
            Type::create([
                'name' => $request->tname,
            ]);
        }

        return empty($category) ? redirect()->back()->with('Fail', "Failed to store")
            : redirect()->back()->with('Success', 'Success type category: store');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return empty($category) ? redirect()->back()->with('Fail', "Failed to destroy")
            : redirect()->back()->with('Success', 'Success destroy category: #('.$category->name.') destroy');
    }

    public function tdestroy($id)
    {
        $type = Type::findOrFail($id);
        $type->delete();

        return empty($type) ? redirect()->back()->with('Fail', "Failed to destroy")
            : redirect()->back()->with('Success', 'Success destroy type: #('.$type->name.') destroy');
    }
}
