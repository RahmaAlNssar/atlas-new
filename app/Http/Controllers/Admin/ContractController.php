<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contract;
use App\Models\Category;
use App\Http\Requests\ContractRequest;
use App\Models\Section;
use Illuminate\Support\Facades\DB;

class ContractController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax()){
            $data =  Contract::paginate(10);
          
            return view('contracts.table',compact('data'));
        }else{
            $data =  Contract::paginate(10);
           
            return view('contracts.index',compact('data'));
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
            $categories = Category::all();
            return view('contracts.create',compact('categories'));
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
    public function store(ContractRequest $request)
    {
        try{
        
            if(isset($request->exist) && $request->exist != ''){
                $request->exist = 1;
            }else{
                $request->exist = 0;
            }
           Contract::create([
               'name'=>$request->name,
               'cat_id'=>$request->parent_id,
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
    public function edit()
    {
        try{
            
            $contract = Contract::where('id',request()->id)->first();
           
            if(request()->ajax()){
                $data = DB::table('sections')
                ->select('sections.*')
                ->join('contruct_section', 'contruct_section.section_id', '=', 'sections.id')
                ->where('contruct_section.contruct_id', $contract->id)
                ->get();
                
           
                return view('sections.table',compact('data','contract'));
            }else{
                $data = DB::table('sections')
                ->select('sections.*')
                ->join('contruct_section', 'contruct_section.section_id', '=', 'sections.id')
                ->where('contruct_section.contruct_id', $contract->id)
                ->get();
                
                return view('sections.index',compact('data','contract'));
            }
           
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
    public function update(Request $request, $id)
    {
        try{
       
            $contract = Contract::findOrFail($id);
            if(isset($request->exist) && $request->exist != ''){
                $request->exist = 1;
            }else{
                $request->exist = 0;
            }
         $contract->update([
               'name'=>$request->name,
               'cat_id'=>$request->parent_id,
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
             Contract::where('id',$id)->delete();
           
            return response()->json(['message' => 'تمت عملية الحذف بنجاح!', 'icon' => 'warning']);
       }catch(\Exception $e){
           return response()->json($e->getMessage());
       }
    }

    public function updateStatus($id)
    {

        try {
            $contract = Contract::where('id', $id)->first();

            $status = $contract->update(['exist' => !$contract->exist]);
            return response()->json(['message' => 'تم تعديل الحالة', 'icon' => 'success']);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }
}
