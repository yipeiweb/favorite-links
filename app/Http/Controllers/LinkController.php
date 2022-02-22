<?php

namespace App\Http\Controllers;

use App\Category;
use App\Link;
use App\LinkCategory;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $links = Link::latest()->take(10)->get();
        $categories = Category::latest()->take(5)->get();

        return view('links.index', [
            'links' => json_encode($links),
            'categories' => json_encode($categories)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(int $id = null)
    {
        $categories = json_encode(Category::all());

        return view('links.create', [
            'categories' => $categories,
            'categorySelected' => json_encode([$id])
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $link = new Link();
        $link->name = $request->name;
        $link->description = $request->description;
        $link->url = $request->url;
        $link->save();

        $linkCategories = LinkCategory::where('link_id', $link->id)->get();

        foreach ($linkCategories as $linkCategory) {
            $linkCategory->delete();
        }

        $newCategories = $request->categories;
        if ($newCategories) {
            foreach ($newCategories as $newCategory) {
                $linkCategory = new LinkCategory();
                $linkCategory->category_id = $newCategory;
                $linkCategory->link_id = $link->id;
                $linkCategory->save();
            }
        }

        return $link->url;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $link = Link::find($id);
        $categories = json_encode(Category::all());
        $selectedCategories = LinkCategory::select('category_id')->where('link_id', $id)->get();
        $assembledSelectedCategories = [];

        foreach($selectedCategories as $key => $item) {
             array_push($assembledSelectedCategories, $item['category_id']);
        }

        return view('links.edit', [
            'link' => $link,
            'categories' => $categories,
            'selectedCategories' => json_encode($assembledSelectedCategories)
        ]);
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
        $link = Link::find($id);
        $link->name = $request->name;
        $link->description = $request->description;
        $link->url = $request->url;
        $link->save();

        $linkCategories = LinkCategory::where('link_id', $id)->get();

        foreach ($linkCategories as $linkCategory) {
            $linkCategory->delete();
        }

        $newCategories = $request->categories;
        if ($newCategories) {
            foreach ($newCategories as $newCategory) {
                $linkCategory = new LinkCategory();
                $linkCategory->category_id = $newCategory;
                $linkCategory->link_id = $id;
                $linkCategory->save();
            }
        }

        return $link->url;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $linkCategories = LinkCategory::where('link_id', $id)->get();

        if ($linkCategories) {
            foreach ($linkCategories as $linkCategory) {
                $linkCategory->delete();
            }
        }

        $link = Link::find($id);
        $link->delete();
    }
}
