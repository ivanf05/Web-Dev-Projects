$(document).ready(function() {
	// Change elements of the h1 tag so their inner text says "jQuery works..."
	$("h1").css("background-color","#000080");
	$("h1").css("color","white");
	$("th").css("color","white");
    $("th").css("background-color","#000080");
	$("#numbers tr:even").addClass("nice");
	$("#numbers tr:odd").addClass("wh");
	
	$("#numbers tr").mouseover(function() { $(this).addClass("trmouseon"); });
	$("#numbers tr").mouseout(function() { $(this).removeClass("trmouseon"); });
	$("th").mouseover(function(){
	    $("th").css("background-color", "#ADD8E6");
	});
	$("th").mouseout(function(){
	   $("th").css("background-color", "#000080");
	});
	$("#xmlButton").bind('click', launchImport);
	
});
function launchImport(){
	window.location.href = "contacts_manager_update_list.php";
}
/*function contactXML(){
	$.ajax({
		type: "GET",
		url:"customers.xml",
    	datatype: "xml",
    	success: postToPageTwo
	});

	
}*/