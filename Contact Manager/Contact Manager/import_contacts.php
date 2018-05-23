<html>
    <head>
   	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </head>
    <body>
        <h1>Enter XML file</h1>
            <td> <input type = "text"  name = "xmlFile" 
                      id = "xmlFile"  size = "30" placeholder="Ex: contacts.xml" />
                      <button id ="xmlButton">Enter File</button>
                      <button id ="home">home</button>
               
             
       
    </body>
    <body>
        <div id="contacts"></div>
        <div id "importContacts"></div>
        <form id ="xmlForm">
        <div id="form"></div>
        
        </form>
        <div id="div1"></div>
    </body>
    
    <script type="text/javascript">
         $(document).ready(function() {
          
        	$("#xmlButton").bind('click', contactXML);
        	$("h1").css("color","blue");
        	 $("body").css("background-color","#EEEEEE");
            $("#home").click(function (){
                	window.location.href = "contact_manager_home.php";
           
            });
        });
        function contactXML(){
                var file = $("#xmlFile").val();
            	$.ajax({
            	type: "GET",
            	url:file,
                datatype: "xml",
                success: postToPageTwo
        });
    }
    function postToPageTwo(data){
                $(data).find('contact').each(function(){
               
                var firstName = $(this).find('firstName').text();
                

                var lastName = $(this).find('lastName').text();
                var primaryNum = $(this).find('primaryNum').text();
                var email = $(this).find('email').text();
                var occupation = $(this).find('occupation').text();
                var homeAddress = $(this).find('homeAddress').text();
                var city = $(this).find('city').text();
                var zip = $(this).find('zip').text();
                var state = $(this).find('state').text();
                var comment = $(this).find('comment').text();
                $('<div class="headin"></div>').html("Contact Information").appendTo('#contacts');
                $('<div class="firstname"></div>').html(firstName).appendTo('#contacts');
                $('<div class="lastname"></div>').html(lastName).appendTo('#contacts');
                $('<div class="email"></div>').html(email).appendTo('#contacts');
                $('<div class="occupation"></div>').html(occupation).appendTo('#contacts');
                $('<div class="homeAddress"></div>').html(homeAddress).appendTo('#contacts');
                $('<div class="city"></div>').html(city).appendTo('#contacts');
                $('<div class="zip"></div>').html(zip).appendTo('#contacts');
                $('<div class="state"></div>').html(state).appendTo('#contacts');
                $('<div class="comment"></div></br>').html(comment).appendTo('#contacts');
                
                $('<input type =\"hidden\" id ="first_name" name = "first_name" />').appendTo('#form');
                $('#first_name').val(firstName);
                 $('<input type =\"hidden\" id ="last_name" name = "last_name" />').appendTo('#form');
                $('#last_name').val(lastName);
                 $('<input type =\"hidden\" id ="primary" name = "primary" />').appendTo('#form');
                $('#primary').val(primaryNum);
                 $('<input type =\"hidden\" id ="email" name = "email" />').appendTo('#form');
                $('#email').val(email);
                 $('<input type =\"hidden\" id ="occupation" name = "occupation" />').appendTo('#form');
                $('#occupation').val(occupation);
                 $('<input type =\"hidden\" id ="home_address" name = "home_address" />').appendTo('#form');
                $('#home_address').val(homeAddress);
                 $('<input type =\"hidden\" id ="zip" name = "zip" />').appendTo('#form');
                $('#zip').val(zip);
                 $('<input type =\"hidden\" id ="city" name = "city" />').appendTo('#form');
                $('#city').val(city);
                 $('<input type =\"hidden\" id ="state" name = "state" />').appendTo('#form');
                $('#state').val(state);
                 $('<input type =\"hidden\" id ="comment" name = "comment" />').appendTo('#form');
                $('#comment').val(comment);
                $('<button type="button" id ="submitContact">Import Contacts</button>').appendTo('#form');
                
                $('#form').appendTo('#xmlForm');
                $("#submitContact").bind('click',submitContact);
               
                function submitContact(){
                
                $("#div1").load("contact_manager_insert.php",$("#xmlForm").serializeArray());
            }
            });
                
          
            }
            
    </script>
    
</html>