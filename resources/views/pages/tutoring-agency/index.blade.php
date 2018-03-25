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
        <script type="text/javascript">
            var tutoring_agency_dt ;
            $(document).ready(function () {
                tutoring_agency_dt = $("#tutoring-agency-datatables").DataTable({
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
                if (confirm("Delete Permanently ?")){
                    $.ajax({
                        type: "POST",
                        url: "{{ url('institution/tutoring-agency') . '/' }}" + id,
                        data: {_method: "DELETE", _token: "{{ csrf_token() }}"},
                        success: function (data) {
                            tutoring_agency_dt.ajax.reload()
                        },
                        error: function () {
                            alert("Something Wrong !")
                        }
                    })
                }
            }
        </script>
@endsection

