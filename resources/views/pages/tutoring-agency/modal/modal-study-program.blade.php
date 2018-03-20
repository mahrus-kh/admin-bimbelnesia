<div class="modal study-program-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xs">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="study-program-modal-label"></h4>
            </div>
            <form method="POST" class="form-horizontal form-label-left" data-toggle="validator">
                {{ csrf_field() }}
                {{ method_field('POST') }}
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Study Program<span class="required">*</span></label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text" name="study_program" class="form-control col-md-7 col-xs-12" minlength="5" maxlength="255" required>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Cost (Rp.)</label>
                        <div class="col-md-5 col-sm-5 col-xs-12">
                            <input type="number" name="cost" class="form-control col-md-7 col-xs-12">
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" id="study-program-modal-btn"></button>
                </div>
            </form>
        </div>
    </div>
</div>