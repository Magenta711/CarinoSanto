<!-- Modal -->
<div class="modal fade" id="modal_create" data-backdrop="static" data-keyboard="false" tabindex="-1"
  aria-labelledby="modal_createLabel" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-scrollable modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal_createLabel">Create role</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('roles_store')}}" method="POST">
        @csrf
      <div class="modal-body text-left">
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                  <strong>{{__('Name')}}:</strong>
                  <input type="text" name="name" class="form-control" placeholder="{{__('Name')}}" value="{{old('name')}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>{{__('Permission')}}:</strong>
              <ul class="list-group">
                @foreach($permission as $value)
                  <li class="list-group-item">
                    <input type="checkbox" name="permission[]" class="name" value="{{$value->id}}">
                    {{ $value->name }}
                  </li>
                @endforeach
              </ul>
            </div>
          </div>
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