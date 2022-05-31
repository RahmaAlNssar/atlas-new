<form action="{{route('admin.contracts.update',$contract->id)}}" method="post" class="submit-form">
    @csrf
@method('put')
    <input type="hidden" name="id" value="{{$contract->id}}">
    <div class="form-group">
        <input type="text" class="form-control" id="name" name="name" placeholder="الاسم" aria-label="name" value="{{$contract->name}}">
        <span class="red error" id="name-error" style="color:red;"></span>
    </div>

    <div class="form-group">
        <label for="cat_id">الفئة</label>
        <select class="custom-select" name="parent_id">
            <option value="">اختر الفئة الاب</option>
            @foreach($categories as $category)
            <option value="{{$category->id}}" {{$category->id == $contract->category->id ? "selected" : ""}}>{{$category->name}}</option>
            @endforeach
        </select>
        <span class="red error" id="parent_id-error" style="color:red;"></span>
    </div>
    <div class="form-group">
        <label for="has_data">مرئي </label>
        <input type="checkbox" name="exist" id="exist" {{$contract->exist == 1 ? "checked" : ""}}/>
    </div>
   
    <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
     <button type="submit" class="btn btn-success" >حفظ</button>
</form>