<form action="{{route('admin.categories.store')}}" method="post" class="submit-form">
    @csrf
    @method('post')
    <div class="form-group">
        <input type="text" class="form-control" id="name" name="name" placeholder="الاسم" aria-label="name" aria-describedby="basic-addon1" value="{{old('name')}}">
        <span class="red error" id="name-error" style="color:red;"></span>
    </div>

    <div class="form-group">
        <label for="cat_id">الفئة</label>
        <select class="custom-select" name="parent_id">
            <option value="">اختر الفئة الاب</option>
            @foreach($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>

    </div>
    <div class="form-group">
        <label for="has_data">تحوي مواد</label>
        <input type="checkbox" name="has_data" id="has_data" />
    </div>
   <div class="form-group">
        <label for="exist">مرئي </label>
        <input type="checkbox" name="exist" id="exist" />
    </div>
         <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
         <button type="submit" class="btn btn-success" >حفظ</button>
    
</form>


