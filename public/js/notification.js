$(document).ready(function() {
	var base = "http://localhost:8000";
	var interval = 5000;
	var message = "Terkait nomor komponen "
	var notifPosition = 'top right';

	window.setInterval(function(){
		$.ajax({
		    type: 'get',
		    url: base + '/check',
		    success: function(data) {
		    	var json = JSON.parse(data);
		    	if (data!="0"){
		    		if (data!="[]"){
		    			$('<audio id="chatAudio">' +
			    			'<source src="/sound/notify.ogg" type="audio/ogg">' +
			    			'<source src="/sound/notify.mp3" type="audio/mpeg">' +
			    			'<source src="/sound/notify.wav" type="audio/wav">' +
		    		  	  '</audio>').appendTo('body');

		    			$.each(json, function(key, val) {
		    				$.amaran({
		    					'theme'     :'user black',
		    					'content'	: {
		    						img			: base + '/images/tools.png',
		    						user		: val.username,
		    						message		: message + val.no_seri_komponen,
		    					},
		    					'delay'     : 10000
		    				});
		    			});
			    		$('#chatAudio')[0].play();
		    		}
		    	}
		    	console.log(data);
		    },
		    error: function(data) {
		    }
		});
	},interval);
});