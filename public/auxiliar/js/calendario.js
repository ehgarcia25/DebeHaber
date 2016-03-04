/**
 * Created by Cognitivo on 2/17/2016.
 */


$(document).ready(function () {
    var currentLangCode = 'es';

    function renderCalendar() {
        $('#calendar').fullCalendar({

            lang: currentLangCode,
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },


            editable: true,

            eventLimit: true,
            events: {
                url: 'http://debehaber.com/calendario_prueba',
                error: function() {
                    $('#script-warning').show();
                }
            },
            loading: function(bool) {
                $('#loading').toggle(bool);
            },

            // Convert the allDay from string to boolean
            eventRender: function(event, element, view) {
                if (event.allDay === 'true') {
                    event.allDay = true;
                } else {
                    event.allDay = false;
                }
            },



            //añadir_evento
            selectable: true,
            selectHelper: true,
            select: function(start, end, allDay) {

                var title = prompt('Event Title:');
                //  var url = prompt('Type Event url, if exits:');
                if (title) {
                    var start =moment(start).format('YYYY-MM-DD hh:mm:ss');
                    var end = moment(end).format('YYYY-MM-DD hh:mm:ss');

                    $.ajax({
                        url: 'http://debehaber.com/add_evento',
                        data: 'title='+ title+'&start='+ start +'&end='+ end,
                        type: "get",
                        success: function(json) {



                            // alert('Added Successfully');
                            //$('#calendar').fullCalendar('refetchEvents');
                            //// not helping either
                            //$('#calendar').fullCalendar('rerenderEvents');

                        }

                    });
                    $('#calendar').fullCalendar('renderEvent',
                        {

                            title: title,
                            start: start,
                            end: end,
                            allDay: allDay,
                            editable: true,
                            eventDurationEditable: true,
                        },
                        true // make the event "stick"
                    );
                    $('#calendar').fullCalendar('unselect')

                }

            },
            //editar

            eventDrop: function(event, delta) {
                var start =moment(event.start).format('YYYY-MM-DD hh:mm:ss');
                var end = moment(event.end).format('YYYY-MM-DD hh:mm:ss');
                $.ajax({
                    url: 'http://debehaber.com/update_evento',
                    data: 'title='+ event.title+'&start='+ start +'&end='+ end +'&id='+ event.id ,
                    type: "get",
                    success: function(json) {
                        // alert("Updated Successfully");

                    }
                });
                $('#calendar').fullCalendar('updateEvent', event);
            },
            editable: true,
            eventResize: function(event) {
                var start =moment(event.start).format('YYYY-MM-DD hh:mm:ss');
                var end = moment(event.end).format('YYYY-MM-DD hh:mm:ss');
                $.ajax({
                    url: 'http://debehaber.com/update_evento',
                    data: 'title='+ event.title+'&start='+ start +'&end='+ end +'&id='+ event.id ,
                    type: "get",
                    success: function(json) {
                        //  alert("Updated Successfully");

                    }
                });
                $('#calendar').fullCalendar('updateEvent', event);
            },


            eventClick: function(event) {
                var decision = confirm("Do you really want to do that?");
                if (decision) {
                    $.ajax({
                        type: "get",
                        url: "http://debehaber.com/delete_evento/"+event.id,

                        //  data: "&id=" + event.id
                    });
                    $('#calendar').fullCalendar('removeEvents', event.id);
                    $('#calendar').fullCalendar('updateEvent', event);
                    //$('#calendar').fullCalendar('refetchEvents');
                } else {
                }
            }

        });
    }

renderCalendar();
});
