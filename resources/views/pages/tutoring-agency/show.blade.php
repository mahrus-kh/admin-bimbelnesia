@extends('templates.default')
@section('content')
    <div class="row">
        <div class="col-md-8 col-sm-8 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Tutoring Agency</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a href="{{ route('tutoring-agency.edit', $tutoring_agency) }}" class="dropdown-toggle"><i class="fa fa-edit"></i> Edit Data</a></li>
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-md-3 col-sm-3 col-xs-3 profile_left">
                            <div class="profile_img">
                                <div id="crop-avatar">
                                    <img class="img-responsive avatar-view" src="{{ asset($tutoring_agency->logo_image) }}" alt="Avatar" title="Change the avatar">
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
                        <li><a onclick="edit_account()" class="dropdown-toggle"><i class="fa fa-edit"></i> Edit Account</a></li>
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <b>Email : </b> <text id="email_account"></text>
                    <br>
                    <b>Password : </b> ********
                </div>
            </div>
            <div class="x_panel">
                <div class="x_title">
                    <h2>Contacts</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a onclick="edit_contact()" class="dropdown-toggle"><i class="fa fa-edit"></i> Edit Contact</a></li>
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <a target="_blank"class="btn btn-default btn-sm"><i class="fa fa-globe"></i> <text id="website"></text></a>
                    <a target="_blank"class="btn btn-default btn-sm"><i class="fa fa-phone"></i> <text id="office_phone"></text></a>
                    <a target="_blank"class="btn btn-default btn-sm"><i class="fa fa-mobile"></i> <text id="mobile_phone"></text></a>
                    <a target="_blank"class="btn btn-default btn-sm"><i class="fa fa-envelope"></i> <text id="email"></text></a>
                    <a target="_blank"class="btn btn-default btn-sm"><i class="fa fa-facebook"></i> <text id="facebook"></text></a>
                    <a target="_blank"class="btn btn-default btn-sm"><i class="fa fa-instagram"></i> <text id="instagram"></text></a>
                    <br>
                    <label for="">Other Contact : </label> <text id="other_contacts"></text>
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
                        <li><a onclick="create_excellence()" class="dropdown-toggle"><i class="fa fa-plus"></i> Add New</a></li>
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="table-responsive">
                        <table id="excellence-datatables" class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th>Excellence</th>
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
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Facilities</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a onclick="create_facility()" class="dropdown-toggle"><i class="fa fa-plus"></i> Add New</a></li>
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table id="facility-datatables" class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>Facility</th>
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
    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Study Programs</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a onclick="create_study_program()" class="dropdown-toggle"><i class="fa fa-plus"></i> Add New</a></li>
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table id="study-program-datatables" class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>Study Program</th>
                            <th>Cost</th>
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

    {{--Modal Account Login--}}
    @include('pages.tutoring-agency.modal.modal-account')
    {{--End Account Login--}}

    {{--Modal Contact--}}
    @include('pages.tutoring-agency.modal.modal-contact')
    {{--End Modal Contact--}}

    {{--Modal Excellence--}}
        @include('pages.tutoring-agency.modal.modal-excellence')
    {{--End Modal Excellence--}}

    {{--Modal Facility--}}
        @include('pages.tutoring-agency.modal.modal-facility')
    {{--End Modal Facility--}}

    {{--Modal Study Program--}}
    @include('pages.tutoring-agency.modal.modal-study-program')
    {{--End Modal Study Program--}}

@endsection

@section('javascript')

    @include('pages.tutoring-agency.blade-js.show-account-login')

    @include('pages.tutoring-agency.blade-js.show-contact')

    @include('pages.tutoring-agency.blade-js.show-excellence')

    @include('pages.tutoring-agency.blade-js.show-facility')

    @include('pages.tutoring-agency.blade-js.show-study-program')

@endsection