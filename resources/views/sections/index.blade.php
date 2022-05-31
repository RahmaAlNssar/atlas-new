@extends('layouts.admin')
@section('title')
الأقسام
@endsection
@section('content')



  <section class="content">

    <div class="container-fluid">
        <br>
        <div class="row container">
            <div class="col-lg-2">
              <a href="{{route('admin.sections.create',$contract->id)}}" class="btn btn-primary float-right"><i class="fa fa-plus">إضافة</i></a>
              </div>
              <div class="col-lg-2">
             <a href="{{route('admin.contracts.index')}}" class="btn btn-primary float-right">رجوع للعقود</a>
             </div>
        </div>
        <br>
        <div class="card">

            <div class="card-header" style="background-color:#007bff;">
                <h1 class="card-title" style="float: right; color:white;font-family:Roboto;font-size:30px;"> الأقسام
                </h1>
            </div>
            <!-- /.card-header -->
            <div class="card-body" id="load-data">


            </div>
            <!-- /.card-body -->
           
            
          
              
        </div>
    </div>
</section>
@endsection