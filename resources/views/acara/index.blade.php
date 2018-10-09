@extends('layouts.master')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-10 ml-auto mr-auto">
      <div class="card card-calendar">
        <div class="card-body ">
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header card-header-primary">
          <div class="row">
            <div class="col-md-auto">
              <h4 class="card-title ">Tabel Data Acara</h4>
              <p class="card-category">Data acara yang telah diinput pada Raker Ormawa FT 2018-2019</p>
            </div>
            <div class="col-md-auto ml-auto">
              <a href="{{route('event.create')}}">
                <i class="material-icons" style="font-size: 48px; color: lightblue;">add_circle</i>
              </a>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="toolbar">
            <!--        Here you can write extra buttons/actions for the toolbar              -->
          </div>
          <ul class="nav nav-pills nav-pills-warning" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" data-toggle="tab" href="#tab_calendar" role="tablist">
                Calendar
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#tab_table" role="tablist">
                Table View
              </a>
            </li>
          </ul>

          <div class="tab-content tab-space">
            <div class="tab-pane active" id="tab_calendar">
              <div class="row">
                <div class="col-md-9 ml-auto mr-auto">
                  <div id="calendar"></div>
                </div>
              </div>
            </div>
            <div class="tab-pane" id="tab_table">
              <div class="material-datatables">
                <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                  <thead>
                    <tr>
                      <th>Nama Ormawa</th>
                      <th>Nama Acara</th>
                      <th>Tanggal Mulai</th>
                      <th>Tanggal Selesai</th>
                      <th class="disabled-sorting text-right">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($events as $e)
                      <tr>
                        <td>{!! $e->user->nama !!}</td>
                        <td>{!! $e->nama !!}</td>
                        <td>{!! date_format(date_create("$e->tanggal_mulai"), "d M Y") !!}</td>
                        <td>{!! date_format(date_create("$e->tanggal_selesai"), "d M Y") !!}</td>
                        @if(Auth::user()->username == "bemft" || $e->user_id == Auth::user()->id)
                        <td><a href='{!! route("event.edit", $e->id) !!}' class='btn btn-link btn-warning btn-just-icon edit'><i class='material-icons'>dvr</i></a>
                        <button type='submit' class='btn btn-link btn-danger btn-just-icon' 
                          onclick='delete_confirmation(event, "{!! route('event.destroy', $e->id) !!}")'><i class='material-icons'>close</i></button></td>
                        @else
                        <td>Action not allowed</td>
                        @endif
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!-- end content-->
      </div>
      <!--  end card  -->
    </div>
    <!-- end col-md-12 -->
  </div>
  <!-- end row -->
</div>
@endsection

@section('scripts')
<script type="text/javascript">
	$(document).ready(function(){
    $('#calendar').fullCalendar({
      events: [
        @foreach($events as $e)
        {
          @if(Auth::user()->username == "bemft" || $e->user_id == Auth::user()->id)
            url: "{!! route('event.edit', $e->id) !!}",
            tooltipext: " (Click to edit)",
          @endif
          title: "{!! $e->user->nama !!} - {!! $e->nama !!}",
          start: "{!! $e->tanggal_mulai!!}",
          @php
            $date = new DateTime("$e->tanggal_selesai");
            $date->modify("+1 day");
          @endphp
          end: "{!! $date->format('Y-m-d') !!}",
          color: "#{!! $e->user->color !!}"
        },
        @endforeach
      ],
      defaultView: 'month',
      nextDayThreshold: '00:00:00',
      header:{ 
        left: 'month,basicWeek,listWeek',
        center: 'title',
        right: 'today prev,next'
      },
      eventRender: function(event, element) {
        $(element).tooltip({title: event.title + (event.tooltipext ? event.tooltipext : "")});             
      },
      eventClick: function(event, jsEvent, view) {

      }
    });
	});
</script>

<script>
	$(document).ready(function(){
		$('#datatables').DataTable({
      "order": []
    });

	  var table = $('#datatables').DataTable();
	  // Delete a record
	  table.on('click', '.remove', function(e) {
	    $tr = $(this).closest('tr');
	    table.row($tr).remove().draw();
	    e.preventDefault();
	  });
    });
</script>
@endsection