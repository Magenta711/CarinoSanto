<!-- Modal -->
<div class="modal fade" id="modal_upload_{{$question->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1"
  aria-labelledby="modal_uploadLabel" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-scrollable modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal_uploadLabel">Upload files</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-left">
        <div class="container">
          <div class="row it">
            <div class="col-sm-offset-1 col-sm-10" id="one">
              <div class="row">
                <!--form-group-->
              </div>
              <!--row-->
              <div id="uploader">
                <div class="row uploadDoc">
                  <div class="col-md-3">
                    <div class="docErr" style="display: none">Please upload valid file</div>
                    <!--error-->
                    <div class="fileUpload btn btn-orange">
                      <img src="https://image.flaticon.com/icons/svg/136/136549.svg" width="40" class="icon">
                      <span class="upl" id="upload">Upload document</span>
                      <input type="file" class="upload up" id="up" onchange="readURL(this);">
                    </div><!-- btn-orange -->
                  </div><!-- col-3 -->
                  <div class="col-md-8">
                    <input type="text" class="form-control" name="" placeholder="Note">
                  </div>
                  <!--col-8-->
                  <div class="col-md-1"><a class="btn-check"><i class="fa fa-times"></i></a></div><!-- col-1 -->
                </div>
                <!--row-->
              </div>
              <!--uploader-->
              <div class="text-center">
                <a class="btn btn-new"><i class="fa fa-plus"></i> Add new</a>
                <a class="btn btn-next"><i class="fa fa-paper-plane"></i> Submit</a>
              </div>
            </div>
            <!--one-->
          </div><!-- row -->
        </div><!-- container -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-sm btn-primary">Save</button>
      </div>
      </form>
    </div>
  </div>
</div>