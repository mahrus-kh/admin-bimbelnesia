<div class="modal sub-category-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="sub-category-modal-label"></h4>
            </div>
            <form method="POST" class="form-horizontal form-label-left input_mask">
                {{ csrf_field() }}
                {{ method_field('POST') }}
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" name="sub_category" class="form-control" minlength="3" maxlength="255" placeholder="Sub Category" autocomplete="off" autofocus required>
                        <span class="help-block with-errors"></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success" id="sub-category-modal-btn"></button>
                </div>
            </form>
        </div>
    </div>
</div>