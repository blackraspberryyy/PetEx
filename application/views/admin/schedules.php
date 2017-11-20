<style>
    .containerCal{
        width:95% !important;
        padding-top: 25px;
    }
    .fc-header-toolbar .fc-button .fc-state-active{
        background: #000 !important;
    }
    .fc-today {
        background:#a5d6a7 !important;
    }
    .fc-day-top{
        background: #a5d6a7 !important;
        border-radius: 0px !important;
    }
    .fc-event {
        font-size: inherit !important;
        font-weight: bold !important;
        cursor: pointer;
    }
    .fc-future{
        cursor: pointer;
    }
    .fc-widget-content{
        cursor: pointer;
    }
    .fc td, .fc th {
        border-style: none !important;
        border-width: 1px !important;
        vertical-align: top !important;
    }
    .pulse::before{ 
        -webkit-animation: pulse-animation 1s cubic-bezier(0.24, 0, 0.38, 1) 1 !important;
        animation: pulse-animation 1s cubic-bezier(0.24, 0, 0.38, 1) 1 !important;
    }
    .small{
        height:200px !important;
    }
    .radio{
        display:inline-block;
        width:40px;
        min-height: 10px;
        height: 40px;
        max-height: 40px;
        border-radius: 100%;
        border: 4px solid #fff;
        cursor:pointer;
    }
    .radio.selected{
        border-color:#2e7d32;
    }
    .colors{
        padding-top:20px !important;
    }
    .modal.modal-fixed-footer{
        height:90% !important;
    }
    button:focus{
        background:#ccc !important;
    }
    .btn-link{
        border:none;
        outline:none;
        background:none;
        cursor:pointer;
        padding:0px 28px;
        font-family:inherit;
        font-size:inherit;
    }
