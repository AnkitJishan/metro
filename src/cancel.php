<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V13</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body style="background-color: #999999;">
	<?php
 $host="localhost";
 $user="root";
 $password="";
 $db="Metro";

$conn = mysqli_connect($host, $user, $password, $db);
if(!$conn){
	die("Connection Failed: ". mysqli_connect_error());
}

                           
if(isset($_POST['submit'])){
	 if( isset($_POST['ReservationId'])&& isset($_POST['Train'])){
 		$ReservationId=$_POST['ReservationId']; 	
 		$train=$_POST['Train'];	
 		$sql = "DELETE FROM Reservations WHERE ReservationId='$ReservationId'";

			if (mysqli_query($conn, $sql))
			 {
					?>
			<script type=text/javascript>alert("<?php  echo "Your Booking Has Been Cancelled.."?>")</script>
		           <?php
		           $sql="select SeatsRemaining from train where TrainName='$train'";
                       $result = mysqli_query($conn, $sql);

                       if (mysqli_num_rows($result) > 0)
                        {
                          while($row = mysqli_fetch_assoc($result))
                             {
                              $NewSeats = $row["SeatsRemaining"];
                             }

                           $NewSeats = $NewSeats+1; 

                         $sql = "UPDATE Train SET SeatsRemaining='$NewSeats' WHERE TrainName='$train'";
			    		$set = mysqli_query($conn, $sql);
			            } 
			           else 
			           {
					    ?>
			              <script type=text/javascript>alert("<?php  echo "Error While Booking Cancellation"?>")</script>
		               <?php
			             die();
			           }  
			          }
			         }
			        }                                                         
		
                                                             
?>


	<form class="login100-form validate-form" action="cancel.php" method="POST">
	<div class="limiter">
		<div class="container-login100">
			<div class="login100-more" style="background-image: url('images/bg-01.png');"></div>

			<div class="wrap-login100 p-l-50 p-r-50 p-t-72 p-b-50">
				
					<span class="login100-form-title p-b-59">
						Booking Cancellation
					</span>			


					<div class="wrap-input100 validate-input" >
						<span class="label-input100">Reservation Id</span>
						<input class="input100" type="number" name="ReservationId" placeholder="ReservationId">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Please Enter No of passengers">
						<span class="label-input100">Train Name</span>
						<select name="Train" style="margin-left: 13px; border-radius: 6px;">
							<option>Rajdhani Express(Jab-Gwa)</option>
							<option>Avantika Express(Ind-Jab)</option>
							<option>MayaNagri Express(Ind-Gwa)</option>
							<option>Ajanta Express(Bpl-jab)</option>
							<option>Amravati Express(Bpl-Gwa)</option>
							<option>Holkar Express(Ind-Ujj)</option>
							<option>Bhoj Express(Ind-Dws)</option>
							<option>Ujjaini Express(Dws-Ujj)</option>
							<option>Kshipra Express(Ujj-Jab)</option>
							<option>Narmada Express(Ujj-Gwa)</option>
							<option>Godavari Express(Dws-Jab)</option>
							<option>Gwaliori Express(Gwa-Dws)</option>
							<option>Malwa Express(Bpl-Ujj)</option>
							<option>Gatimaan Express(Dws-Bpl)</option>
							<option>Intercity Express(Bpl-Ind)</option>
							<option>Rajdhani Express(Bpl-Gwa)</option>
							<option>Mayanagri Express(Gwa-Jab)</option>
							<option>Avantika Express(Jab-Gwa)</option>
						</select>
					</div>


					<div class="flex-m w-full p-b-33">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
							<label class="label-checkbox100" for="ckb1">
								<span class="txt1">
									I agree to the
									<a href="#" class="txt2 hov1">
										Terms of User
									</a>
								</span>
							</label>
						</div>

						
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" name="submit">
								Done
							</button>
						</div>

						<a href="front.html" class="dis-block txt3 hov1 p-r-30 p-t-10 p-b-10 p-l-30">
							Cancel
							<i class="fa fa-long-arrow-right m-l-5"></i>
						</a>
					</div>
				
			</div>
		</div>
	</div></form>


	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>



