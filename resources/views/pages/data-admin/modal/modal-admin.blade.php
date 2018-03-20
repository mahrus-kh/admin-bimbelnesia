<div class="modal admin-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
            </div>
            <form method="POST" class="form-horizontal form-label-left input_mask">
                {{ csrf_field() }}
                {{ method_field('POST') }}
                <div class="modal-body">
                    <div class="form-group">
                        <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                            <input type="text" name="name" class="form-control has-feedback-left" placeholder="Name" maxlength="255" required>
                            <span class="fa fa-lock form-control-feedback left" aria-hidden="true"></span>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                            <input type="email" name="email" class="form-control has-feedback-left" placeholder="Email" maxlength="255" required>
                            <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" id="admin-modal-btn"></button>
                </div>
            </form>
        </div>
    </div>
</div>