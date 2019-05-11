console.log("Show");
$(function () {
	var url = $("#url").val();
	var tasks = [];
	$.post(url,function(res){
		tasks = JSON.parse(res);
		var listEvents = [];
		//xu ly data
		for (var i = 0; i < tasks.length; i++) {
			var color = '#00c0ef';
			switch(tasks[i].status)
			{
				case '1':
					color = '#00c0ef'; //planning
					break;
				case '2':
					color = '#f39c12'; //doing
					break;
				case '3':
					color = '#00a65a'; //complete
					break;
			}
			var obj = {
				title: tasks[i].name,
				start: new Date(tasks[i].startDate),
				end: new Date(tasks[i].endDate),
				backgroundColor: color,
				borderColor: color
			};
			listEvents.push(obj);
		}

		//tao calendar
		$('#calendar').fullCalendar({
	      	header: {
		        left: 'prev,next today',
		        center: 'title',
		        right: 'month,agendaWeek,agendaDay'
	      	},
	      	buttonText: {
		        today: 'today',
		        month: 'month',
		        week: 'week',
		        day: 'day'
	      	},
	      	events: listEvents,
	      	displayEventTime : false
	    });

	});

});

function backToList(url)
{
	window.location = url;
}
