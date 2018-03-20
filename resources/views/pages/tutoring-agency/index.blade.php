@extends('templates.default')
@section('content')
   <div class="row">
       <div class="col-md-12 col-sm-12 col-xs-12">
           <div class="x_panel">
               <div class="x_title">
                   <h2>Data Tutoring Agencies</h2>
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
                       <a href="{{ route('tutoring-agency.create') }}" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Add New</a>
                   </p>
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
        <script type="text/javascript">
            $(document).ready(function () {
                $("#tutoring-agency-datatables").DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{route('tutoring-agency.datatables')}}",
                    columns: [
                        {data: 'tutoring_agency', name: 'tutoring_agency'},
                        {data: 'verified', class: 'text-center',
                            render: function (data, type, row) {
                                if (row.verified == 0){
                                    return '<label for="" class="label bg-orange">Unverified</label>'
                                } else if (row.verified == 1){
                                    return '<label for="" class="label bg-green">Verified</label>'
                                }
                            }
                        },
                        {data: 'actions', name: 'actions', orderable: false, searchable: false, class: 'text-center'}

                    ]
                });
            });
            
            function destroy(id) {
                alert(id)
            }
        </script>
@endsection

