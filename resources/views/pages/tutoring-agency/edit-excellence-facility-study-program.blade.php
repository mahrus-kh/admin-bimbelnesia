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
                <div class="x_title">
                    <h2>Excellences</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        <li><a class="dropdown-toggle"><i class="fa fa-wrench"></i></a></li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Excellence</th>
                            <th class="text-center">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php $no = 1; @endphp
                        @forelse($tutoring_agency->excellence()->get() as $excellence)
                            <tr>
                                <td> {{ $no  }}</td>
                                <td scope="row"> {{ $excellence->excellence }}</td>
                                <td class="text-center">
                                    <form action="{{ route('excellence.destroy', [$tutoring_agency, $excellence->id ]) }}" method="post">
                                        <a href="{{ route('excellence.edit', [$tutoring_agency, $excellence->id]) }}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></a>
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @php $no += 1 ;@endphp
                        @empty
                            Not Found
                        @endforelse
                        </tbody>
                    </table>
                    <div class="ln_solid"></div>
                    <form action="{{ route('excellence.store', $tutoring_agency) }}" method="post">
                        {{ csrf_field() }}
                        <textarea name="excellence" class="form-control" rows="3" placeholder="Type here . . ." required="required"></textarea>
                        <br>
                        <input type="submit" class="btn btn-success" value="Add New">
                        <input type="reset" class="btn btn-default">
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Facilities</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        <li><a class="dropdown-toggle"><i class="fa fa-wrench"></i></a></li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Facility</th>
                            <th class="text-center" l>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php $no = 1; @endphp
                        @forelse($tutoring_agency->facility()->get() as $facility)
                            <tr>
                                <td> {{ $no  }}</td>
                                <td scope="row"> {{ $facility->facility }}</td>
                                <td class="text-center">
                                    <form action="{{ route('facility.destroy', [$tutoring_agency, $facility->id]) }}" method="post">
                                        <a href="{{ route('facility.edit', [$tutoring_agency, $facility->id]) }}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></a>
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @php $no += 1 ;@endphp
                        @empty
                            Not Found
                        @endforelse
                        </tbody>
                    </table>
                    <div class="ln_solid"></div>
                    <form action="{{ route('facility.store', $tutoring_agency) }}" method="post">
                        {{ csrf_field() }}
                        <textarea name="facility" class="form-control" rows="3" placeholder="Type here . . ." required="required"></textarea>
                        <br>
                        <input type="submit" class="btn btn-success" value="Add New">
                        <input type="reset" class="btn btn-default">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-9 col-sm-9 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Study Programs</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        <li><a class="dropdown-toggle"><i class="fa fa-wrench"></i></a></li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Study Program</th>
                            <th>Cost</th>
                            <th class="text-center">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php $no = 1; @endphp
                        @forelse($tutoring_agency->study_program()->get() as $study_program)
                            <tr>
                                <td> {{ $no  }}</td>
                                <td scope="row"> {{ $study_program->study_program }}</td>
                                <td> {{ $study_program->cost }}</td>
                                <td class="text-center">
                                    <form action="{{ route('study-program.destroy', [$tutoring_agency, $study_program->id]) }}" method="post">
                                        <a href="{{ route('study-program.edit', [$tutoring_agency, $study_program->id]) }}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></a>
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @php $no += 1 ;@endphp
                        @empty
                            Not Found
                        @endforelse
                        </tbody>
                    </table>
                    <div class="ln_solid"></div>
                    <form action="{{ route('study-program.store', $tutoring_agency) }}" method="post" class="form-horizontal form-label-left">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12">Study Program<span class="required">*</span></label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" name="study_program" class="form-control" required="required">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12">Cost<span class="required">*</span></label>
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <input type="text" name="cost" class="form-control" required="required">
                            </div>
                        </div>
                        <br>
                        <input type="submit" class="btn btn-success" value="Add New">
                        <input type="reset" class="btn btn-default">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection