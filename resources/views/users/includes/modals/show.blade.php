<!-- Modal -->
<div class="modal fade" id="modal_show_{{$item->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1"
  aria-labelledby="modal_show_{{$item->id}}Label" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-scrollable modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal_show_{{$item->id}}Label">{{__('Show')}} {{__('user')}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-left">
        <div class="form-group">
            <p class="font-weight-bold">{{__('Name')}}</p>
            <p>{{$item->name}}</p>
        </div>
        <hr>
        <div class="form-group">
            <p class="font-weight-bold">{{__('E-Mail Address')}}</p>
            <p>{{$item->email}}</p>
        </div>
        <hr>
        <div class="form-group">
            <p class="font-weight-bold">Role</p>
            <p>{{$item->getRoleNames()[0] }}</p>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">{{__('Close')}}</button>
      </div>
    </div>
  </div>
</div>