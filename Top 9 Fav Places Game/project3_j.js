//Var's to keep track
var gMap;
var score = 0;
var loc = 0;
		
var home = {lat: 41.725, lng: -87.825};
var hawaii = {lat: 21.3069, lng: -157.8583};
var beach = {lat: 41.9148, lng: -87.6251};
var bora = {lat: -16.5004, lng: -151.7415};	
var jalisco = {lat: 20.676480,lng: -103.347025};
var navy_pier = {lat: 41.8916, lng: -87.6079};
var disney = {lat: 28.3852,lng: -81.5639};
var eiffel_tower= {lat: 48.8584,lng: 2.2945};
var man_city = {lat: 53.483291, lng: -2.200427};
//Aray of fav. locations that be used to check if bounds
//is within there lat & lng
var fav_locs = [
{lat: 41.725, lng: -87.825},
{lat: 21.3069, lng: -157.8583},
{lat: 41.9148, lng: -87.6251},
{lat: -16.5004, lng: -151.7415},
{lat: 20.676480,lng: -103.347025},
{lat: 41.8916, lng: -87.6079},
{lat: 28.3852, lng: -81.5639},
{lat: 48.8584,lng: 2.2945},
{lat: 53.483291, lng: -2.200427}
];	
//Array of Fav. Places 
var markers = [
{
	cord: home,
	content: '<h4>Home</h4><img src = "Hickory_Hills.jpg" alt="" style="width:85px;height:85px;">'
},
		
{
	cord: hawaii,
	content: '<h4>Honolulu, Hawaii</h4><img src = "hawaii.jpg" alt="" style="width:125px;height:85px;">'
},
{
	cord: beach,
	content: '<h4>North Avenue Beach, IL</h4><img src = "beach.jpg" alt="" style="width:125px;height:85px;">'
},
{
	cord: bora,
	content: '<h4>Bora Bora</h4><img src = "bora.jpg" alt="" style="width:125px;height:85px;">'
},
{
	cord: jalisco,
	content: '<h4>Jalisco, Mexico</h4><img src = "jalisco.jpg" alt="" style="width:125px;height:85px;"><p>Plaza de Armas<\p>'
},
{
	cord: navy_pier,
	content: '<h4>Navy Pier</h4><img src = "navypier.jpg" alt="" style="width:125px;height:85px;">'
},
{
	cord: disney,
	content: '<h4>Disney World</h4><img src = "disneyworld.jpg" alt="" style="width:125px;height:85px;">'
},
{
	cord: eiffel_tower,
	content: '<h4>Eiffel Tower</h4><img src = "eiffel.jpg" alt="" style="width:85px;height:85px;">'
},
{
	cord: man_city,
	content: '<h4>Manchester City Soccer</h4><img src = "man.jpg" alt="" style="width:125px;height:85px;"><p>Etihad Stadium<\p>'
}
];
// initMap is a callback function that is initiated as part of the Google Maps API call at the bottom.
function initMap() {
    gMap = new google.maps.Map(document.getElementById('myMapID'), {
        center: {lat: 0.00, lng: 0.00}, zoom: 1});
	//Updates the game after every map action
    google.maps.event.addListener(gMap, 'idle', function() {
        UpdateGame()
    });
	//The next location button is hidden by deafault 
	dom = document.getElementById("next_button").style;  
	dom.visibility = "hidden";
}
//Makes next location button visable
function flipButton() {
  dom = document.getElementById("next_button").style;  
 if (dom.visibility == "hidden")
   dom.visibility = "visible";
}
//Function that increments score, location #, displays winning 
//announcement, and makes the next location number visable
function Score(){
	loc++;
	score++;
	document.getElementById("score-id").value = score;  
	gMap.setCenter({lat: 0.00, lng: 0.00});
	gMap.setZoom(1);
	dom = document.getElementById("next_button").style;  
	dom.visibility = "hidden";
	if(score == 9){
		dom = document.getElementById("win").style;  
		dom.visibility = "visible";
		
	}
}
//add the maker location to map
//& displays next location button
function addMarker(props){
	var marker = new google.maps.Marker({
	position: props.cord,
	map: gMap,
	});
	flipButton();
	var info = new google.maps.InfoWindow({
		content: props.content
	});
	info.open(gMap, marker);
}
//Function that displays hint based on zoom level and bounds
function hint(inBounds) {
	if(inBounds == false)
	{
		document.getElementById("hint-id").value = "About of Bounds!: Try moving map around or zoom back out until in Bounds again.";  
	}
	else if(inBounds == true && gMap.getZoom() >= 8)
	{
		document.getElementById("hint-id").value = "Location found! Click button for next location!";  
	}	
	
	else if(inBounds == true && gMap.getZoom() <= 3 )
	{
		document.getElementById("hint-id").value = "In bounds: Zoom in closer!";  
	}
	else if(inBounds == true && gMap.getZoom() <= 4 )
	{
		document.getElementById("hint-id").value = "In bounds: Getting close, but zoom in closer!!";  
	}
	else if(inBounds == true && gMap.getZoom() <= 5)
	{
		document.getElementById("hint-id").value = "In bounds: Getting warmer, but zoom in closer!!!";  
	}
	else if(inBounds == true && gMap.getZoom() <= 6 )
	{
		document.getElementById("hint-id").value = "In bounds: Getting hotter, zoom in closer!!!!";  
	}
else if(inBounds == true && gMap.getZoom() <= 7 )
	{
		document.getElementById("hint-id").value = "In bounds: Almost there zoom in closer!!!!!";  
	}	
}
//If bounds is within any of the locations them the marker and
//hint function is called
function UpdateGame() {
  
	document.getElementById("zoom-id").value = gMap.getZoom();  
    var zoomLevel = gMap.getZoom()
    var inBounds = false;
	if (inBounds == false){
		hint();
	}
 
    if (gMap.getBounds().contains(fav_locs[loc])) {
		if (gMap.getZoom() >= 8){
			inBounds = true;
			addMarker(markers[loc]);
		}else if(gMap.getZoom()< 8){
			inBounds = true;		
		}
    }
	hint(inBounds);
    console.log("inBounds:"+inBounds+" zoomLevel:"+zoomLevel);
}
