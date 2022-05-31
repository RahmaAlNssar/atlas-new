<table class="table center-aligned-table mb-0" id="load-data">
                <thead>
                  <tr class="text-dark">
                    <th>#</th>
                    <th> اسم العقد </th>
                    <th>الفئة </th>
                   <th>الحالة</th>
                    <th>العمليات</th>
                   
                  </tr>
                </thead>
                <tbody>
                  @foreach($data as $contract)
                  <tr>
                    <td>{{$contract->id}}</td>
                    <td>{{$contract->name}}</td>
                    <td>{{$contract->category->name}}</td>
                  <td>{!! $contract->status() !!}</td>
                    <td>
                    <div class="btn-group btn-group-sm">
                      <a href="{{route('admin.contracts.edit',['id'=>$contract->id])}}" class="btn btn-outline-success">تعديل <i class="fa fa-edit"></i></a>
                     
                      <form action="{{route('admin.contracts.destroy',$contract->id)}}" method="POST" type="hidden" class="form-destroy">
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