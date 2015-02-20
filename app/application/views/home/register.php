<?php
$post_gender = $this->input->post("gender");
if($post_gender != ""){
	$_gender = $post_gender;
}else{
	$_gender = "";
}

?>
<div class="row">
	<div class="col-md-6">
		<h3>Quick Registration </h3>

		<div class="description">
			Please provide few basic details about yourself below.
		</div>
		<?php

		echo validation_errors('<div class="alert alert-danger" role="alert">','</div>');

		echo form_open("home/register/submit","class='form'");
		echo form_input("first_name",set_value("first_name"),"class='half'");
		echo form_input("last_name",set_value("last_name"),"class='half'");
		echo form_label("First Name <span class='right'>Last Name</span>","first_name");
		
		echo form_input("age",set_value("age"),"class='half'");
		echo form_dropdown("gender", 
			array("Male"=>"Male","Female"=>"Female"),$_gender,
			"class='half'");
		echo form_label("Age (optional) <span class='right'>Gender</span>","age");

		echo form_input("phone",set_value("phone"),"class='half'");
		echo form_input("github",set_value("github"),"class='half'");
		echo form_label("Phone Number<span class='right'>GitHub Username </span>","phone");


		echo form_input("email",set_value("email"));
		echo form_label("Email (Will be used for logging in)","email");
		echo form_password("password",set_value("password"),"class='half'");
		echo form_password("password_confirm",set_value("password_confirm"),"class='half'");
		echo form_label("Set new Password for this system <span class='right'>Confirm Password</span>","password");

		echo form_submit("register","Register","class='btn btn-lg btn-success'");

		?>
	</div>
</div>
