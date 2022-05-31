<table class="table center-aligned-table mb-0" id="load-data">
                <thead>
                  <tr class="text-dark">
                    <th>#</th>
                    <th>اسم القسم </th>
                   
                    <th>العمليات</th>
                   
                  </tr>
                </thead>
                <tbody>
                  @foreach($data as $section)
                  <tr>
                    <td>{{$section->id}}</td>
                    <td>{{$section->name}}</td>
                 
                    <td>
                    <div class="btn-group btn-group-sm">
               
                      <a href="{{route('admin.sections.edit',$section->id)}}" class="btn btn-outline-success">تعديل <i class="fa fa-edit"></i></a>
                   
                      <form action="" method="POST" type="hidden" class="form-destroy">
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