<?php $this->view('includes/header',FRNTND,$data); ?>
	
	<section id="form" style="margin-top: 15px;"><!--form-->
		<div class="container">
			<div class="row" style="display: flex; justify-content: center;">
				<div class="col-sm-5 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Login to your account</h2>
						<span id="top"></span>
						<form method="POST" id="login">
							<input type="email" name="email" value="<?=cookie_check('email')?>" placeholder="Enter email address" />
							<span style="color: crimson;" id="email"></span>
							<input type="password" name="password" value="<?=cookie_check('password')?>" placeholder="Enter your password" />
							<span style="color: crimson;" id="password"></span>
							<br>
							<span>
								<input type="checkbox" class="checkbox" name="remember">
								Remember me
								<br>
								<a href="signup">Don't have an account? Sign up here.</a>
							</span>
							<button type="submit" class="btn btn-default">Login</button>
						</form>
					</div><!--/login form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
	
	
	<?php $this->view('includes/footer',FRNTND) ?>

	
	<script>
         $(document).ready(function() {
			$("#login").submit(function(event) {
				event.preventDefault();
				var form_data = new FormData(this);
				$.ajax({
					url: "<?=ROOT?>login/login",
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
								if (get.field=="admin") {
									swal(get.message+'!', "Login Success", "success")
									.then(() => {
										window.location.replace("/admin");
									});
								}else if(get.field=="user"){
									swal(get.message+'!', "Login Success", "success")
									.then(() => {
										window.location.replace("/");
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