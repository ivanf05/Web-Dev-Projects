$(document).ready(function() {
	$("#fighters tr").mouseover(function() { $(this).addClass("trmouseon"); });
	$("#fighters tr").mouseout(function() { $(this).removeClass("trmouseon"); });
	$("#button1").bind('click',alertClick);
	
	function alertClick(){
		alert("Hello Ivan");
	}
	$('#textBox1').bind('blur',onBlurEvent).bind('focus',onFocusEvent).bind('onmousedown',onMDownEvent).bind('onmouseup',onMUpEvent).bind('change',onChangeEvent);
	function onBlurEvent(){
		$("#Jquery").html("You left the box");
	}
	function onFocusEvent(){
		$("#Jquery").html("You entered the text box");
	}
	function onMDownEvent()
	{
		$("#Jquery").html("You left the text box");
	}
	function onMUpEvent()
	{
		$("#Jquery").html("You entered the text box");
	}
	function onChangeEvent()
	{
		$("#Jquery").html("You changed the text box");
	}
});