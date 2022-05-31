<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contract;
use Illuminate\Http\Request;
use App\Models\Section;
use App\Models\SectionContent;
use App\Models\DropdownContent;
use App\Models\ConstractSections;
use Illuminate\Support\Facades\DB;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // if(request()->ajax()){

        //     $contract = DB::table('contruct_section')->where('id',$id)->first();

        //     $data =   $contract->sections;
        //     dd($data);
        //     return view('sections.table',compact('data'));
        // }else{

        //     $contract = DB::table('contruct_section')->where('id',$id)->first();
        //     $data =    $contract->sections;
        //     return view('sections.index',compact('data'));
        // }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($contruct_id)
    {
        try {
            $sections = Section::all();

            $contract = DB::table('contruct_section')->where('contruct_id', $contruct_id)->first();

            return view('sections.create', compact('sections', 'contract'));
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            // dd($request->all());
            $section = Section::create(['name' => $request->name]);

            ConstractSections::create([
                'contruct_id' => $request->countact_id,
                'section_id' => $section->id
            ]);
            $data = [];
            $data_elem = [];
            $drop = [];
            if (isset($request->name_input) && $request->name_input != '') {
                for ($i = 0; $i < count($request['name_input']); $i++) {
                    $new_line = 0;
                    if (isset($request->new_line[$i]) && $request->new_line[$i] != null) {
                        $new_line = 1;
                    }

                    $is_title =  0;
                    if (isset($request->is_title[$i]) && $request->is_title[$i] != null) {
                        $is_title = 1;
                    }
                    $data[] =
                        array(
                            'name' => $request->name_input[$i],
                            'type' => 'text',
                            'new_line' => $new_line,
                            'is_title' => $is_title,
                            'section_id' => $section->id,
                        );
                }
            }
            if (isset($request->name_input_input) && $request->name_input_input != '') {

                for ($i = 0; $i < count($request['name_input_input']); $i++) {
                    $new_line = 0;
                    if (isset($request->new_line[$i]) && $request->new_line[$i] != null) {
                        $new_line = 1;
                    }
                    $data[] =
                        array(
                            'name' => $request->name_input_input[$i],
                            'type' => $request->type_input_name,
                            'new_line' => $new_line,
                            'is_title' => 0,
                            'section_id' => $section->id,
                        );
                }
            }


            if (isset($request->dropdown_name) && $request->dropdown_name != '') {

                for ($i = 0; $i < count($request['dropdown_name']); $i++) {

                    $drop[] =
                        array(
                            'name' => $request->dropdown_name[$i],
                            'type' => 'dropdown',
                            'new_line' => 0,
                            'is_title' => 0,
                            'section_id' => $section->id,
                        );
                    foreach ($drop as $d) {
                        $id = SectionContent::insertGetId($d);
                    }

                    if (isset($request->element_name) && $request->element_name != '') {
                        for ($j = 0; $j < count($request['element_name']); $j++) {

                            $data_elem[] =
                                array(
                                    'name' => $request->element_name[$j],
                                    'dropdown_id' => $id,
                                    'section_id' => $request->section[$j],
                                );
                        }
                    }
                }
            }


            SectionContent::insert($data); // Eloquent

            DropdownContent::insert($data_elem);


            return response()->json(['message' => 'تمت عملية الحفظ بنجاح!', 'icon' => 'success']);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 500);
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
        try {

            $section = Section::findOrFail($id);

            $contract = DB::table('contruct_section')->where('section_id', $id)->first();

            $sections = Section::all();


            $s_c = [];
            $s_c = $section->SectionContent;

            if ($s_c->count() == 0) {
                return view('sections.edit-section', compact('section', 'contract', 'sections'));
            }
            $SectionContent = SectionContent::where('section_id', $id)->get();


            foreach ($SectionContent as $s) {

                $drops = DropdownContent::where('dropdown_id', $s->id)->get();

                return view('sections.edit', [

                    'section' => $section,
                    'sections' => $sections,
                    'drops' => $drops,
                    'contract' => $contract

                ]);
            }
        } catch (\Exception $e) {
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
        try {

            $section = Section::findOrFail($id);

            $section_update = $section->update(['name' => $request->name]);
            // if($section_update){
            //     return response()->json(['message' => 'تمت عملية الحفظ بنجاح!', 'icon' => 'success']);
            // }



            $data = [];
            $data_elem = [];
            $drop = [];

            if (isset($request->name_input) && $request->name_input != '') {
                for ($i = 0; $i < count($request['name_input']); $i++) {
                    $new_line = 0;
                    if (isset($request->new_line[$i]) && $request->new_line[$i] != null) {
                        $new_line = 1;
                    }

                    $is_title = 0;
                    if (isset($request->is_title[$i]) && $request->is_title[$i] != null) {
                        $is_title = 1;
                    }
                    $data[] =
                        array(
                            'name' => $request->name_input[$i],
                            'type' => 'text',
                            'new_line' => $new_line,
                            'is_title' => $is_title,
                            'section_id' => $id,
                        );
                }
            }
            if (isset($request->name_input_input) && ($request->name_input_input != '')) {

                for ($i = 0; $i < count($request['name_input_input']); $i++) {
                    $new_line = 0;
                    if (isset($request->new_line[$i]) && $request->new_line[$i] != null) {
                        $new_line = 1;
                    }
                    $data[] =
                        array(
                            'name' => $request->name_input_input[$i],
                            'type' => $request->type_input_name,
                            'new_line' => $new_line,
                            'is_title' => 0,
                            'section_id' => $id,
                        );
                }
            }


            if (isset($request->dropdown_name_input) && ($request->dropdown_name_input != '')) {

                for ($i = 0; $i < count($request['dropdown_name_input']); $i++) {

                    $data[] =
                        array(
                            // 'id'=>$request->dropdon_id[$i],    
                            'name' => $request->dropdown_name_input[$i],
                            'type' => 'dropdown',
                            'new_line' => 0,
                            'is_title' => 0,
                        );
                       
                    if(count($data) > 1){
                       
                    if (isset($request->element_name) && $request->element_name != '') {
                        foreach ($data as $d) {
                           

                            // dd($updatedOrInsertedRecord[$k]);

                            for ($j = 0; $j < count($request['element_name']); $j++) {

                                $data_elem[] =
                                    array(
                                        'name' => $request->element_name[$j],
                                        'dropdown_id' => $d[$j]['id'],
                                        'section_id' => $request->section[$j]
                                    );
                            }
                        }
                    }
                }elseif(count($data) == 1){
                 
                    for ($j = 0; $j < count($request['element_name']); $j++) {

                        $data_elem[] =
                            array(
                                'name' => $request->element_name[$j],
                                'dropdown_id' =>$request->dropdon_id[$j],
                                'section_id' => $request->section[$j]
                            );
                   
                    }
                }
                }
            }


            $section->SectionContent()->updateOrCreate($data); // Eloquent

            DropdownContent::updateOrCreate($data_elem);

            return response()->json(['message' => 'تمت عملية الحفظ بنجاح!', 'icon' => 'success']);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 500);
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
        try {

            $section = Section::findOrFail($id);

            $section->SectionContent()->delete();
            return response()->json(['message' => 'تمت عملية الحذف بنجاح!', 'icon' => 'error']);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }
}
