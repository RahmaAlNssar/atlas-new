<form action="{{route('admin.categories.update',$cat->id)}}" method="post" class="submit-form">
    @csrf
@method('put')
    <input type="hidden" name="id" value="{{$cat->id}}">
    <div class="form-group">
        <input type="text" class="form-control" id="name" name="name" placeholder="الاسم" aria-label="name" value="{{$cat->name}}">
        <span class="red error" id="name-error" style="color:red;"></span>
    </div>

    <div class="form-group">
        <label for="cat_id">الفئة</label>
        <select class="custom-select" name="parent_id">
            <option value="">اختر الفئة الاب</option>
            @foreach($categories as $category)
            <option value="{{$category->id}}" {{$category->id == $cat->parent_id ? "selected" : ""}}>{{$category->name}}</option>
            @endforeach
        </select>
        <span class="red error" id="parent_id-error" style="color:red;"></span>
    </div>
    <div class="form-group">
        <label for="exist">مرئي </label>
        <input type="checkbox" name="exist" id="exist" {{$cat->exist == 1 ? "checked" : ""}}/>
    </div>
    <div class="form-group">
        <label for="has_data">تحوي مواد</label>
        <input type="checkbox" name="has_data" id="has_data" {{$cat->has_data == 1 ? "checked" : ""}}/>
    </div>
    <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
     <button type="submit" class="btn btn-success" >حفظ</button>
</form>