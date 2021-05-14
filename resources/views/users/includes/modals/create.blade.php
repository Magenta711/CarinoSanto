<!-- Modal -->
<div class="modal fade" id="modal_create" data-backdrop="static" data-keyboard="false" tabindex="-1"
  aria-labelledby="modal_createLabel" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-scrollable modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal_createLabel">Create user</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('users_store')}}" method="POST">
        @csrf
      <div class="modal-body text-left">
        <div class="form-group">
            <label for="name">{{__('Name')}}</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Name">
        </div>
        <div class="form-group">
            <label for="email">{{__('E-Mail Address')}}</label>
            <input type="text" class="form-control" name="email" id="email" placeholder="{{__('E-Mail Address')}}">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <div class="input-group mb-3">
                <input type="password" class="form-control" name="password" placeholder="{{__('Password')}}" -describedby="button-addon2">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button" id="button-addon2"><i class="fas fa-eye"></i></button>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="roles">Rol</label>
            <select name="roles" id="roles" class="form-control">
                <option selected disabled></option>
                @foreach ($roles as $rol)
                    <option value="{{$rol->id}}">{{$rol->name}}</option>
                @endforeach
            </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">{{__('Close')}}</button>
        <button type="submit" class="btn btn-sm btn-primary">{{__('Save')}}</button>
      </div>
      </form>
    </div>
  </div>
</div>