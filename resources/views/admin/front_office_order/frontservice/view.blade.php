@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- Content Row -->
        <div class="card">
            <div class="card-header py-3 d-flex">
                <h5 class="m-0 font-weight-bold text-primary">
                    {{ __('List of FrontService') }}
                </h5>
                <div class="ml-auto">
                    {{-- @can('room1-create') --}}
                    <a href="{{ route('admin.frontservice.create') }}" class="btn btn-dark btn-sm">
                        <span class="icon text-white-50">
                            <i class="fa fa-plus"></i>
                        </span>
                        <span class="text">{{ __('New Service') }}</span>
                    </a>

                    <a href="{{ route('admin.front_office_order.create') }}" class="btn btn-primary btn-sm">
                        
                        <span class="text">{{ __('Go Back') }}</span>
                    </a>

                    {{-- @endcan --}}
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover datatable datatable-room" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Service</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($frontservices as $frontservice)
                            <tr>
                                <td></td>
                                <td>{{$frontservice->service}}</td>
                                <td>
                                    <a href="{{ route('admin.frontservice.edit', $frontservice->id) }}" class="btn btn-success btn-circle btn-sm">
                                        <i class="fa fa-pencil-alt"></i>
                                    </a>
                                    <form onclick="return confirm('Are you sure ? ')" class="d-inline" action="{{ route('admin.frontservice.destroy', $frontservice->id) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger btn-circle btn-sm">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                    
                                </td>
                            </tr>
                            
                        @endforeach    
                        </tbody> 
                    </table>
                </div>
            </div>
        </div>
    <!-- Content Row -->

</div>
@endsection

@push('script-alt')
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
  let deleteButtonTrans = 'Delete selected'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.bedtype.mass_destroy') }}",
    className: 'btn-danger btn-sm',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });
      if (ids.length === 0) {
        alert('zero selected')
        return
      }
      if (confirm('Are you sure ?')) {
        $.ajax({
          headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
  $.extend(true, $.fn.dataTable.defaults, {
    order: [[ 1, 'asc' ]],
    pageLength: 50,
  });
  $('.datatable-room:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})
</script>
@endpush