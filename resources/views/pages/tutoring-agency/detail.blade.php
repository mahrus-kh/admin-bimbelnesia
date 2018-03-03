@extends('templates.default')
@section('content')
    <div class="row">
        <div class="col-md-8 col-sm-8 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Tutoring Agency</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a href="{{ route('tutoring-agency.edit', $tutoring_agency) }}" target="_blank" class="dropdown-toggle"><i class="fa fa-pencil"></i></a></li>
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-md-3 col-sm-3 col-xs-3 profile_left">
                            <div class="profile_img">
                                <div id="crop-avatar">
                                    <img class="img-responsive avatar-view" src="images/picture.jpg" alt="Avatar" title="Change the avatar">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                            <h3>{{ $tutoring_agency->tutoring_agency }}
                                <small>
                                    @if($tutoring_agency->verified == 1)
                                        <label for="" class="label bg-green">Verified</label>
                                        @elseif($tutoring_agency->verified == 0)
                                        <label for="" class="label label-warning">Unverified</label>
                                    @endif
                                </small>
                            </h3>
                            <ul class="list-unstyled user_data">
                                <li>Category :
                                    @foreach($category_array as $category)
                                        <label for="" class="label label-default">{{ $category }}</label>
                                    @endforeach
                                </li>
                                <li>Rating :
                                    @php $star =  $tutoring_agency->rating ; @endphp
                                        @for($i=0;$i<5;$i++)
                                        @if($star >= 1)
                                            <i class="fa fa-star"></i>
                                        @elseif ($star >= 0.5 && $star < 1  )
                                            <i class="fa fa-star-half-o"></i>
                                        @elseif($star < 0.5)
                                            <i class="fa fa-star-o"></i>
                                        @endif
                                        @php $star =  $star - 1; @endphp
                                    @endfor
                                    ({{ $tutoring_agency->rating }})
                                </li>
                                <li>Total Views : {{ $tutoring_agency->total_views }}</li>
                            </ul>
                        </div>
                    </div>
                    <b>Alamat : </b> {{ $tutoring_agency->address }}
                    <div class="ln_solid"></div>
                    <b>Description : </b> {{ $tutoring_agency->description ? $tutoring_agency->description : '-'  }}
                    <div class="ln_solid"></div>
                    <b>Sub Category : </b>
                        @foreach($sub_category_array as $sub_category)
                            <label for="" class="label label-default">{{ $sub_category }}</label>
                        @endforeach
                    <div class="ln_solid"></div>
                    <b>Tags : </b>
                        @forelse($tutoring_agency->tags as $tags)
                        <label for="" class="label label-default">#{{ $tags }}</label>
                        @empty
                                -
                        @endforelse
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Account Login</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a href="{{ route('tutoring-agency.edit', $tutoring_agency) }}" target="_blank" class="dropdown-toggle"><i class="fa fa-pencil"></i></a></li>
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    @foreach($tutoring_agency->account_login()->get() as $account)
                        <b>Email : </b> {{ $account->email ? $account->email : 'Not Found' }}
                        <br>
                        <b>Password : </b> {{ $account->password ? '***Secret***' : 'Not Found' }}
                    @endforeach
                </div>
            </div>
            <div class="x_panel">
                <div class="x_title">
                    <h2>Contacts</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a href="{{ route('tutoring-agency.edit', $tutoring_agency) }}" target="_blank" class="dropdown-toggle"><i class="fa fa-pencil"></i></a></li>
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    @forelse($tutoring_agency->contact()->get() as $contact)
                        <a href="{{ $contact->website }}" target="_blank" class="btn btn-default btn-sm"><i class="fa fa-globe"></i> {{ $contact->website ? $contact->website : 'Not Found' }}</a>
                        <a href="{{ $contact->office_phone }}" target="_blank" class="btn btn-default btn-sm"><i class="fa fa-phone"></i> {{ $contact->office_phone ? $contact->office_phone : 'Not Found' }}</a>
                        <a href="{{ $contact->mobile_phone }}" target="_blank" class="btn btn-default btn-sm"><i class="fa fa-mobile"></i> {{ $contact->mobile_phone ? $contact->mobile_phone : 'Not Found' }}</a>
                        <a href="{{ $contact->email }}" target="_blank" class="btn btn-default btn-sm"><i class="fa fa-envelope"></i> {{ $contact->email ? $contact->email : 'Not Found' }}</a>
                        <a href="{{ $contact->facebook }}" target="_blank" class="btn btn-default btn-sm"><i class="fa fa-facebook"></i> {{ $contact->facebook ? $contact->facebook : 'Not Found' }}</a>
                        <a href="{{ $contact->instagram }}" target="_blank" class="btn btn-default btn-sm"><i class="fa fa-instagram"></i> {{ $contact->instagram ? $contact->instagram : 'Not Found' }}</a>
                        <br>
                        <label for="">Other Contact : </label> {{ $contact->other_contacts ? $contact->other_contacts : '-' }}
                    @endforeach
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
                        <li><a href="{{ route('tutoring-agency.edit-more', $tutoring_agency) }}" target="_blank" class="dropdown-toggle"><i class="fa fa-pencil"></i></a></li>
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
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
                            <th>Excellence</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php $no = 1; @endphp
                        @forelse($tutoring_agency->excellence()->get() as $excellence)
                            <tr>
                                <td> {{ $no  }}</td>
                                <td scope="row"> {{ $excellence->excellence }}</td>
                            </tr>
                            @php $no += 1 ;@endphp
                        @empty
                            Not Found
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Facilities</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a href="{{ route('tutoring-agency.edit-more', $tutoring_agency) }}" target="_blank" class="dropdown-toggle"><i class="fa fa-pencil"></i></a></li>
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
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
                        </tr>
                        </thead>
                        <tbody>
                        @php $no = 1; @endphp
                        @forelse($tutoring_agency->facility()->get() as $facility)
                            <tr>
                                <td> {{ $no  }}</td>
                                <td scope="row"> {{ $facility->facility }}</td>
                            </tr>
                            @php $no += 1 ;@endphp
                        @empty
                            Not Found
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Study Programs</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a href="{{ route('tutoring-agency.edit-more', $tutoring_agency) }}" target="_blank" class="dropdown-toggle"><i class="fa fa-pencil"></i></a></li>
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
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
                            <th>Study Program</th>
                            <th>Cost</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php $no = 1; @endphp
                        @forelse($tutoring_agency->study_program()->get() as $study_program)
                            <tr>
                                <td> {{ $no  }}</td>
                                <td scope="row"> {{ $study_program->study_program }}</td>
                                <td> {{ $study_program->cost }}</td>
                            </tr>
                            @php $no += 1 ;@endphp
                        @empty
                            Not Found
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection