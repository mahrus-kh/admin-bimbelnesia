@extends('templates.default')
@section('content')
   <div class="row">
       <div class="col-md-12 col-sm-12 col-xs-12">
           <div class="x_panel">
               <div class="x_title">
                   <h2>Data Tutoring Agencies</h2>
                   <ul class="nav navbar-right panel_toolbox">
                       <a href="{{ route('tutoring-agency.create') }}" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Add New</a>
                   </ul>
                   <div class="clearfix"></div>
               </div>
               <div class="x_content">
                   <div class="table-responsive">
                       <table id="tutoring-agency-datatables" class="table table-striped table-hover">
                           <thead>
                           <tr>
                               <th>Tutoring Agency</th>
                               <th class="text-center">Status</th>
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
@endsection

@section('javascript')

    @include('pages.tutoring-agency.blade-js.index-js')

@endsection

