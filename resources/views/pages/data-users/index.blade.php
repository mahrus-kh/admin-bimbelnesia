@extends('templates.default')
@section('content')
   <div class="row">
       <div class="col-md-12 col-sm-12 col-xs-12">
           <div class="x_panel">
               <div class="x_title">
                   <h2>Data Users</h2>
                   <ul class="nav navbar-right panel_toolbox">
                       <li><a onclick="create_user()" class="dropdown-toggle"><i class="fa fa-edit"></i> Add New</a></li>
                       <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                       </li>
                   </ul>
                   <div class="clearfix"></div>
               </div>
               <div class="x_content">
                   <div class="table-responsive">
                       <table id="user-datatables" class="table table-striped table-hover">
                           <thead>
                           <tr>
                               <th>Name</th>
                               <th>Email</th>
                               <th>Status</th>
                               <th>Actions</th>
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

   {{--Modal Account Login--}}
   @include('pages.data-users.modal.modal-user')
   {{--End Account Login--}}

@endsection

@section('javascript')

    @include('pages.data-users.blade-js.data-user')

@endsection
