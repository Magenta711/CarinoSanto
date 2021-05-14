<!-- Modal -->
<div class="modal fade" id="modal_edit_{{$item->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1"
  aria-labelledby="modal_edit_{{$item->id}}Label" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal_edit_{{$item->id}}Label">{{__('Edit')}} rol</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('roles_update',$item->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="modal-body text-left">
          <div class="form-group">
            <strong>{{__('Name')}}:</strong>
            <input type="text" name="name" class="form-control" value="{{$item->name}}" placeholder="Nombre">
          </div>
          <div class="form-group">
            <strong>{{__('Permission')}}:</strong>
            <ul class="list-group">
              @foreach($permission as $value)
              <li class="list-group-item">
                <label>
                  <input type="checkbox" name="permission[]" class="name"  value="{{$value->id}}" {{ $item->hasPermissionTo($value->name) ? 'checked' : '' }}>
                  {{ $value->name }}
                </label>
              </li>
              @endforeach
            </ul>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">{{__('Close')}}</button>
          <button class="btn btn-sm btn-success">{{__('Update')}}</button>
        </div>
      </form>
    </div>
  </div>
</div>