<!-- Modal -->
<div class="modal fade" id="modal_show_{{$item->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1"
  aria-labelledby="modal_show_{{$item->id}}Label" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal_show_{{$item->id}}Label">{{__('Show')}} rol</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-left">
        <div class="row">
          <div class="col-md-12">
            <h3>{{$item->name}}</h3>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <strong>Permisos:</strong>
              <ul class="list-group">
                  @foreach($item->permissions as $permission)
                    <li class="list-group-item">{{ $permission->name }}</li>
                  @endforeach
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">{{__('Close')}}</button>
      </div>
    </div>
  </div>
</div>
</div>