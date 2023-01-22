@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
   

    <!-- Content Row -->
        <div class="card">
            <div class="card-header py-3 d-flex">
                <h5 class="m-0 font-weight-bold text-primary">
                    {{ __('List of Found Items') }}
                </h5>
                <div class="ml-auto">
                    @can('founditems-create')
                    <a href="{{ route('admin.founditems.create') }}" class="btn btn-primary btn-sm">
                        <span class="icon text-white-50">
                            <i class="fa fa-plus"></i>
                        </span>
                        <span class="text">{{ __('Found Items') }}</span>
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
                                <th>Item Name</th>
                                <th>Room No</th>
                                <th>Found Date</th>
                                <th>Description</th>
                                <th>Found By</th>
                                <th>Reported To</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($founditems as $founditem)
                            <tr data-entry-id="{{ $founditem->id }}">
                                <td></td>
                                <td>{{ $founditem->item_name }}</td>
                                <td>{{ $founditem->room_number }}</td>
                                <td>{{ $founditem->found_date }}</td>   
                                <td>{{ substr(strip_tags( $founditem->description ), 0, 15) }}</td>
                                <td>{{ $founditem->found_by }}</td>
                                <td>{{ $founditem->reported_to }}</td>
                                <td>
                                    {{-- <a href="{{ route('admin.rooms.show', $founditem->id) }}" class="btn btn-info">
                                        <i class="fa fa-eye"></i>
                                    </a> --}}
                                    @can('founditems-edit')
                                    <a href="{{ route('admin.founditems.edit', $founditem->id) }}" class="btn btn-success btn-circle btn-sm">
                                        <i class="fa fa-pencil-alt"></i>
                                    </a>
                                    @endcan

                                    @can('founditems-delete')
                                    <form onclick="return confirm('Are you sure ? ')" class="d-inline" action="{{ route('admin.founditems.destroy', $founditem->id) }}" method="POST">
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
  let deleteButtonTrans = 'Delete selected'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.founditems.mass_destroy') }}",
    className: 'btn-danger btn-sm',
    action: function (e, dt, node, config) {
        @can('founditems-massDestroy')
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