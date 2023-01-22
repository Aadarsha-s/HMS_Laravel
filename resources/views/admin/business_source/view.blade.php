@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
   

    <!-- Content Row -->
        <div class="card">
            <div class="card-header py-3 d-flex">
                <h5 class="m-0 font-weight-bold text-primary">
                    {{ __('List of Business Source') }}
                </h5>
                <div class="ml-auto">
                    @can('business_source-create')
                    <a href="{{ route('admin.business_source.create') }}" class="btn btn-primary btn-sm">
                        <span class="icon text-white-50">
                            <i class="fa fa-plus"></i>
                        </span>
                        <span class="text">{{ __('Business Source') }}</span>
                    </a>
                    @endcan
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover datatable datatable-room" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Source</th>
                                <th>Apply Commission</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($business_sources as $business_source)
                            <tr data-entry-id="{{ $business_source->id }}">
                                <td></td>
                                <td>{{ $business_source->source }}</td>
                                <td>{{ $business_source->apply_commission }}</td>
                            
                                <td>
                                    {{-- <a href="{{ route('admin.rooms.show', $business_source->id) }}" class="btn btn-info">
                                        <i class="fa fa-eye"></i>
                                    </a> --}}
                                    @can('business_source-edit')
                                    <a href="{{ route('admin.business_source.edit', $business_source->id) }}" class="btn btn-success btn-circle btn-sm">
                                        <i class="fa fa-pencil-alt"></i>
                                    </a>
                                    @endcan

                                    @can('business_source-delete')
                                    <form onclick="return confirm('Are you sure ? ')" class="d-inline" action="{{ route('admin.business_source.destroy', $business_source->id) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger btn-circle btn-sm">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                    @endcan
                                </td>
                            </tr>
                            {{-- @empty
                            <tr>
                                <td colspan="9" class="text-center">{{ __('Data Empty') }}</td>
                            </tr> --}}
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
//   let dtother = {
//     text: buttons,
//     className: 'btn-sm',
//   }
  let deleteButtonTrans = 'Delete Selected'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.business_source.mass_destroy') }}",
    className: 'btn-danger btn-sm',
    action: function (e, dt, node, config) {
        @can('business_source-massDestroy')
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });
        @endcan
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