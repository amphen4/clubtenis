@extends('socio.layout.gentelella')

@section('css')
<!-- FullCalendar -->
    <link href="{{ asset('templates/gentelella') }}/vendors/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet">
    <link href="{{ asset('templates/gentelella') }}/vendors/fullcalendar/dist/fullcalendar.print.css" rel="stylesheet" media="print">
@endsection

@section('content')

            
            <div class="row">
              <div class="col-md-6">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Cancha 1 <small>( wow )</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <div id="calendar"></div>

                  </div>
                </div>
              </div>
            </div>
          

<!-- calendar modal -->
    <div id="CalenderModalNew" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">New Calendar Entry</h4>
          </div>
          <div class="modal-body">
            <div id="testmodal" style="padding: 5px 20px;">
              <form id="antoform" class="form-horizontal calender" role="form">
                <div class="form-group">
                  <label class="col-sm-3 control-label">Title</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="title" name="title">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Description</label>
                  <div class="col-sm-9">
                    <textarea class="form-control" style="height:55px;" id="descr" name="descr"></textarea>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default antoclose" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary antosubmit">Save changes</button>
          </div>
        </div>
      </div>
    </div>
    <div id="CalenderModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel2">Edit Calendar Entry</h4>
          </div>
          <div class="modal-body">

            <div id="testmodal2" style="padding: 5px 20px;">
              <form id="antoform2" class="form-horizontal calender" role="form">
                <div class="form-group">
                  <label class="col-sm-3 control-label">Title</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="title2" name="title2">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Description</label>
                  <div class="col-sm-9">
                    <textarea class="form-control" style="height:55px;" id="descr2" name="descr"></textarea>
                  </div>
                </div>

              </form>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default antoclose2" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary antosubmit2">Save changes</button>
          </div>
        </div>
      </div>
    </div>

    <div id="fc_create" data-toggle="modal" data-target="#CalenderModalNew"></div>
    <div id="fc_edit" data-toggle="modal" data-target="#CalenderModalEdit"></div>
    <!-- /calendar modal -->
@endsection

@section('js')
<!-- FullCalendar -->
    <script src="{{ asset('templates/gentelella') }}/vendors/moment/min/moment.min.js"></script>
    <script src="{{ asset('templates/gentelella') }}/vendors/fullcalendar/dist/fullcalendar.min.js"></script>
    <script>
        /* CALENDAR */
      $(document).ready(function() {

        
          
        if( typeof ($.fn.fullCalendar) === 'undefined'){ return; }
        console.log('init_calendar');
          
        var date = new Date(),
          d = date.getDate(),
          m = date.getMonth(),
          y = date.getFullYear(),
          started,
          categoryClass;

        var calendar = $('#calendar').fullCalendar({
          header: {
          left: 'prev,next today',
          center: 'title',
          right: 'agendaDay,listDay'
          },
          /*slotDuration: '1:00:00' ,
          snapDuration: '1:00:00',*/
          selectable: true,
          selectHelper: true,
          select: function(start, end, allDay) {
          $('#fc_create').click();

          started = start;
          ended = end;

          $(".antosubmit").on("click", function() {
            var title = $("#title").val();
            if (end) {
            ended = end;
            }

            categoryClass = $("#event_type").val();

            if (title) {
            calendar.fullCalendar('renderEvent', {
              title: title,
              start: started,
              end: end,
              allDay: allDay
              },
              true // make the event "stick"
            );
            }

            $('#title').val('');

            calendar.fullCalendar('unselect');

            $('.antoclose').click();

            return false;
          });
          },
          /*eventClick: function(calEvent, jsEvent, view) {
          $('#fc_edit').click();
          $('#title2').val(calEvent.title);

          categoryClass = $("#event_type").val();

          $(".antosubmit2").on("click", function() {
            calEvent.title = $("#title2").val();

            calendar.fullCalendar('updateEvent', calEvent);
            $('.antoclose2').click();
          });

          calendar.fullCalendar('unselect');
          },*/
          editable: true,
          events: [{
          title: 'All Day Event',
          start: new Date(y, m, 1)
          }, {
          title: 'Long Event',
          start: new Date(y, m, d - 5),
          end: new Date(y, m, d - 2)
          }, {
          title: 'Meeting',
          start: new Date(y, m, d, 10, 30),
          allDay: false
          }, {
          title: 'Lunch',
          start: new Date(y, m, d + 14, 12, 0),
          end: new Date(y, m, d, 14, 0),
          allDay: false
          }, {
          title: 'Birthday Party',
          start: new Date(y, m, d + 1, 19, 0),
          end: new Date(y, m, d + 1, 22, 30),
          allDay: false
          }, {
          title: 'Click for Google',
          start: new Date(y, m, 28),
          end: new Date(y, m, 29),
          url: 'http://google.com/'
          }]
        });
        
      

    });  
    </script>  
@endsection