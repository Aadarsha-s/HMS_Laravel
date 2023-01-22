@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <!-- Content Row -->
        <div class="card">
            <div class="card-header py-3 d-flex">
                <h5 class="m-0 font-weight-bold text-primary">
                    {{ __('Permission') }}
                </h5>
                <div class="ml-auto">
                    @can('permission-create')
                    <a href="{{ route('admin.permissions.create') }}" class="btn btn-primary btn-sm">
                        <span class="icon text-white-50">
                            <i class="fa fa-plus"></i>
                        </span>
                        <span class="text">{{ __('New permission') }}</span>
                    </a>
                    @endcan
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover datatable datatable-Permission" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th></th>
                                <th>No</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $permission)
                            <tr>
                                <td></td>
                                <td>{{ $permission->id }}</td>
                                <td>{{ $permission->name }}</td>
                                <td>
                                    {{-- <a class="btn btn-success" href="{{ route('admin.permissions.show',$permission->id) }}">Show</a> --}}
                                    @can('role-edit')
                                        <a class="btn btn-success btn-circle btn-sm" href="{{ route('admin.permissions.edit',$permission->id) }}">
                                            <i class="fa fa-pencil-alt"></i>
                                        </a>
                                    @endcan
                                    @can('role-delete')
                                        {{-- {!! Form::open(['method' => 'DELETE','route' => ['admin.permissions.destroy', $permission->id],'style'=>'display:inline']) !!}
                                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-circle']) !!}
                                        <i class="fa fa-pencil-alt"></i>
                                        {!! Form::close() !!} --}}
                                        <form onclick="return confirm('Are you sure ? ')" class="d-inline" action="{{ route('admin.permissions.destroy', $permission->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger btn-circle btn-sm">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{-- {{ $data->appends($_GET)->links() }} --}}
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
    url: "{{ route('admin.permissions.mass_destroy') }}",
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
    pageLength: 10,
  });
  $('.datatable-Permission:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})
</script>
@endpush