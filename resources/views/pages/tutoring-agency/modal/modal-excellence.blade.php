<div class="modal excellence-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xs">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="excellence-modal-label"></h4>
            </div>
            <form method="POST" class="form-horizontal form-label-left" data-toggle="validator">
                {{ csrf_field() }}
                {{ method_field('POST') }}
                <div class="modal-body">
                    <div class="form-group">
                        <textarea name="excellence" class="form-control" rows="3" placeholder="Type here . . . (Max 255 character)" minlength="5" maxlength="255" autofocus required></textarea>
                        <span class="help-block with-errors"></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" id="excellence-modal-btn"></button>
                </div>
            </form>
        </div>
    </div>
</div>