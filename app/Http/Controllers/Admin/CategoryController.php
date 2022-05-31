<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\CategoryRequest;
use PhpParser\Node\Stmt\Catch_;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        
        if(request()->ajax()){
            $data =  Category::orderBy('id','desc')->paginate(10);
            return view('categories.table',compact('data'));
        }else{
            $data =  Category::orderBy('id','desc')->paginate(10);
            return view('categories.index',compact('data'));
        }
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try{
            $categories = Category::where('id','!=','parent_id')->get();
            return view('categories.create',compact('categories'));
        }catch(\Exception $e){
            return response()->json($e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
       
        try{
        
            if(isset($request->has_data) && $request->has_data != ''){
                $request->has_data = 1;
            }else{
                $request->has_data = 0; 
            }
            if(isset($request->exist) && $request->exist != ''){
                $request->exist = 1;
            }else{
                $request->exist = 0;
            }
           Category::create([
               'name'=>$request->name,
               'parent_id'=>$request->parent_id,
               'has_data'=>$request->has_data,
               'exist'=>$request->exist
           ]);
           return response()->json(['message' => 'تمت عملية الحفظ بنجاح!', 'icon' => 'success']);
        }catch(\Exception $e){
            return response()->json($e->getMessage(),500);
        }
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
        
        try{
            $cat = Category::findOrFail($id);
            $categories = Category::where('id','!=',$cat->id)->get();
            return view('categories.edit',compact('categories','cat'));
        }catch(\Exception $e){
            return response()->json($e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        try{
       
         
            $category = Category::findOrFail($id);
            if(isset($request->has_data) && $request->has_data != ''){
                $request->has_data = 1;
            }else{
                $request->has_data = 0; 
            }
            if(isset($request->exist) && $request->exist != ''){
                $request->exist = 1;
            }else{
                $request->exist = 0;
            }
         $category->update([
               'name'=>$request->name,
               'parent_id'=>$request->parent_id,
               'has_data'=>$request->has_data,
               'exist'=>$request->exist
           ]);
           return response()->json(['message' => 'تمت عملية التحديث بنجاح!', 'icon' => 'success']);
        }catch(\Exception $e){
            return response()->json($e->getMessage(),500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       try{
            $cat = Category::where('id',$id)->whereDoesntHave('children')->delete();
            if(!$cat){
                return response()->json(['message' => ' لا تستطيع الحذف', 'icon' => 'warning']);  
            }
            return response()->json(['message' => 'تمت عملية الحذف بنجاح!', 'icon' => 'warning']);
       }catch(\Exception $e){
           return response()->json($e->getMessage());
       }
    }

    public function updateStatus($id)
    {

        try {
            $category = Category::where('id', $id)->first();

            $status = $category->update(['exist' => !$category->exist]);
            return response()->json(['message' => 'تم تعديل الحالة', 'icon' => 'success']);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }
}
