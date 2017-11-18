<style>
    .containerCal{
        width:95% !important;
        padding-top: 25px;
    }
    .fc-header-toolbar .fc-button .fc-state-active{
        background: #000 !important;
    }
    .fc-today {
        background:#c8e6c9 !important;
    }
    .fc-event {
        font-size: inherit !important;
        font-weight: bold !important;
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
</style>

<div class ="side-nav-offset">
    <div class ="container containerCal">
        <div id="calendar"></div>
    </div>
    <div class="fixed-action-btn vertical click-to-toggle">
        <a class="btn-floating btn-large yellow darken-1 z-depth-2" id = "menuBtn">
            <i class="material-icons black-text">add</i>
        </a>
        <ul>
            <li><a class="btn-floating green darken-4 tooltipped modal-trigger" href="#customEvent" data-position="left" data-delay="10" data-tooltip="Add an Event"><i class="material-icons">cake</i></a></li>
        </ul>
    </div>
</div>

<!-- Custom Event Structure -->
<div id="customEvent" class="modal modal-fixed-footer">
    <form action = "<?= base_url()?>admin/schedule_add" method = "POST">
        <div class="modal-content">
            <h4><i class = "fa fa-calendar-plus-o"></i> Add Event</h4>
            <div class ="row">
                <div class = "col s6">
                    <div class="card small grey lighten-4">
                        <div class="card-content">
                            <div class="input-field green-theme">
                                <input placeholder=" " id="event_name" type="text" class="validate" autofocus="" >
                                <label for = "event_name">Event Title</label>
                            </div>
                            <div class = "tooltipped green-theme" data-position="bottom" data-delay="50" data-tooltip="Check if the event will be held all day long">
                                <input type="checkbox" class="filled-in" name = "event_allDay" id="event_allDay" />
                                <label for="event_allDay">All Day</label>
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
                                <input type="text" class="datepicker datepickerSched" id = "event_startDate" name = "event_startDate" placeholder=" ">
                                <label for="event_startDate">Start Date</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class = "col s6">
                    <div class="card grey lighten-4">
                        <div class="card-content">
                            <div class="input-field green-theme" id = "endDateInputField">
                                <input type="text" class="datepicker datepickerSched" id = "event_endDate" name = "event_endDate" placeholder = " ">
                                <label for="event_endDate">End Date</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class = "col s12">
                    <div class="card grey lighten-4">
                        <div class="card-content">
                            <div class="input-field green-theme">
                                <textarea id="event_description" name = "event_description" class="materialize-textarea"></textarea>
                                <label for="event_description">Event Description</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <a href="#" class="modal-action modal-close waves-effect waves-green btn-flat ">Cancel</a>
            <a href="#" class="modal-action modal-close waves-effect waves-green btn-flat green-text">Add Event</a>
        </div>
    </form>
</div>

<script>
    $("#menuBtn").click(function() {
        $(this).toggleClass("pulse");
    });
    
    $("#event_allDay").click(function(){
        if($("#endDateInputField input, #startDateInputField input").prop("disabled")){
            //All Day disabled
            $("#endDateInputField input, #startDateInputField input").prop("disabled", false);
            $("#endDateInputField input, #startDateInputField input").prop("value", "")
        }else{
            //All Day enabled
            $("#endDateInputField input, #startDateInputField input").prop("disabled", true);
            $("#endDateInputField input, #startDateInputField input").prop("value", "--All Day--")
        }
        
    });
    
    $('.colors .radio').click(function(){
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
        today: 'Today',
        clear: 'Clear',
        close: 'Ok',
        closeOnSelect: false // Close upon selecting a date,
    });
</script>