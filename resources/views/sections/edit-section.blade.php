@extends('layouts.admin')
@section('title')
الأقسام
@endsection
@section('content')



<section class="content">

    <div class="container-fluid">
        <br>


        <div class="row container">

            <a href="{{route('admin.contracts.edit',['id'=>$contract->contruct_id])}}" class="btn btn-primary float-right">رجوع</a>

        </div>
        <br>

        <div class="card">

            <div class="card-header" style="background-color:#007bff;">
                <h1 class="card-title" style="float: right; color:white;font-family:Roboto;font-size:30px;"> الأقسام
                </h1>
            </div>
            <!-- /.card-header -->


            <br>
        
            <div class="container">
                <form action="{{route('admin.sections.update',$section->id)}}" method="post" class="submit-form">

                    @csrf
                    @method('put')
                    <input type="hidden" name="id" value="{{$section->id}}">
                    <div class="form-group">
                        <label for="name">القسم</label>
                        <div class="col-md-12">
                            <input type="text" name="name" placeholder="اسم القسم" class="form-control" value="{{$section->name}}">
                        </div>
                    </div>
                    <div class="row">
                        <input type="button" value="إضافة نص" name="add_text" class="btn btn-success add_text">
                        <input type="button" value="إضافة حقل إدخال" name="add_input" class="btn btn-warning add_input">
                        <input type="button" value="إضافة  قائمة منسدلة" name="add_dropdown" class="btn btn-danger add_dropdown">
                    </div>
                    <br>
                    <div id="dynamic_field">

                    </div>
                   
                   
            </div>
           
        </div>
        <br>
        <input type="submit" class="brn btn-primary" value="حفظ" name="save" id="save">
        </form>

    </div>
    </div>

    </div>
  
         
</section>


