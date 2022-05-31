@extends('layouts.admin')
@section('title')
الأقسام
@endsection
@section('content')



<section class="content">

    <div class="container-fluid">
        <br>
       
        <br>

        <div class="card">
        <div class="card-header" style="background-color:#007bff;">
                <h1 class="card-title" style="float: right; color:white;font-family:Roboto;font-size:30px;"> الأقسام
                </h1>
            </div>
            <br>
            <div class="container">
            <div class="row">
             
              
             <div class="col-sm-6 col-sm-offset-3">
                 <!-- Repeater Html Start -->
         
                 <div id="repeater">
                     <!-- Repeater Heading -->
                     <div class="repeater-heading col-md-3">

                         <input type="button" value="إضافة نص" name="add" class="btn btn-primary  pull-right repeater-add-btn" id="repeater-add-btn">
                        
                     </div>
                     <br>
                     <div class="clearfix"></div>
                     <!-- Repeater Items -->
                  
                     <div class="items" data-group="test" id="items">
                         <!-- Repeater Content -->
                  
                         <div class="item-content border border-primary container bold" >
                             <div class="form-group">
                                 <label for="text_name" class="col-lg-2 control-label">اسم النص</label>
                                 <div class="col-lg-10">
                                     <input type="text" class="form-control" id="text_name" placeholder="اسم النص" data-name="text_name">
                                 </div>
                             </div>
                             <div class="form-group input-group row">
                                 <label for="new_line" class="col-lg-2 control-label">سطر جديد</label>
                                 <div class="col-lg-10">
                                     <input type="checkbox" class="form-control" id="new_line" data-name="new_line" value="1">
                                 </div>
                             </div>
                             <div class="form-group input-group row">
                                 <label for="is_title" class="col-lg-2 control-label"> عنوان</label>
                                 <div class="col-lg-10">
                                     <input type="checkbox" class="form-control" id="is_title" data-name="is_title" value="1">
                                 </div>
                             </div>
                         </div>
                        
                 <!-- Repeater End -->
                
                        
                         <br>
                         <!-- Repeater Remove Btn -->
                         <div class="pull-right repeater-remove-btn">
                             <button class="btn btn-danger remove-btn">
                                 حذف
                             </button>
                         </div>
                    
                         <div class="clearfix"></div>
                         <br>
                     </div>
                     
                     </div>
               
            
             </div>
           
             <div class="col-sm-6 col-sm-offset-3">
                 <!-- Repeater Html Start -->
                 <div id="repeater_dropdown">
                     <!-- Repeater Heading -->
                     <div class="repeater-heading col-md-3">

                         <button class="btn btn-warning pull-right repeater-add_dropdown-btn">
                             إضافة قائمة منسدلة
                         </button>
                     </div>
                     <br>
                     <div class="clearfix"></div>
                     <!-- Repeater Items -->
                     <div class="drop" data-group="test">
                         <!-- Repeater Content -->
                         <div class="item-content border border-warning container bold">
                             <div class="form-group">
                                 <label for="dropdown_name" class="col-lg-2 control-label">اسم القائمة المنسدله</label>
                                 <div class="col-lg-10">
                                     <input type="text" class="form-control" id="dropdown_name" placeholder="اسم القائمة المنسدلة" data-name="dropdown_name">
                                 </div>
                             </div>

                            
                             <br>
                             <!-- Repeater Remove Btn -->
                             <div class="pull-right repeater-remove-btn">
                                 <button class="btn btn-danger remove-btn">
                                     حذف
                                 </button>
                             </div>
                             <div class="clearfix"></div>
                             <br>
                             <hr>
                             <div class="col-sm-6 col-sm-offset-3">
                                 <!-- Repeater Html Start -->
                                 <div id="repeater_elem">
                                     <!-- Repeater Heading -->
                                     <div class="repeater-heading col-md-3">

                                         <button class="btn btn-dark pull-right repeater-add_elem-btn">
                                             إضافة عنصر
                                         </button>
                                     </div>
                                     <br>
                                     <div class="clearfix"></div>
                                     <!-- Repeater Items -->
                                     <div class="elem" data-group="test">
                                         <!-- Repeater Content -->
                                         <div class="item-content border border-dark container bold">
                                             <div class="form-group">
                                                 <label for="element_name" class="col control-label">اسم العنصر</label>
                                                 <div class="col-lg-10">
                                                     <input type="text" class="form-control" id="element_name" placeholder="اسم العنصر" data-name="element_name">
                                                 </div>
                                             </div>

                                             <div class="form-group">
                                                 <label for="section" class="col control-label">نوع العنصر</label>
                                                 <select id="section" name="section" class="form-control">
                                                     <option value="0">اختر القسم</option>
                                                 
                                                 </select>
                                             </div>

                                             <br>

                                             <br>
                                             <!-- Repeater Remove Btn -->
                                             <div class="pull-right repeater-remove-btn">
                                                 <button class="btn btn-danger remove-btn">
                                                     حذف
                                                 </button>
                                             </div>
                                             <div class="clearfix"></div>
                                             <br>
                                         </div>

                                     </div>
                                     <!-- Repeater End -->
                                 </div>
                                 <br>
                             </div>
                             <br>
                         </div>

                     </div>
                     <!-- Repeater End -->


                 </div>

               
             </div>
             <div class="col-sm-6 col-sm-offset-3">
                     <!-- Repeater Html Start -->
                     <div id="repeater_input">
                         <!-- Repeater Heading -->
                         <div class="repeater-heading col-md-3">

                             <button class="btn btn-success  pull-right repeater-add_input-btn">
                                 إضافة حقل ادخال
                             </button>
                         </div>
                         <br>
                         <div class="clearfix"></div>
                         <!-- Repeater Items -->
                         <div class="inputs" data-group="test">
                             <!-- Repeater Content -->
                             <div class="item-content border border-success container bold">
                                 <div class="form-group">
                                     <label for="input_name" class="col-lg-2 control-label">اسم حقل الادخال</label>
                                     <div class="col-lg-10">
                                         <input type="text" class="form-control" id="input_name" placeholder="اسم حقل الادخال" data-name="input_name">
                                     </div>
                                 </div>
                                 <div class="form-group">
                                     <label for="input_type" class="col-lg-2 control-label"> نوع حقل الادخال</label>
                                     <div class="col-lg-10">
                                         <select name="input_type" id="input_type" class="form-control">
                                             <option value=""></option>
                                             <option value="text">نص</option>
                                             <option value="date">تاريخ</option>
                                         </select>

                                     </div>
                                 </div>
                                 <div class="form-group input-group row">
                                     <label for="new_line" class="col-lg-2 control-label">سطر جديد</label>
                                     <div class="col-lg-10">
                                         <input type="checkbox" class="form-control" id="new_line" data-skip-name="true" data-name="new_line">
                                     </div>
                                 </div>

                             </div>
                             <br>
                             <!-- Repeater Remove Btn -->
                             <div class="pull-right repeater-remove-btn">
                                 <button class="btn btn-danger remove-btn">
                                     حذف
                                 </button>
                             </div>
                             <div class="clearfix"></div>
                             <br>
                         </div>

                     </div>
                     <!-- Repeater End -->

              </div>
         </div>
            </div>
        </div>

        @endsection
        @section('js')
        <script src="./repeater.js" type="text/javascript"></script>
        <script>
            /* Create Repeater */
            $("#repeater").createRepeater({
                showFirstItemToDefault: true,
            });
           
        </script>

        @endsection