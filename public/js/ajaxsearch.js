$(document).ready(function() {

	$("#district").click(function () {
   var distval = $("#district").val();
    $.post('http://localhost:8000/api/searchCity', {distval: distval}, function(match) {
    	$("#city").html(match);






    });

});

});