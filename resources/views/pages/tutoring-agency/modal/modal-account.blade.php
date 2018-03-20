<div class="modal account-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xs">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Account Login</h4>
            </div>
            <form method="POST" class="form-horizontal form-label-left input_mask">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Study Program<span class="required">*</span></label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                            <input type="email" name="email_account" class="form-control col-md-7 col-xs-12" maxlength="255" required>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Password<span class="required">*</span></label>
                        <div class="col-md-5 col-sm-5 col-xs-12">
                            <input type="password" name="password" class="form-control col-md-7 col-xs-12" minlength="6" maxlength="255" required>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">UPDATE</button>
                </div>
            </form>
        </div>
    </div>
</div>