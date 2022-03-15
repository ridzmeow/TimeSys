<!-- MODAL -->
<div class="modal fade" id="postmdl" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="width: 30%;">
        <div class="modal-content">
        <form action="javascript:void(0)" id="postform" name="postform" class="form-horizontal" method="POST">
            @csrf
            <div class="modal-header">
                <h4 class="modal-title" id="postmdl-title"></h4>
            </div>
            <div class="modal-body">
                <input type="hidden" name="id" id="id">
                <div class="row form-group">
                    <label class="col-sm-4">Post Date<span class="require">*</span> :</label>
                    <div class="col-sm-8">
                        <input type="date" class="form-control" id="event_date" name="event_date" required>
                    </div>
                </div>  
                <div class="row form-group mt-2">
                    <label class="col-sm-4">Post No.<span class="require">*</span> :</label>
                    <div class="col-sm-8">
                        <select name="post_no" id="post_no" class="custom-select form-control" required>
                            <option selected disabled value="">Select post number</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                    </div>
                </div> 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary" id="btnSubmit">Save</button>
            </div>
        </form>
        </div>
    </div>
</div>