@extends('templates.default')
@section('content')
   <div class="row">
       <div class="col-md-12 col-sm-12 col-xs-12">
           <div class="x_panel">
               <div class="x_title">
                   <h2>Data Users</h2>
                   <ul class="nav navbar-right panel_toolbox">
                       <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                       <li class="dropdown">
                           <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                           <ul class="dropdown-menu" role="menu">
                               <li><a href="#">Settings 1</a></li>
                               <li><a href="#">Settings 2</a></li>
                           </ul>
                       </li>
                       <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                   </ul>
                   <div class="clearfix"></div>
               </div>
               <div class="x_content">
                   <p class="text-muted font-13 m-b-30">
                       <a href="" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Add New</a>
                   </p>
                   <div class="table-responsive">
                       <table id="data-users-datatables" class="table table-striped table-hover">
                           <thead>
                           <tr>
                               <th>Name</th>
                               <th class="text-center">Phone</th>
                               <th>Address</th>
                               <th class="text-center">Email</th>
                               <th class="text-center">Actions</th>
                           </tr>
                           </thead>
                           <tbody>
                           @foreach($data_users as $user)
                               <tr>
                                   <td>{{$user->name}}</td>
                                   <td class="text-center">{{$user->phone}}</td>
                                   <td>{{$user->address}}</td>
                                   <td class="text-center">{{$user->email}}</td>
                                   <td class="text-center">
                                       HALO
                                   </td>
                               </tr>
                           @endforeach
                           </tbody>
                       </table>
                   </div>
               </div>
           </div>
       </div>
   </div>
@endsection

@section('javascript')
    <script type="text/javascript">
        $(document).ready(function () {
            $("#data-users-datatables").DataTable()
        });
    </script>
@endsection