</style>
<script>
    $(document).ready(function () {
        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay,listWeek'
            },
            handleWindowResize: true,
            weekends: true, // Show weekends
            //navLinks: true,  //can click day/week names to navigate views
            timeFormat: 'hh:mm A',
            editable: false,
            droppable: false,
            eventLimit: true, // allow "more" link when too many events
            displayEventTime: true,
            allDayText: 'Events/Activity',
            allDay: "",
            dayClick: function (date, jsEvent, view) {
                if(moment().date() > date.date()){
                   alert("You cannot set a schedule before the current date!");
                }else{
                    $('#eventForm')[0].reset();
                    $('#event_startDate').val(date.format("MMMM D, YYYY"));
                    $('#event_header').html('Add a schedule');
                    $('#sendReq').css({"display": "inline-block"});
                    $('#updateReq').css({"display": "none"});
                    $('#deleteReq').css({"display": "none"});
                    $("#event_startDate").prop("disabled", false);
                    $("#event_startTime").prop("disabled", false);
                    $("#event_endDate").prop("disabled", false);
                    $("#event_endTime").prop("disabled", false);
                    $('#customEvent').modal('open');
                }    
            },
            eventClick: function (calEvent, jsEvent, view) {
                console.log(calEvent.schedule_id);
                $.ajax({
                    "method": "POST",
                    "url": '<?= base_url()?>' + "admin/getsched/",
                    "dataType": "JSON",
                    "data": {
                        'id': calEvent.schedule_id
                    },
                    success: function (res) {
                        $('#event_header').html('Manage schedule');
                        $('#sendReq').css({"display": "none"});
                        $('#updateReq').css({"display": "inline-block"});
                        $('#deleteReq').css({"display": "inline-block"});
                        $("#event_id").val(res[0].schedule_id);
                        $("#event_name").val(res[0].schedule_title);
                        $("#event_description").val(res[0].schedule_desc);
                        $("#event_color").val(res[0].schedule_color);
                        $("#event_startDate").val(res[0].schedule_startdate);
                        $("#event_startDate").prop("disabled", true);
                        $("#event_startTime").val(res[0].schedule_starttime);
                        $("#event_startTime").prop("disabled", true);
                        $("#event_endDate").val(res[0].schedule_enddate);
                        $("#event_endDate").prop("disabled", true);
                        $("#event_endTime").val(res[0].schedule_endtime);
                        $("#event_endTime").prop("disabled", true);
                        $('#customEvent').modal('open');
                    }
                });
            },
            events: {
                method: "POST",
                url: '<?= base_url() ?>' + 'admin/getscheds/',
                dataType: 'JSON',
            },
            eventRender: function (event, element) {
                //element.css({"height":"30px"});
            }
        });
        
        $(document).on('click', '#sendReq', function () {
            $.ajax({
                "method": "POST",
                "url": '<?= base_url()?>' + "admin/setreserve/",
                "dataType": "JSON",
                "data": {
                    'schedule_title': $("#event_name").val(),
                    'schedule_desc': $("#event_description").val(),
                    'schedule_color': $("#event_color").val(),
                    'schedule_startdate': $("#event_startDate").val(),
                    'schedule_starttime': $("#event_startTime").val(),
                    'schedule_enddate': $("#event_endDate").val(),
                    'schedule_endtime': $("#event_endTime").val()
                },
                success: function (res) {
                    if (res.success) {
                        location.reload();
                    } else {
                        alert(res.result);
                    }

                }
            });

        });
        
        $(document).on('click', '#updateReq', function () {
            $.ajax({
                "method": "POST",
                "url": "<?= base_url()?>" + "admin/updatereserve/",
                "dataType": "JSON",
                "data": {
                    'schedule_id': $("#event_id").val(),
                    'schedule_title': $("#event_name").val(),
                    'schedule_desc': $("#event_description").val(),
                    'schedule_color': $("#event_color").val(),
                    'schedule_startdate': $("#event_startDate").val(),
                    'schedule_starttime': $("#event_startTime").val(),
                    'schedule_enddate': $("#event_endDate").val(),
                    'schedule_endtime': $("#event_endTime").val()
                },
                success: function (res) {
                    if (res.success) {
                        location.reload();
                    } else {
                        alert(res.result);
                    }
                }
            });
        });
        
        $(document).on('click', '#deleteReq', function () {
            $.ajax({
                "method": "POST",
                "url": "<?= base_url()?>" + "admin/deletereserve/",
                "dataType": "JSON",
                "data": {
                    'schedule_id': $("#event_id").val(),
                    'schedule_title': $("#event_name").val(),
                    'schedule_desc': $("#event_description").val(),
                    'schedule_color': $("#event_color").val(),
                    'schedule_startdate': $("#event_startDate").val(),
                    'schedule_starttime': $("#event_startTime").val(),
                    'schedule_enddate': $("#event_endDate").val(),
                    'schedule_endtime': $("#event_endTime").val()
                },
                success: function (res) {
                    if (res.success) {
                        location.reload();
                    } else {
                        alert(res.result);
                    }
                }
            });
        });
        
        
    });
    </script>
<div class ="side-nav-offset">
    <div class ="container containerCal">
        <div id="calendar"></div>
    </div>
</div>

