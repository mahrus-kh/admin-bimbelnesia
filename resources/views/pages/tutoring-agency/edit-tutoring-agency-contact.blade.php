@extends('templates.default')
@section('content')
    <div class="row">
        <div class="col-md-8 col-sm-8 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Tutoring Agency</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <form action="{{ route('tutoring-agency.update', $tutoring_agency) }}" method="post" class="form-horizontal form-label-left">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12">Tutoring Agency<span class="required">*</span></label>
                            <div class="col-md-10 col-sm-10 col-xs-12">
                                <input type="text" name="tutoring_agency" value="{{ $tutoring_agency->tutoring_agency }}" class="form-control" required="required">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12">Logo Image</label>
                            <div class="col-md-4 col-sm-5 col-xs-12">
                                <input type="file" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12">Status<span class="required">*</span></label>
                            <div class="col-md-10 col-sm-10 col-xs-12">
                                <label class="radio-inline"><input type="radio" name="verified" value="1" required="required" {{ $tutoring_agency->verified == 1 ? 'checked' : '' }}>Verified</label>
                                <label class="radio-inline"><input type="radio" name="verified" value="0" required="required" {{ $tutoring_agency->verified == 0 ? 'checked' : '' }}>Unverified</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12">Rating</label>
                            <div class="col-md-2 col-sm-2 col-xs-12">
                                <input type="text" value="{{ $tutoring_agency->rating }}" class="form-control" readonly="readonly">
                            </div>
                            <label class="control-label col-md-2 col-sm-2 col-xs-12">Total Views</label>
                            <div class="col-md-2 col-sm-2 col-xs-12">
                                <input type="text" value="{{ $tutoring_agency->total_views }}" class="form-control" readonly="readonly">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12">Address<span class="required">*</span></label>
                            <div class="col-md-10 col-sm-10 col-xs-12">
                                <textarea name="address" class="form-control" rows="3">{{ $tutoring_agency->address }}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12">Description<span class="required">*</span></label>
                            <div class="col-md-10 col-sm-10 col-xs-12">
                                <textarea name="description" class="form-control" rows="6">{{ $tutoring_agency->description }}</textarea>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12">Sub Category<span class="required">*</span></label>
                            <div class="col-md-10 col-sm-10 col-xs-12">
                                <input type="text" name="sub_category" value="{{ $tutoring_agency->tutoring_agency }}" class="form-control" required="required">
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-3 col-xs-12">Tags</label>
                            <div class="col-md-10 col-sm-10 col-xs-12">
                                <textarea name="tags" id="tags-input" class="form-control tags" rows="3"> {{ $tutoring_agency->tags }}</textarea>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-3 col-xs-12"></label>
                            <div class="col-md-10 col-sm-10 col-xs-12">
                                <button type="submit" class="btn btn-success">UPDATE</button>
                                <button class="btn btn-default" type="reset">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Contacts</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    @foreach($tutoring_agency->contact()->get() as $contact)
                        <form action="{{ route('tutoring-agency.contact.update', $contact) }}" method="post" class="form-horizontal form-label-left input_mask">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}
                            <div class="form-group">
                                <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                    <input type="text" name="website" value="{{ $contact->website }}" class="form-control has-feedback-left" placeholder="Website">
                                    <span class="fa fa-globe form-control-feedback left" aria-hidden="true"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                    <input type="text" name="office_phone" value="{{ $contact->office_phone }}" class="form-control has-feedback-left" placeholder="Office Phone">
                                    <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                    <input type="text" name="mobile_phone" value="{{ $contact->mobile_phone }}" class="form-control has-feedback-left" placeholder="Mobile Phone">
                                    <span class="fa fa-mobile form-control-feedback left" aria-hidden="true"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                    <input type="text" name="email" value="{{ $contact->email }}" class="form-control has-feedback-left" placeholder="Email">
                                    <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                    <input type="text" name="facebook" value="{{ $contact->facebook }}" class="form-control has-feedback-left" placeholder="Facebook URL">
                                    <span class="fa fa-facebook form-control-feedback left" aria-hidden="true"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                    <input type="text" name="instagram" value="{{ $contact->instagram }}" class="form-control has-feedback-left" placeholder="Instagram URL">
                                    <span class="fa fa-instagram form-control-feedback left" aria-hidden="true"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                    <textarea name="other_contacts" class="form-control" rows="3" placeholder="Other Contact">{{ $contact->other_contacts }}</textarea>
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <button type="submit" class="btn btn-success">UPDATE</button>
                                    <button class="btn btn-default" type="reset">Reset</button>
                                </div>
                            </div>
                        </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script type="text/javascript">
        $(document).ready(function () {
           $("#tags-input").tagsInput();
        });
    </script>
@endsection
