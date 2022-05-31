@extends('layouts.admin')
@section('title')
العقود
@endsection
@section('content')



  <section class="content">

    <div class="container-fluid">
        <br>
        <div class="row container">
       
              <a href="{{route('admin.contracts.create')}}" class="btn btn-primary  show-modal-form float-right"><i class="fa fa-plus">إضافة</i></a>
         
        </div>
        <br>
        <div class="card">

            <div class="card-header" style="background-color:#007bff;">
                <h1 class="card-title" style="float: right; color:white;font-family:Roboto;font-size:30px;"> العقود
                </h1>
            </div>
            <!-- /.card-header -->
            <div class="card-body" id="load-data">


            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
                {{ $data->links() }}
            </div>
        </div>
    </div>
</section>
@endsection