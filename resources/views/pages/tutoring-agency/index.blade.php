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
                               <th class="text-center">Category</th>
                               <th class="text-center">Status</th>
                               <th class="text-center">Actions</th>
                           </tr>
                           </thead>
                           <tbody>
                           @foreach($tutoring_agency as $row)
                               <tr>
                                   <td>{{ $row->tutoring_agency }}</td>
                                   <td class="text-center">
                                       @foreach($row->category_id as $category_id)
                                           {{ $category_id }}
                                       @endforeach
                                   </td>
                                   <td class="text-center">
                                       @if($row->verified == 1)
                                           <label for="" class="label bg-green">Verified</label>
                                       @elseif($row->verified == 0)
                                           <label for="" class="label bg-orange">Unverified</label>
                                       @endif
                                   </td>
                                   <td class="text-center">
                                       <form action="{{ route('tutoring-agency.destroy', $row) }}" method="post">
                                           <a href="{{ route('tutoring-agency.show', $row) }}" class="btn btn-primary btn-xs"><i class="fa fa-external-link"></i></a>
                                           {{ csrf_field() }}
                                           {{ method_field('DELETE') }}
                                           <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button>
                                       </form>
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
                $("#tutoring-agency-datatables").DataTable()
            });
        </script>
@endsection

