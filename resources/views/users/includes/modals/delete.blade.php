<!-- Modal -->
<div class="modal fade" id="modal_delete_{{$item->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1"
  aria-labelledby="modal_deleteLabel" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-scrollable modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal_deleteLabel">{{__('Delete')}} {{__('user')}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('users_delete',$item->id)}}" method="POST">
        @csrf
        @method('DELETE')
      <div class="modal-body text-left">
        <p>{{__('Are you sure you want to delete to')}} {{$item->name}}?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">{{__('Close')}}</button>
        <button type="submit" class="btn btn-sm btn-primary">{{__('Delete')}}</button>
      </div>
      </form>
    </div>
  </div>
</div>