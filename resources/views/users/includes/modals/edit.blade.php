<!-- Modal -->
<div class="modal fade" id="modal_edit_{{$item->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1"
  aria-labelledby="modal_edit_{{$item->id}}Label" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-scrollable modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal_edit_{{$item->id}}Label">{{__('Edit')}} {{__('user')}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('users_update',$item->id)}}" method="POST">
        @csrf
        @method('PUT')
      <div class="modal-body text-left">
        <div class="form-group">
            <label for="name">{{__('Name')}}</label>
            <input type="text" class="form-control" name="name" value="{{$item->name}}" id="name" placeholder="{{__('Name')}}">
        </div>
        <div class="form-group">
            <label for="email">{{__('E-Mail Address')}}</label>
            <input type="text" class="form-control" name="email" value="{{$item->email}}" id="email" placeholder="{{__('E-Mail Address')}}">
        </div>
        <div class="form-group">
            <label for="roles">Rol</label>
            <select name="roles" id="roles" class="form-control">
                <option selected disabled></option>
                @foreach ($roles as $rol)
                    <option {{ ($item->getRoleNames()[0] == $rol->name) ? 'selected' : '' }} value="{{$rol->id}}">{{$rol->name}}</option>
                @endforeach
            </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">{{__('Close')}}</button>
        <button type="submit" class="btn btn-sm btn-primary">{{__('Update')}}</button>
      </div>
      </form>
    </div>
  </div>
</div>