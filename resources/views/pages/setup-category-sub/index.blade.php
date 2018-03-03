@extends('templates.default')
@section('content')
   <div class="row">
       <div class="col-md-6 col-sm-6 col-xs-12">
           <div class="x_panel">
               <div class="x_title">
                   <h2>Data Category</h2>
                   <div class="clearfix"></div>
               </div>
               <div class="x_content">
                   <div class="table-responsive">
                       <table id="data-users-datatables" class="table table-striped table-hover">
                           <thead>
                           <tr>
                               <th>#</th>
                               <th>Category</th>
                               <th class="text-center">Actions</th>
                           </tr>
                           </thead>
                           @php $no = 1; @endphp
                           @foreach($category as $row)
                               <tr>
                                   <td>{{ $no }}</td>
                                   <td>{{ $row->category }}</td>
                                   <td class="text-center">
                                       <form action="{{ route('category.destroy', $row) }}" method="post">
                                           <a href="" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></a>
                                           {{ csrf_field() }}
                                           {{ method_field('DELETE') }}
                                           <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button>
                                       </form>
                                   </td>
                               </tr>
                               @php $no += 1 ;@endphp
                           @endforeach
                           <tbody>
                           </tbody>
                       </table>
                   </div>
                   <div class="ln_solid"></div>
                   <form action="{{ route('category.store') }}" method="post" class="form-horizontal form-label-left">
                       {{ csrf_field() }}
                       <div class="form-group">
                           <label class="control-label col-md-2 col-sm-2 col-xs-12">Category<span class="required">*</span></label>
                           <div class="col-md-8 col-sm-8 col-xs-12">
                               <input type="text" name="category" class="form-control" required="required">
                           </div>
                       </div>
                       <div class="form-group">
                           <label class="control-label col-md-2 col-sm-2 col-xs-12"></label>
                           <div class="col-md-8 col-sm-8 col-xs-12">
                               <input type="submit" class="btn btn-success" value="Add New">
                               <input type="reset" class="btn btn-default">
                           </div>
                       </div>
                   </form>
               </div>
           </div>
       </div>
       <div class="col-md-6 col-sm-6 col-xs-12">
           <div class="x_panel">
               <div class="x_title">
                   <h2>Data Sub Category</h2>
                   <div class="clearfix"></div>
               </div>
               <div class="x_content">
                   <div class="table-responsive">
                       <table id="data-users-datatables" class="table table-striped table-hover">
                           <thead>
                           <tr>
                               <th>#</th>
                               <th>Sub Category</th>
                               <th class="text-center">Actions</th>
                           </tr>
                           </thead>
                           @php $no = 1; @endphp
                           @foreach($sub_category as $row)
                               <tr>
                                   <td>{{ $no }}</td>
                                   <td>{{ $row->sub_category }}</td>
                                   <td class="text-center">
                                       <form action="{{ route('sub-category.destroy', $row) }}" method="post">
                                           <a href="" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></a>
                                           {{ csrf_field() }}
                                           {{ method_field('DELETE') }}
                                           <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button>
                                       </form>
                                   </td>
                               </tr>
                               @php $no += 1 ;@endphp
                           @endforeach
                           <tbody>
                           </tbody>
                       </table>
                   </div>
                   <div class="ln_solid"></div>
                   <form action="{{ route('sub-category.store') }}" method="post" class="form-horizontal form-label-left">
                       {{ csrf_field() }}
                       <div class="form-group">
                           <label class="control-label col-md-3 col-sm-3 col-xs-12">Sub Category<span class="required">*</span></label>
                           <div class="col-md-8 col-sm-8 col-xs-12">
                               <input type="text" name="sub_category" class="form-control" required="required">
                           </div>
                       </div>
                       <div class="form-group">
                           <label class="control-label col-md-3 col-sm-3 col-xs-12"></label>
                           <div class="col-md-8 col-sm-8 col-xs-12">
                               <input type="submit" class="btn btn-success" value="Add New">
                               <input type="reset" class="btn btn-default">
                           </div>
                       </div>
                   </form>
               </div>
           </div>
       </div>
   </div>
@endsection

