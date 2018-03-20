<div class="modal user-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xs">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="user-modal-label"></h4>
            </div>
            <form method="POST" class="form-horizontal form-label-left input_mask">
                {{ csrf_field() }}
                {{ method_field('POST') }}
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Name<span class="required">*</span></label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                            <input type="text" name="name" class="form-control col-md-7 col-xs-12" maxlength="255" required>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Email<span class="required">*</span></label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                            <input type="email" name="email" class="form-control col-md-7 col-xs-12" maxlength="255" required>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Status<span class="required">*</span></label>
                        <div class="col-md-5 col-sm-5 col-xs-12">
                            <label class="radio-inline"><input type="radio" name="status" id="status-1" value="1" required>Verified</label>
                            <label class="radio-inline"><input type="radio" name="status" id="status-0" value="0" required>Unverified</label>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Phone</label>
                        <div class="col-md-5 col-sm-5 col-xs-12">
                            <input type="number" name="phone" class="form-control col-md-7 col-xs-12" maxlength="12">
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Address</label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                            <textarea name="address" class="form-control" rows="2"></textarea>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" id="user-modal-btn"></button>
                </div>
            </form>
        </div>
    </div>
</div>