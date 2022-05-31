

<form action="{{route('admin.contracts.store')}}" method="post" class="submit-form">
    @csrf
    @method('post')
    <input type="hidden" name="id" value="">
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
    
         <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
         <button type="submit" class="btn btn-success" >حفظ</button>
    
</form>


