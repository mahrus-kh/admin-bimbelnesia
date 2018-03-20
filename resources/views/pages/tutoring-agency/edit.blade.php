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
                            <label class="control-label col-md-2 col-sm-2 col-xs-12">Category<span class="required">*</span></label>
                            <div class="col-md-10 col-sm-10 col-xs-12">
                                <div class="checkbox">
                                    @foreach($category as $row)
                                        <label><input type="checkbox" name="category_id[]" value="{{ $row->id }}" {{ in_array($row->id , $category_id) ? 'checked' : '' }}>{{ $row->category }} </label> |
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12">Sub Category<span class="required">*</span></label>
                            <div class="col-md-10 col-sm-10 col-xs-12">
                                <div class="checkbox">
                                    @foreach($sub_category as $row)
                                        <label><input type="checkbox" name="sub_category_id[]" value="{{ $row->id }}" {{ in_array($row->id , $sub_category_id) ? 'checked' : '' }}>{{ $row->sub_category }} </label> |
                                    @endforeach
                                </div>
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
                                <textarea name="address" class="form-control" rows="4" maxlength="255" placeholder="Type here . . . (Max 255 character)">{{ $tutoring_agency->address }}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12">Description<span class="required">*</span></label>
                            <div class="col-md-10 col-sm-10 col-xs-12">
                                <textarea name="description" class="form-control" rows="6" maxlength="500" placeholder="Type here . . . (Max 500 character)">{{ $tutoring_agency->description }}</textarea>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-3 col-xs-12">Tags</label>
                            <div class="col-md-10 col-sm-10 col-xs-12">
                                <textarea name="tags" id="tags-input" class="form-control tags" rows="3" maxlength="255">
                                @forelse($tutoring_agency->tags as $tags)
                                    {{ $tags }},
                                @empty
                                @endforelse
                                </textarea>
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
