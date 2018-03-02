@extends('templates.default')
@section('content')
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Add New Tutoring Agencies</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    <li><a class="dropdown-toggle"><i class="fa fa-wrench"></i></a></li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form action="{{ route('tutoring-agency.store') }}" method="post" data-parsley-validate class="form-horizontal form-label-left">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Tutoring Agency <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="tutoring_agency" class="form-control col-md-7 col-xs-12" required="required" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Category <span class="required">*</span></label>
                        <div class="col-md-7 col-sm-7 col-xs-12">
                            <div class="checkbox">
                                @foreach($category as $row)
                                    <label><input type="checkbox" name="category_id[]" value="{{ $row->id }}">{{ $row->category }} </label>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Sub Category <span class="required">*</span></label>
                        <div class="col-md-7 col-sm-7 col-xs-12">
                            <div class="checkbox">
                                @foreach($sub_category as $row)
                                    <label><input type="checkbox" name="sub_category_id[]" value="{{ $row->id }}">{{ $row->sub_category }} </label>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <input type="submit" class="btn btn-success" value="SAVE">
                            <input class="btn btn-default" type="reset">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection