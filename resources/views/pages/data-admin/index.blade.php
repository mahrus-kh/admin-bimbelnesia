@extends('templates.default')
@section('content')
   <div class="row">
       <div class="col-md-8 col-sm-8 col-xs-12">
           <div class="x_panel">
               <div class="x_title">
                   <h2>Data Administrator</h2>
                   <ul class="nav navbar-right panel_toolbox">
                       <li><a onclick="create_admin()" class="dropdown-toggle"><i class="fa fa-edit"></i> Add New</a></li>
                       <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                       </li>
                   </ul>
                   <div class="clearfix"></div>
               </div>
               <div class="x_content">
                   <div class="table-responsive">
                       <table id="admin-datatables" class="table table-striped table-hover">
                           <thead>
                           <tr>
                               <th>Name</th>
                               <th>Email</th>
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
       <div class="col-md-4 col-sm-4 col-xs-12">
           <div class="x_panel">
               <div class="x_title">
                   <h2>Setting Account</h2>
                   <div class="clearfix"></div>
               </div>
               <div class="x_content">
                   <form method="POST" id="form-setting-account" class="form-horizontal form-label-left input_mask">
                       {{ csrf_field() }}
                       {{ method_field('PATCH') }}
                       <div class="form-group">
                           <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                               <input type="text" name="name_account" class="form-control has-feedback-left" placeholder="Name" maxlength="255" required>
                               <span class="fa fa-lock form-control-feedback left help-block with-errors" aria-hidden="true"></span>
                               {{--<span class="help-block with-errors"></span>--}}
                           </div>
                       </div>
                       <div class="form-group">
                           <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                               <input type="email" name="email_account" class="form-control has-feedback-left" placeholder="Email" maxlength="255" required>
                               <span class="fa fa-envelope form-control-feedback left help-block with-errors" aria-hidden="true"></span>
                               {{--<span class="help-block with-errors"></span>--}}
                           </div>
                       </div>
                       <div class="form-group">
                           <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                               <input type="password" name="password_account" class="form-control has-feedback-left" placeholder="Password" minlength="8" maxlength="255" required>
                               <span class="fa fa-lock form-control-feedback left" aria-hidden="true"></span>
                               <span class="help-block with-errors"></span>
                           </div>
                       </div>
                       <div class="form-group">
                           <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                               <input type="submit" class="btn btn-info" value="UPDATE">
                               <input type="reset" class="btn btn-default">
                           </div>
                       </div>
                   </form>
               </div>
           </div>
       </div>
   </div>

   {{--Modal Account Login--}}
   @include('pages.data-admin.modal.modal-admin')
   {{--End Account Login--}}

@endsection

@section('javascript')

    @include('pages.data-admin.blade-js.data-admin')

@endsection
