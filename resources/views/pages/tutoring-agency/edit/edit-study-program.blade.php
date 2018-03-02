@extends('templates.default')
@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_content">
                    <h2>{{ $tutoring_agency->tutoring_agency }}</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-9 col-sm-9 col-xs-12">
            <div class="x_panel">
                <p>Study Program</p>
                <form action="{{ route('study-program.update', [$tutoring_agency, $study_program]) }}" method="post" class="form-horizontal form-label-left">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}
                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Study Program<span class="required">*</span></label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text" name="study_program" value="{{ $study_program->study_program }}" class="form-control" required="required">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Cost<span class="required">*</span></label>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <input type="text" name="cost" class="form-control" value="{{ $study_program->cost }}" required="required">
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12"></label>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <input type="submit" class="btn btn-success" value="UPDATE">
                            <input type="reset" class="btn btn-default">
                            <a href="{{ route('tutoring-agency.edit-more', $tutoring_agency) }}" class="btn btn-default">Back</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection