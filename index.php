<?php
session_start();
  require(__DIR__."/includes/loginprocess.php");
  //require(__DIR__."/includes/get_profile_data.php");
  
  if(!isset($_SESSION['student_id'])){
  	header("Location: user_login.php");
  }

?>

<html ng-app="myApp" >
<head>
	<title> Attachment placement</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <script  type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="js/materialize.min.js"></script>
  <script type="text/javascript" src="js/angular.min.js"></script>
  <script type="text/javascript" src="js/angular-route.min.js"></script>
  <script type="text/javascript" src="js/alertify.min.js"></script>
  <link rel="stylesheet" href="css/materialize.min.css" />
  <link rel="stylesheet" href="fonts/material icons/icons.css"/>
  <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.css" />
  <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css"/>
  <link rel="stylesheet" href="css/alertify.min.css"/>
  <link rel="stylesheet" href="css/semantic.min.css"/>
	<style type="text/css">
		.nav-bar{
			background-color:#26A69A;
			height: 110px;
		}
		.dashboard{
			width: 20%;
			margin-right: 3%;
			color: #26A69A;
			font-size: 20px;
			padding-top: 1.5%;
		}
		.dashboard:hover{
			font-size: 16px;
			cursor: pointer;
		}
		.card{
			width: 200px;
			height:50px;
		}
		.cont{
			margin-top: 3%;
		}
		#profile{
			color:#26A69A;
			clear: both;
			margin-top: 2%;
			font-size: 20px;
			border: solid #f2f2f2 1px;
			box-shadow: 0.5px 2px 2px 1px lightgray;
			border-radius: 5px;
		}
		#profile-header{
			margin-top: 20px;
			border: solid #f2f2f2 2px;
			width: 200px;
			border-radius: 100px;
			background-color: #26A69A;
			color: white
		}
		thead{
			color: #26A69A;
			font-weight: bold;
		}
		tbody{
			color:gray;
			font-family: Arial;
		}
		.application_btn{
			background-color: tomato;
		}
		.application_btn:hover{
			background-color: white;
			color:#26A69A;
		}
		tbody tr:hover{
			color: black;
		}
		.detail{
			color: #26A69A;
			font-style:bold;
		}
		.application-form{
			border: solid skyblue 1px; 
			font-size: 13px;
		}
	</style>
</head>
<body>
	<div class="nav-bar">
		<div class="col s12 m12 l12">
		<div class="nav-bar white-text">
			<div class = "right">
				 <p class="tooltipped" data-position="top" data-tooltip="Online"> <i style="color:#7df441" class="fa fa-circle fa-1x aria-hidden="true"></i> <?php echo $_SESSION['student_id']; ?>  </p>
				<p> <i class="fa fa-calendar fa-1x white-text" aria-hidden ="true"></i>  <?php
                            $mydate=getdate(date("U"));
                            echo "$mydate[weekday],$mydate[month]-$mydate[mday]-$mydate[year]";
                        ?></p>

                <p> <i class="fa fa-sign-out" aria-hidden="true"> </i> <span style="font-size: 13px"> Logout </span> </p>
			</div>
		</div>
	</div>
	</div>
	<div class=" container row">
		<div class="cont col s12 m12 l12 ">
			<a href="#/profile"><div class="center dashboard card left"> <i class="fa fa-user fa-1x" aria-hidden="true"></i> <b> MY PROFILE </b>  </div> </a>
			<a href="#/dashboard"><div class="center dashboard card left"> <i class="fa fa-tachometer fa-1x" aria-hidden="true"></i> <b>  DASHBOARD </b>  </div> </a>
			<a href="#/update_profile"> <div class="center dashboard card left"> <i class="fa fa-edit fa-1x" aria-hidden="true"></i> <b> UPDATE PROFILE </b>  </div> </a>
			<div class="center dashboard card left"> <i class="fa fa-cogs fa-1x" aria-hidden="true"></i> <b> SETTINGS </b> </div>
		</div>
	</div>
	<hr style="height:0.2px;20px;margin-left:150px;margin-right: 150px">
	<div id="modal1" style="max-height: 90%" class="modal">
    <div class="modal-content row">
      <h4 style="background-color:#26A69A;color: white; line-height:  ">Applicaton Form</h4>
      <form class="col l12 m12 s12">
      	<div class="row">
      		<div class="input-field col l6">
      			<label for="student_name" style="color: gray">APPLICANTS NAME</label>
      			<input class="" style="border: solid gray 1px; font-size: 13px;" type="text" name="student_name">
      		</div>
      		<div class="input-field col l6" >
      			<label for="aoi" style="color: gray">AREA OF INTEREST</label>
      			<input style="border: solid gray  1px; font-size: 13px;" type="text" id="aoi" name="Area_of_interest">
      		</div>	
		</div>
     	<div class="input-field col l12" >
     		<label style="color: gray">SKILLS</label>
     		<textarea style="border: solid gray 1px; font-size: 13px;height: 150px;" type="text" name="Skills"> </textarea> <br><br>
      	</div>
     	<label style="color: gray">UPLOAD CV</label>
      	<input style="border: solid gray 1px; font-size: 13px;" type="file" name="cv"> <br> <br>
      	
      	<label style="color: gray">POSITION</label>
      	<input style="border: solid gray 1px; font-size: 13px;" type="text" name="position">
      	<button id="submit-application" style="background: skyblue; margin-top: 50px; font-size: 13px" class="btn bt-hv"> SEND <i class="fa fa-paper-plane" aria-hidden="true"></i> </button>
      </form>
    </div>
  </div>

	  <div  class="row" >
              <div ng-view>  </div>
        </div>
	<script  type="text/javascript" src="js/app.js"></script>			
</body>
<script type="text/javascript">
	$('.dashboard').click(function(){
		$(".dashboard").css("background-color","");
		$(".dashboard").css("color","");
		$(this).css("background-color","#26A69A");
		$(this).css("color","white");
	});
</script>
<script type="text/javascript">
        angular.module('myApp',['ngRoute']).config(function($routeProvider){
            $routeProvider
            .when('/',{
                templateUrl: 'views/dashboard.php'
            })
            .when('/dashboard',{
                templateUrl: 'views/dashboard.php'
            })
            .when('/update_profile',{
                templateUrl:'views/update_profile.php'
            })
            .when('/profile',{
            	templateUrl:'views/profile.php'
            })
            .otherwise({redirectTo: '/'
            });
        });
</script>
</html>

<script type="text/javascript">
	$(document).ready(function(){
    $('.modal').modal();
  });	
</script>