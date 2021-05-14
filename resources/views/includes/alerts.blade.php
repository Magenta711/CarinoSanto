{{-- Status --}}
@if (session('status'))
    <div class="alert alert-info alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-info"></i> Información!</h4>
        {{ session('status') }}
  </div>
@endif
{{-- Success --}}
@if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-check"></i> Suceso!</h4>
        {{ $message }}
    </div>
@endif
{{-- Errors --}}
@if (count($errors) > 0)
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-ban"></i> Alerta!</h4>
        <ul>
            @foreach ($errors->all() as $error)
                @if ($error != '')
                    <li>{{ $error }}</li>
                @endif
            @endforeach
        </ul>
  </div>
@endif