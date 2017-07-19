</div>
</div><footer>
  <a href="dashboard.php">Back to dashboard</a></footer>
  </body>
</html>
<script
			  src="https://code.jquery.com/jquery-3.1.0.min.js"
			  integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s="
			  crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
               <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>   <script>
            
               $('#btndel').click(function(event) {
				  event.preventDefault();
				  href=  $('#btndel').attr('href');
				  var r = confirm("Are you sure you want to delete and not inactivate.");
					if (r == true) {
					window.location = href;
					}
								  });
								  
								  
								  function getsecondbox(tablename, idselected, topopulate) {
								  $.ajax({
                type: "GET",
                url: "getsecondbox.php",
                data: { "name": tablename, "id": idselected},
                contentType: "application/json; charset=utf-8",
				async: false,
                dataType: "json",
                success: function (msg) { 
				$("#" + topopulate).get(0).options.length = 0;
                    $("#" + topopulate).get(0).options[0] = new Option("", "");

                    $.each(msg.List, function (index, item) {   
                
	$("#" + topopulate).get(0).options[$("#" + topopulate).get(0).options.length] = new Option(item.title, item.id);
               });
				
		
               },
              
            });
	  }


								  
              </script>