<!-- Custom Event Structure -->
<div id="customEvent" class="modal modal-fixed-footer">
    <form role = "form" id = "eventForm">
        <div class="modal-content">
            <h4 id = "event_header">Add Event</h4>
            <div class ="row">
                <input type ="hidden" name = "event_id" id = "event_id"/>
                <div class = "col s6">
                    <div class="card small grey lighten-4">
                        <div class="card-content">
                            <div class="input-field green-theme">
                                <input placeholder=" " id="event_name" type="text" class="validate" autofocus="" >
                                <label for = "event_name">Event Title</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class = "col s6">
                    <div class="card small grey lighten-4">
                        <div class="card-content colors center">
                            <span class = "card-title" style = "padding-bottom:5px;">Event Color</span>
                            <div class = "radio selected" style = "background:#3a87ad;" data-value="#3a87ad"></div>
                            <div class = "radio green darken-4" data-value="#1b5e20"></div>
                            <div class = "radio yellow darken-2" data-value="#fbc02d"></div>
                            <div class = "radio pink darken-1" data-value="#d81b60"></div>
                            <div class = "radio purple darken-2" data-value="#7b1fa2"></div>
                            <div class = "radio blue darken-1" data-value="#1976d2"></div>
                            <div class = "radio red darken-1" data-value="#e53935"></div>
                            <div class = "radio teal darken-1" data-value="#00897b"></div>
                            <div class = "radio orange darken-4" data-value="#e65100"></div>
                            <div class = "radio brown darken-1" data-value="#6d4c41"></div>
                            <div class = "radio indigo darken-1" data-value="#3949ab"></div>
                            <div class = "radio amber darken-1" data-value="#ffb300"></div>
                            <input type="hidden" id="event_color" name="event_color" value = "#3a87ad"/>
                        </div>
                    </div>
                </div>
                <div class = "col s6">
                    <div class="card grey lighten-4">
                        <div class="card-content">
                            <div class="input-field green-theme" id = "startDateInputField">
                                <input type="text" class="datepicker datepickerSched" id = "event_startDate" name = "event_startDate" placeholder=" " >
                                <label for="event_startDate">Start Date</label>
                            </div>
                            <div class="input-field green-theme" id = "startDateInputField">
                                <input type="text" class="timePicker timepickerSched" id = "event_startTime" name = "event_startTime" placeholder=" " >
                                <label for="event_startTime">Time</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class = "col s6">
                    <div class="card grey lighten-4">
                        <div class="card-content">
                            <div class="input-field green-theme" id = "endDateInputField">
                                <input type="text" class="datepicker datepickerSched" id = "event_endDate" name = "event_endDate" placeholder = " " >
                                <label for="event_endDate">End Date</label>
                                <div class="input-field green-theme" id = "startDateInputField">
                                    <input type="text" class="timePicker timepickerSched" id = "event_endTime" name = "event_endTime" placeholder=" " >
                                    <label for="event_endTime">Time</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class = "col s12">
                    <div class="card grey lighten-4">
                        <div class="card-content">
                            <div class="input-field green-theme">
                                <textarea id="event_description" name = "event_description" class="materialize-textarea" placeholder=" "></textarea>
                                <label for="event_description">Event Description</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <a href="#" class="modal-action modal-close waves-effect waves-green btn-flat ">Cancel</a>
            <button id = "sendReq" class="btn-link modal-action modal-close waves-effect waves-green btn-flat green-text">Add Event</button>
            <button id = "deleteReq" class="btn-link modal-action modal-close waves-effect waves-green btn-flat red-text">Delete</button>
            <button id = "updateReq" class="btn-link modal-action modal-close waves-effect waves-green btn-flat green-text">Update</button>
        </div>
    </form>
</div>

<script>
    $("#menuBtn").click(function () {
        $(this).toggleClass("pulse");
    });
    $('.colors .radio').click(function () {
        $(this).parent().find('.radio').removeClass('selected');
        $(this).addClass('selected');
        var val = $(this).attr('data-value');
        $(this).parent().find('input').val(val);
    });
</script>

<script>
    $('.datepicker').pickadate({
        selectMonths: false, // Creates a dropdown to control month
        selectYears: true, // Creates a dropdown of 15 years to control year,
        format: 'mmmm dd, yyyy',
        min: 'Today',
        today: 'Today',
        clear: 'Clear',
        close: 'Ok',
        closeOnSelect: false // Close upon selecting a date,
    });
</script>
<script>
    $('.timepicker').pickatime({
       default: 'now', // Set default time: 'now', '1:30AM', '16:30'
       fromnow: 0,       // set default time to * milliseconds from now (using with default = 'now')
       twelvehour: true, // Use AM/PM or 24-hour format
       min: 'Today',
       format: 'h:i A',
       donetext: 'OK', // text for done-button
       cleartext: 'Clear', // text for clear-button
       canceltext: 'Cancel', // Text for cancel-button
       autoclose: false, // automatic close timepicker
       ampmclickable: true, // make AM PM clickable
       aftershow: function(){} //Function for after opening timepicker
     });
</script>