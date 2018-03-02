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
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="x_panel">
                <p>Excellence</p>
                <form action="{{ route('excellence.update', [$tutoring_agency, $excellence]) }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}
                    <textarea name="excellence" class="form-control" rows="6" placeholder="Type here . . ." required="required">{{ $excellence->excellence }}</textarea>
                    <br>
                    <input type="submit" class="btn btn-success" value="UPDATE">
                    <input type="reset" class="btn btn-default">
                    <a href="{{ route('tutoring-agency.edit-more', $tutoring_agency) }}" class="btn btn-default">Back</a>
                </form>
            </div>
        </div>
    </div>
@endsection