<?php

namespace App\Http\Controllers;

use App\Category;
use App\Link;
use App\LinkCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = json_encode(Category::all());

        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;
        $category->save();

        return '/categories/'.$category->id;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $linkByCategory= LinkCategory::where('category_id', $id);
        $links = [];
        $category = Category::find($id);

        foreach ($linkByCategory->get() as $item) {
            array_push(
                $links,
                Link::find($item->link_id)
            );
        }

        return view('categories.detail', [
            'links' => json_encode($links),
            'category' => $category
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);

        return view('categories.edit', compact('category'));
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
        $category = Category::find($id);
        $category->name = $request->name;
        $category->description = $request->description;
        $category->save();

        return '/categories/'.$category->id;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $linkCategories = LinkCategory::where('category_id', $id)->get();
        $linkIds = [];

        foreach ($linkCategories as $linkCategory) {
            $linkCategory->delete();
            array_push($linkIds, $linkCategory->link_id);
        }

        $links = Link::whereIn('id', $linkIds)->get();
        foreach ($links as $link) {
            $link->delete();
        }

        $category = Category::find($id);
        $category->delete();

        return '/categories';
    }
}
