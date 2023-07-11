<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Category;
use Illuminate\Support\Str;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $category=Category::all();
        return view('admin.category.index',compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
       $request->validate([
            'category_name' => 'required|unique:categories|max:255',
         
        ]);

        // ************* save method ***************
          $category=new Category;

          $category->category_name=$request->category_name;

        //   $category->category_slug = Str::of($request->category_name)->slug('-');

          $category->save();


  // ************* insert  method ***************

        // Category::insert([
        //  'category_name'=> $request->category_name,
        //  'category_slug'=>Str::of($request->category_name)->slug('-')
          

        // ]);


          return redirect()->back();

     

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
        //
        // ******* first method *******
        // $data=Category::where('id',$id)->first();


        $data=Category::find($id);
        return view('admin.category.edit',compact('data'));
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
        //
            $category=Category::find($id);
            $category->update([
                'category_name'=>$request->category_name,
                 //  'category_slug'=>Str::of($request->category_name)->slug('-')
            ]);


            // ******* save method ********
            // $category->category_name=$request->category_name;
            // $category->category_slug=Str::of($request->category_name)->slug('-');
            // $category->save();
            
            return redirect()->route('category.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    //    ********* Find method *********
    //     $category=Category::find($id);
    //     $category->delete();
        
        Category::destroy($id);

        return redirect()->back();
        
    }
}