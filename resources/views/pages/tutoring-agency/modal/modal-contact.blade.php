<div class="modal contact-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xs">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Contacts</h4>
            </div>
            <form method="POST" class="form-horizontal form-label-left input_mask">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}
                <div class="modal-body">
                    <div class="form-group">
                        <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                            <input type="text" name="website" class="form-control has-feedback-left" placeholder="Website" maxlength="255">
                            <span class="fa fa-globe form-control-feedback left" aria-hidden="true"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                            <input type="text" name="office_phone" class="form-control has-feedback-left" placeholder="Office Phone" maxlength="255">
                            <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                            <input type="text" name="mobile_phone" class="form-control has-feedback-left" placeholder="Mobile Phone" maxlength="12">
                            <span class="fa fa-mobile form-control-feedback left" aria-hidden="true"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                            <input type="email" name="email" class="form-control has-feedback-left" placeholder="Email" maxlength="255">
                            <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                            <input type="text" name="facebook" class="form-control has-feedback-left" placeholder="Facebook URL" maxlength="255">
                            <span class="fa fa-facebook form-control-feedback left" aria-hidden="true"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                            <input type="text" name="instagram" class="form-control has-feedback-left" placeholder="Instagram URL" maxlength="255">
                            <span class="fa fa-instagram form-control-feedback left" aria-hidden="true"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                            <textarea name="other_contacts" class="form-control" rows="2" placeholder="Other Contact" maxlength="255"></textarea>
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