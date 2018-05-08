@extends('templates.default')
@section('content')
   <div class="row">
       <div class="col-md-5 col-sm-5 col-xs-12">
           <div class="x_panel">
               <div class="x_title">
                   <h2>Data Category</h2>
                   <ul class="nav navbar-right panel_toolbox">
                       <li><a onclick="create_category()" class="dropdown-toggle"><i class="fa fa-plus"></i> Add New</a></li>
                       </li>
                   </ul>
                   <div class="clearfix"></div>
               </div>
               <div class="x_content">
                   <div class="table-responsive">
                       <table id="category-datatables" class="table table-striped table-hover">
                           <thead>
                           <tr>
                               <th>Category</th>
                               <th class="text-center">Actions</th>
                           </tr>
                           </thead>
                           <tbody>
                           </tbody>
                       </table>
                   </div>
               </div>
           </div>
       </div>
       <div class="col-md-7 col-sm-7 col-xs-12">
           <div class="x_panel">
               <div class="x_title">
                   <h2>Data Sub Category</h2>
                   <ul class="nav navbar-right panel_toolbox">
                       <li><a onclick="create_sub_category()" class="dropdown-toggle"><i class="fa fa-plus"></i> Add New</a></li>
                       </li>
                   </ul>
                   <div class="clearfix"></div>
               </div>
               <div class="x_content">
                   <div class="table-responsive">
                       <table id="sub-category-datatables" class="table table-striped table-hover">
                           <thead>
                           <tr>
                               <th>Sub Category</th>
                               <th>Fa Icon</th>
                               <th class="text-center">Actions</th>
                           </tr>
                           </thead>
                           <tbody>
                           </tbody>
                       </table>
                   </div>
               </div>
           </div>
       </div>
   </div>

   {{--Modal Category--}}
   @include('pages.setup-category-sub.modal.modal-category')
   {{--End Category--}}


   {{--Modal Sub Category--}}
   @include('pages.setup-category-sub.modal.modal-sub-category')
   {{--End Sub Category--}}

@endsection

@section('javascript')

    @include('pages.setup-category-sub.blade-js.setup-category')

    @include('pages.setup-category-sub.blade-js.setup-sub-category')

@endsection