@endsection
@section('js')
<script>
    $(document).ready(function() {
        var i = 1;
        var j = 1;
        $('.add_text').click(function() {
            i++;
            $('#dynamic_field').append('  <div class="col-12" id="text_div_' + i + '">\
                            <div class="card card-success border-success">\
                                <div class="card-header">\
                                    <div class="row">\
                                        <div class="col-11 col-sm-11 col-md-11">\
                                            <h5 class=""> حقل النص </h5>\
                                        </div>\
                                        <div class="col-1 col-sm-1 col-md-1">\
                                            <div class="card-tools">\
                                                <button type="button" class="btn btn-danger" onclick="removetext(' + i + ')"><i class="fas fa-trash"></i>\
                                                </button>\
                                            </div>\
                                        </div>\
                                    </div>\
                                </div>\
                                <label for="name_input">اسم النص</label>\
                                <input type="text" name="name_input[]" placeholder="اسم النص  " class="form-control name_list" />\
                                <div class="col-md-6 col-sm-6 form-group mb-4">\
                                    <div class="input-group">\
                                        <div class="input-group-prepend"><span class="input-group-text font-weight-bold"> سطر جديد&nbsp</span></div><input type="checkbox" name="new_line[]" class="form-control new_line_list" />\
                                    </div>\
                                </div>\
                                <br>\
                                <div class="col-md-6 col-sm-6 form-group mb-4">\
                                    <div class="input-group">\
                                        <div class="input-group-prepend"><span class="input-group-text font-weight-bold"> عنوان&nbsp</span></div><input type="checkbox" name="is_title[]" class="form-control is_title_list"/>\
                                    </div>\
                                </div>\
                            </div>\
                        </div>');

        });

        $('.add_input').click(function() {
            i++;
            $('#dynamic_field').append(' <div class="col-12" id="text_div_' + i + '">\
                            <div class="card card-warning border-warning">\
                                <div class="card-header">\
                                    <div class="row">\
                                        <div class="col-11 col-sm-11 col-md-11">\
                                            <h5 class="">حقل الادخال</h5>\
                                        </div>\
                                        <div class="col-1 col-sm-1 col-md-1">\
                                            <div class="card-tools">\
                                                <button type="button" class="btn btn-danger" onclick="removetext(' + i + ')"><i class="fas fa-trash"></i>\
                                                </button>\
                                            </div>\
                                        </div>\
                                    </div>\
                                </div>\
                                <label for="name_input_input">اسم حقل الادخال</label>\
                                <input type="text" name="name_input_input[]" placeholder="اسم حقل الإدخال  " class="form-control name_input_input" />\
                                <br>\
                                <div class="input-group">\
                                    <div class="input-group-prepend">\
                                        <span class="input-group-text font-weight-bold">نوع حقل الإدخال<span class="text-danger">*</span>\
                                        </span>\
                                    </div>\
                                    <select name="type_input_name" id="type_input_name" class="form-control" required>\
                                        <option></option>\
                                        <option value="date">تاريخ</option>\
                                        <option value="text1">نص</option>\
                                    </select>\
                                </div>\
                                <br>\
                                <div class="col-md-6 col-sm-6 form-group mb-4">\
                                    <div class="input-group">\
                                        <div class="input-group-prepend"><span class="input-group-text font-weight-bold"> سطر جديد&nbsp</span></div><input type="checkbox" name="new_line[]" class="form-control new_line_list"/>\
                                    </div>\
                                </div>\
                            </div>\
                        </div>');

        });


        $('.add_dropdown').click(function() {
            i++;
            $('#dynamic_field').append('<div class="col-12" id="text_div_' + i + '">\
                            <div class="card card-danger border-danger">\
                                <div class="card-header">\
                                    <div class="row">\
                                        <div class="col-11 col-sm-11 col-md-11">\
                                            <h5 class=""> القائمة المنسدلة\
                                            </h5>\
                                        </div>\
                                        <div class="col-1 col-sm-1 col-md-1">\
                                            <div class="card-tools">\
                                                <button type="button" class="btn btn-danger" onclick="removetext(' + i + ')"><i class="fas fa-trash"></i>\
                                                </button>\
                                            </div>\
                                        </div>\
                                    </div>\
                                </div>\
                                <label for="dropdown_name">اسم القائمة المنسدله</label>\
                                <input type="text" name="dropdown_name[]" placeholder="اسم  القائمة المنسدلة  " class="form-control dropdown_name_list" />\
                                <br><div class="card-footer col-md-6 col-sm-6">\
				           <button type="button"  name="addinput" class="btn btn-dark text-white p-2 mb-2 addinput">اضافة عنصر</button>\
				            </div></div></div>');

        });


        $(document).on('click', '.addinput', function() {
            $('#dynamic_field').append(' <div class="col-12" id="elem_div_' + j + '">\
                                    <div class="card card-dark border-dark">\
                                        <div class="card-header">\
                                            <div class="row">\
                                                <div class="col-11 col-sm-11 col-md-11">\
                                                    <h5 class="">عناصر القائمة المنسدله</h5>\
                                                </div>\
                                                <div class="col-1 col-sm-1 col-md-1">\
                                                    <div class="card-tools">\
                                                        <button type="button" class="btn btn-danger" onclick="removeelem(' + j + ')"><i class="fas fa-trash"></i>\
                                                        </button>\
                                                    </div>\
                                                </div>\
                                            </div>\
                                        </div>\
                                        <input type="text" name="element_name[]" placeholder="اسم   العنصر  " class="form-control element_name_list" />\
                                        <br>\
                                        <div class="input-group">\
                                            <div class="input-group-prepend">\
                                                <span class="input-group-text font-weight-bold"> القسم<span class="text-danger">*</span>\
                                                </span>\
                                            </div>\
                                            <select id="section" name="section" class="form-control">\
                                                <option value="0">اختر القسم</option>\
                                                @foreach($sections as $section)\
                                                    <option value="{{ $section->id }}">{{ $section->name }}</option>\
                                                @endforeach\
                                            </select>\
                                        </div>\
                                    </div>\
                                </div>');
        });
    });
</script>


<script>
    $(document).on('click', '.btn_remove_section', function() {
        var button_id = $(this).attr("id");
        $('#row' + button_id + '').remove();

    });


    function removetext(id) {
        // alert ('type = ' + type + ' id = ' + id);
        var div = document.getElementById('text_div_' + id);
        // div.style.display = "none";
        div.innerHTML = '';
        var text_removed = document.getElementById('text_removed');
        text_removed.value = text_removed.value + id + ',';
    }


    function removeelem(id) {
        // alert ('type = ' + type + ' id = ' + id);
        var div = document.getElementById('elem_div_' + id);
        // div.style.display = "none";
        div.innerHTML = '';
        var elem_removed = document.getElementById('elem_removed');
        text_removed.value = text_removed.value + id + ',';
    }
</script>
@endsection