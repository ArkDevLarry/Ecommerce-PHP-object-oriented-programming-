<?php $this->view('includes/header',FRNTND,$data); ?>
	
	<section id="form" style="margin-top: 15px;">
		<div class="container" style="display: flex; flex-direction: column;">
			<div class="row" style="display: flex; justify-content: center;">
				<div class="col-sm-5">
					<div class="signup-form"><!--sign up form-->
						<h2>New User Signup!</h2>
						<span id="top"></span>
						<form method="POST" id="signup" enctype="multipart/form-data">
							<input class="input-field" type="text" name="fullname" placeholder="Enter Fullname..."/>
							<span style="color: crimson;" id="fullname"></span>
							<input class="input-field" type="text" name="username" placeholder="Enter Username..."/>
							<span style="color: crimson;" id="username"></span>
							<input class="input-field" type="email" name="email" placeholder="Enter Email Address..."/>
							<span style="color: crimson;" id="email"></span>
							<input class="input-field" type="password" name="password" placeholder="Enter Secure Password..."/>
							<span style="color: crimson;" id="password"></span>
							<input class="input-field" type="password" name="cpassword" placeholder="Re-enter Password..."/>
							<span style="color: crimson;" id="cpassword"></span>
							<input class="input-field" type="file" name="image"/>
							<span style="color: crimson;" id="image"></span>
                            <br>
							<a href="signup">Already have an account? Login here.</a>
							<button type="submit" class="btn btn-default">Signup</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
	<section id="result">

	</section>
	
	<?php $this->view('includes/footer',FRNTND) ?>

    <script>
		function isJson(str) {
			try {
				JSON.parse(str);
			} catch (e) {
				return false;
			}
			return true;
		}
    </script>
	<script>
         $(document).ready(function() {
			$("#signup").submit(function(event) {
				event.preventDefault();
				var form_data = new FormData(this);
				$.ajax({
					url: "<?=ROOT?>signup/signup",
					type: "POST",
					data: form_data,
					datatype: "JSON",
					cache: false,
					processData: false,
					contentType: false,
					// beforeSend: function() {
					// 	$("#loader").css("display", "inline-block")
					// 	$("#contactform :input").prop("disabled", true);
					// },
					success: function(res) {
						$("form")[0].reset();
						if (isJson(res)) {
							let data = JSON.parse(res);
							for (i = 0; i < data.length; i++) {
								let get = data[i];
								if (get.field=="top" && get.message=="Success") {
									swal("Great!", "Your account has been created successfully!", "success")
									.then(() => {
										window.location.replace("login");
									});
								}else{
									$("#"+get.field).html(get.message);
								}
								
							}
						}else{
							$("#top").html(res);
						}
					}
				})
			});
		})
    </script>