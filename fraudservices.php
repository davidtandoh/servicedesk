<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>All Services</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
      <script src="jquery-2.1.4.min.js"></script>
      <script>
           $(document).ready(function()
            {
                getServices();
            });
          
          function sendRequest(u){
            var obj=$.ajax({url:u,async:false});
            var result=$.parseJSON(obj.responseText);
            return result;	
        }
          
          function getServices(){
            var url = "controller.php?cmd=6";
            var obj = sendRequest(url);   
            if(obj.result == 1){
                var output = "";
            
                alert(obj.services.length);
                 for(var i= 0 ;i < obj.services.length; i++){
                    output += "<button type='button' class='list-group-item' onclick='getServiceproviders("+obj.services[i].serviceid+")'>"+obj.services[i].servicename+"</button>";
     
                     
                
                    $("#mylistgroup").html(output);
                     //$("#mylistgroup").refresh;
                 }
                
            }
            else{
            }
          }
          
          function getServiceproviders(serviceid) {
            //var d;
             window.localStorage.setItem("serviceid", serviceid);
              window.location="servicelist.html"
        }
      </script>
  </head>
  <body>
      
    <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Services</a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
              <li><a href="services.html">Services</a></li>
              <li><a href="bookings.html">Manage my bookings</a></li>
              <!--<li><a href="../navbar-fixed-top/">Fixed top</a></li>-->
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>
        <div class="list-group" id="mylistgroup">
        </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>