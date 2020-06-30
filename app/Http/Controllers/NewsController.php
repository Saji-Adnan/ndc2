<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsRequest;
use App\Http\Requests\NewsEditRequest;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

         $categories=Category::orderBy('title')->get();
         $q=$request->get("q")??"";
         $published=$request->get("published");
         $category=$request->get("category");
        $news=News::whereRaw('true');
        if($q){
            $news->where('title','like',"%$q%");
        };
        if ($published!=null){
            $news->where('published',$published);
        }
        if ($category){
            $news->where('category_id',$category);
        }
        $news=$news->paginate(5)->appends([
            'q'=>$q,
            'published'=>$published,
            'category'=>$category
        ]);
        return view('control_panel/news/index')->with('news',$news)->with('categories',$categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {    $categotry =Category::all();
        return view('control_panel/news/create')->with('categotry',$categotry);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsRequest $request)
    {
        if (!$request->published){
            $request['published']=0;
        }
        $imageName = basename($request->imageFile->store("public"));
        $request['image'] = $imageName;
        News::create($request->all());
        \Session::flash('msg','s:The News Added Sucssesfully');
        return redirect(route('news.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $news= News::find($id);
        return view('control_panel/news/show')->with('news',$news);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news= News::find($id);
        return view('control_panel/news/edit')->with('news',$news);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NewsEditRequest $request, $id)
    {
        if (!$request->published){
            $request['published']=0;
        }
        if($request->imageFile){
            $imageName = basename($request->imageFile->store("public"));
            $request['image'] = $imageName;
        }

        News::find($id)->update($request->all());
        \Session::flash('msg','s:The News Updated Successfuly..');
        return redirect(route('news.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        News::find($id)->delete();
        \Session::flash('msg','e:The News Deleted Successfuly..');
        return redirect(route('news.index'));
    }
}
