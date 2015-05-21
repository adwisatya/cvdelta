$(document).ready(function() {
	var base = "http://localhost:8000";
	var interval = 5000;

	window.setInterval(function(){
		$.ajax({
		    type: 'get',
		    url: base + '/check/count',
		    success: function(data) {
		    	if (data!="0"){
		    		$('#notifCount').text(data);
		    	}
		    },
		    error: function(data) {
		    }
		});
	},interval);
});