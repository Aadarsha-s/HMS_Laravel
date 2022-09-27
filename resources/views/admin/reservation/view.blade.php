@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
   

    <!-- Content Row -->
        <div class="card">
            <div class="card-header py-3 d-flex">
                <h3 class="m-0 font-weight-bold text-primary">
                    {{ __('List of Reservation') }}
                </h3>
                <div class="ml-auto">
                    {{-- @can('room_create') --}}
                    <a href="{{ route('admin.reservation.create') }}" class="btn btn-primary">
                        <span class="icon text-white-50">
                            <i class="fa fa-plus"></i>
                        </span>
                        <span class="text">{{ __('Reservation') }}</span>
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
                                <th>reservation_for</th> 
                                <th>reservation_type</th>
                                <th>first_name</th>
                                <th>middle_name</th>            
                                <th>last_name</th>
                                <th>address</th>
                                <th>contact</th>
                                <th>email</th>
                                <th>payment_mode</th>
                                <th>total_rate</th>
                                <th>arrival_date</th>
                                <th>arrival_time</th>
                                <th>departure_date</th>
                                <th>departure_time</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($reservations as $reservation)
                            <tr data-entry-id="{{ $reservation->id }}">
                                <td></td>
                                <td>{{ $reservation->reservation_for }}</td> 
                                <td>{{ $reservation->reservation_type }}</td>
                                <td>{{ $reservation->first_name }}</td>
                                <td>{{ $reservation->middle_name }}</td>            
                                <td>{{ $reservation->last_name }}</td>
                                <td>{{ $reservation->address }}</td>
                                <td>{{ $reservation->contact}}</td>
                                <td>{{ $reservation->email }}</td>
                                <td>{{ $reservation->payment_mode }}</td>
                                <td>{{ $reservation->total_rate}}</td>
                                <td>{{ $reservation->arrival_date}}</td>
                                <td>{{ $reservation->arrival_time}}</td>
                                <td>{{ $reservation->departure_date}}</td>
                                <td>{{ $reservation->departure_time}}</td>
                              
                                
                                <td>
                                    <a href="{{ route('admin.rooms.show', $reservation->id) }}" class="btn btn-info">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.reservation.edit', $reservation->id) }}" class="btn btn-info">
                                        <i class="fa fa-pencil-alt"></i>
                                    </a>
                                    <form onclick="return confirm('Are you sure ? ')" class="d-inline" action="{{ route('admin.reservation.destroy', $reservation->id) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
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
    url: "{{ route('admin.reservation.mass_destroy') }}",
    className: 'btn-danger',
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