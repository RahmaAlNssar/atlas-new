<table class="table center-aligned-table mb-0" id="load-data">
                <thead>
                  <tr class="text-dark">
                    <th>#</th>
                    <th>اسم الفئة </th>
                    <th>الفئة الأب</th>
                   <th>الحالة</th>
                    <th>العمليات</th>
                   
                  </tr>
                </thead>
                <tbody>
                  @foreach($data as $category)
                  <tr>
                    <td>{{$category->id}}</td>
                    <td>{{$category->name}}</td>
                    <td>@if($category->parent_id != ''){{$category->parent->name}} @else لا يوجد فئة أب @endif</td>
                  <td>{!! $category->status() !!}</td>
                    <td>
                    <div class="btn-group btn-group-sm">
                      <a href="{{route('admin.categories.edit',$category->id)}}" class="btn btn-outline-success show-modal-form">تعديل <i class="fa fa-edit"></i></a>
                     
                      <form action="{{route('admin.categories.destroy',$category->id)}}" method="POST" type="hidden" class="form-destroy">
                            {{ csrf_field() }}
                            @method('delete')
                            <button type="submit" class="btn btn-outline-danger btn-sm">
                                حذف<i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </div>  
                    </td>
                    
                  </tr>
                  
                  @endforeach
                </tbody>
              </table>