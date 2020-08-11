<?php include('includes/header.php'); ?>
<style type="text/css">
.mktoForm .mktoButtonWrap.mktoDownloadButton .mktoButton {
position: relative;
display: inline-block;
vertical-align: top;
height: 36px;
line-height: 35px;
padding: 0 20px;
font-size: 13px;
color: white;
text-align: center;
text-decoration: none;
text-shadow: 0 -1px rgba(0, 0, 0, 0.4);
background-clip: padding-box;
border: 1px solid;
border-radius: 2px;
cursor: pointer;
-webkit-box-shadow: inset 0 1px rgba(255, 255, 255, 0.1), inset 0 0 0 1px rgba(255, 255, 255, 0.08), 0 1px 2px rgba(0, 0, 0, 0.25);
box-shadow: inset 0 1px rgba(255, 255, 255, 0.1), inset 0 0 0 1px rgba(255, 255, 255, 0.08), 0 1px 2px rgba(0, 0, 0, 0.25);
background: #3b5ca0;
border-color: #2d477b #2d477b #263c68;
background-image: -webkit-linear-gradient(top, #4369b6, #3b5ca0 66%, #365391);
background-image: -moz-linear-gradient(top, #4369b6, #3b5ca0 66%, #365391);
background-image: -o-linear-gradient(top, #4369b6, #3b5ca0 66%, #365391);
background-image: linear-gradient(to bottom, #4369b6, #3b5ca0 66%, #365391);
}
.mktoForm .mktoButtonWrap.mktoDownloadButton .mktoButton:before {
content: "";
position: absolute;
top: 0;
bottom: 0;
left: 0;
right: 0;
pointer-events: none;
background-image: -webkit-radial-gradient(center top, farthest-corner, rgba(255, 255, 255, 0.08), rgba(255, 255, 255, 0));
background-image: -moz-radial-gradient(center top, farthest-corner, rgba(255, 255, 255, 0.08), rgba(255, 255, 255, 0));
background-image: -o-radial-gradient(center top, farthest-corner, rgba(255, 255, 255, 0.08), rgba(255, 255, 255, 0));
background-image: radial-gradient(center top, farthest-corner, rgba(255, 255, 255, 0.08), rgba(255, 255, 255, 0));
}
.mktoForm .mktoButtonWrap.mktoDownloadButton .mktoButton:hover:before {
background-image: -webkit-radial-gradient(farthest-corner, rgba(255, 255, 255, 0.18), rgba(255, 255, 255, 0.03));
background-image: -moz-radial-gradient(farthest-corner, rgba(255, 255, 255, 0.18), rgba(255, 255, 255, 0.03));
background-image: -o-radial-gradient(farthest-corner, rgba(255, 255, 255, 0.18), rgba(255, 255, 255, 0.03));
background-image: radial-gradient(farthest-corner, rgba(255, 255, 255, 0.18), rgba(255, 255, 255, 0.03));
}
.mktoForm .mktoButtonWrap.mktoDownloadButton .mktoButton:active {
background: #3b5ca0;
border-color: #263c68 #2d477b #2d477b;
-webkit-box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.2);
box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.2);
}
.mktoForm .mktoButtonWrap.mktoDownloadButton .mktoButton:active:before {
content: none;
}

.mktoForm .mktoButtonWrap.mktoDownloadButton button.mktoButton {background:#34ace8;}
.mktoLabel {display:inline;}
.mktoForm input, .mktoForm select {
    padding: 0px 10px !important;
    height: 32px !important;
}
.mktoForm .mktoButtonWrap.mktoDownloadButton button.mktoButton {
    background-color: #ec008c !important;
}
.mktoForm .mktoButtonWrap.mktoDownloadButton .mktoButton {
    position: relative;
    display: inline-block;
    vertical-align: top;
    height: 36px;
    line-height: 35px;
    padding: 0 20px;
    font-size: 13px;
    color: white;
    text-align: center;
    text-decoration: none;
    text-shadow: 0 -1px rgba(0, 0, 0, 0.4);
    background-clip: padding-box;
    border: 1px solid;
    border-radius: 2px;
    cursor: pointer;
    -webkit-box-shadow: inset 0 1px rgba(255, 255, 255, 0.1), inset 0 0 0 1px rgba(255, 255, 255, 0.08), 0 1px 2px rgba(0, 0, 0, 0.25);
    box-shadow: inset 0 1px rgba(255, 255, 255, 0.1), inset 0 0 0 1px rgba(255, 255, 255, 0.08), 0 1px 2px rgba(0, 0, 0, 0.25);
    background: #3b5ca0;
    border-color: #2d477b #2d477b #263c68;
    background-image: -webkit-linear-gradient(top, #4369b6, #3b5ca0 66%, #365391);
    background-image: -moz-linear-gradient(top, #4369b6, #3b5ca0 66%, #365391);
    background-image: -o-linear-gradient(top, #4369b6, #3b5ca0 66%, #365391);
    background-image: linear-gradient(to bottom, #4369b6, #3b5ca0 66%, #365391);
}
.mktoForm .mktoButtonWrap.mktoDownloadButton .mktoButton {
    position: relative;
    display: inline-block;
    vertical-align: top;
    height: 36px;
    line-height: 35px;
    padding: 0 20px;
    font-size: 13px;
    color: white;
    text-align: center;
    text-decoration: none;
    text-shadow: 0 -1px rgba(0, 0, 0, 0.4);
    background-clip: padding-box;
    border: 1px solid;
    border-radius: 2px;
    cursor: pointer;
    -webkit-box-shadow: inset 0 1px rgba(255, 255, 255, 0.1), inset 0 0 0 1px rgba(255, 255, 255, 0.08), 0 1px 2px rgba(0, 0, 0, 0.25);
    box-shadow: inset 0 1px rgba(255, 255, 255, 0.1), inset 0 0 0 1px rgba(255, 255, 255, 0.08), 0 1px 2px rgba(0, 0, 0, 0.25);
    background: #3b5ca0;
    border-color: #2d477b #2d477b #263c68;
    background-image: -webkit-linear-gradient(top, #4369b6, #3b5ca0 66%, #365391);
    background-image: -moz-linear-gradient(top, #4369b6, #3b5ca0 66%, #365391);
    background-image: -o-linear-gradient(top, #4369b6, #3b5ca0 66%, #365391);
    background-image: linear-gradient(to bottom, #4369b6, #3b5ca0 66%, #365391);
}
.mktoForm button.mktoButton {
    margin-top: 25px !important;
    font-family: 'Roboto', arial, helvetica, sans-serif !important;
    border: none !important;
    font-size: 18px !important;
    padding: 7px 25px 42px 25px !important;
    border: none !important;
    text-shadow: none !important;
}
</style>
<section id="" style=" background-image:url(/img/request_demo.jpg);background-repeat:no-repeat; background-position:center top; background-attachment:; background-size:; -webkit-background-size:">
<div class="container">
<div class="row">
	<div class="section mcb-section mcb-section-02a90a1a6 full-banner-background" 
		id="request-demo-bg" 
		style="padding-top:16px; padding-bottom:20px; ">
		<div class="section_wrapper mcb-section-inner">
			<div class="wrap mcb-wrap mcb-wrap-5f835997f one  valign-top clearfix" style="">
				<div class="mcb-wrap-inner row">
					<div class="column mcb-column mcb-item-f08dcdbc1 two-fifth column_column col-sm-6">
						<div class="column_attr clearfix" style=""></div>
					</div>
					<div class="column mcb-column mcb-item-bddd8dbd9 three-fifth column_column col-sm-6">
						<div class="column_attr clearfix" 
							style=" padding:16px 40px 20px 40px ; border: 1px solid #ffffff; background-color: rgba(84, 84, 84, 0.5);">
							<h2 style="color:#d8ec83; padding-bottom:10px; line-height:1.25em; font-size:45px;">
							<?php if($registered): ?>
								Request is sent
							<?php else: ?>
								Request a demo
							<?php endif; ?>
							</h2>

							<p style="font-size:16px; color: #fff;">
								Every student can become their most amazing self with the guidance of an expert teacher to unlock their full potential. 
							</p>

							<p style="font-size:16px; color: #fff;">
								We bring the best of data analytics and research-based practice to support teachers nationwide. Together, there’s no limit to what you can achieve in your district, school, or classroom
								– from sparking a lifelong love of reading, to boosting math confidence, to streamlining data-driven decisions, there’s a solution waiting for you. 
							</p>

							<h3 style="color: #D8EC83; line-height: 1.2em; padding-top: 10px;">
								Let's get together for a personalized demonstration. Fill out this form to get started!
							</h3>

							<p></p>

							<!-- form  -->
							<?php if($registered): ?>
							<div style="padding-top: 20px;height:300px;">
								<h3 style="color: #D8EC83; line-height: 1.2em; padding-top: 10px;">
									Your free trail application has been sent. We will contact you within one week. Thank you for your interest!
								</h3>
							</div>
							<?php else: ?>
							<div style="padding-top: 20px;">
								<form method="POST" 
									style="margin: 0px auto; font-family: Arial, Verdana, sans-serif; font-size: 14px; color: rgb(51, 51, 51); width: 476px;" 
									id="request-demo-form" class="mktoForm mktoHasWidth mktoLayoutAbove">
									<div class="row">
										<div class="mktoFieldDescriptor mktoFormCol col-sm-6" style="margin-bottom: 10px;">
											<div class="mktoOffset" style="width: 10px;"></div>
											<div class="mktoFieldWrap mktoRequiredField">
												<label for="FirstName" id="LblFirstName" class="mktoLabel mktoHasWidth" style="width: 100px;color:white;font-size: 16px !important;font-weight: 400 !important;">
													First Name:
												</label>
												<div class="mktoGutter mktoHasWidth" style="width: 10px;"></div>
												<input id="FirstName" name="FirstName" maxlength="255" type="text" class="mktoField mktoTextField mktoHasWidth mktoRequired" style="width: 225px;">
													<span id="InstructFirstName" tabindex="-1" class="mktoInstruction"></span>
													<div class="mktoClear"></div>
											</div>
											<div class="mktoClear"></div>
										</div>
										<div class="mktoFieldDescriptor mktoFormCol col-sm-6" style="margin-bottom: 10px;">
											<div class="mktoOffset" style="width: 10px;"></div>
											<div class="mktoFieldWrap mktoRequiredField">
												<label for="LastName" id="LblLastName" class="mktoLabel mktoHasWidth" style="width: 100px;color:white;font-size: 16px !important;font-weight: 400 !important;">
													Last Name:
												</label>
												<div class="mktoGutter mktoHasWidth" style="width: 10px;"></div>
												<input id="LastName" name="LastName" maxlength="255" type="text" class="mktoField mktoTextField mktoHasWidth mktoRequired" style="width: 225px;">
													<span id="InstructLastName" tabindex="-1" class="mktoInstruction"></span>
													<div class="mktoClear"></div>
											</div>
											<div class="mktoClear"></div>
										</div>
										<div class="mktoClear"></div>
									</div>
									<div class="row">
										<div class="mktoFieldDescriptor mktoFormCol col-sm-6" style="margin-bottom: 10px;">
											<div class="mktoOffset" style="width: 10px;"></div>
											<div class="mktoFieldWrap mktoRequiredField">
												<label for="EmailAddress" id="LblEmailAddress" class="mktoLabel mktoHasWidth" style="width: 100px;color:white;font-size: 16px !important;font-weight: 400 !important;">
													Email Address:
												</label>
												<div class="mktoGutter mktoHasWidth" style="width: 10px;"></div>
												<input id="EmailAddress" name="EmailAddress" maxlength="255" type="text" class="mktoField mktoTextField mktoHasWidth mktoRequired" style="width: 225px;">
													<span id="InstructFirstName" tabindex="-1" class="mktoInstruction"></span>
													<div class="mktoClear"></div>
											</div>
											<div class="mktoClear"></div>
										</div>
										<div class="mktoFieldDescriptor mktoFormCol col-sm-6" style="margin-bottom: 10px;">
											<div class="mktoOffset" style="width: 10px;"></div>
											<div class="mktoFieldWrap mktoRequiredField">
												<label for="PhoneNumber" id="LblPhoneNumber" class="mktoLabel mktoHasWidth" style="width: 100px;color:white;font-size: 16px !important;font-weight: 400 !important;">
													Phone Number:
												</label>
												<div class="mktoGutter mktoHasWidth" style="width: 10px;"></div>
												<input id="PhoneNumber" name="PhoneNumber" maxlength="255" type="text" class="mktoField mktoTextField mktoHasWidth mktoRequired" style="width: 225px;">
													<span id="InstructLastName" tabindex="-1" class="mktoInstruction"></span>
													<div class="mktoClear"></div>
											</div>
											<div class="mktoClear"></div>
										</div>
										<div class="mktoClear"></div>
									</div>
									<div class="row">
										<div class="mktoFieldDescriptor mktoFormCol col-sm-6" style="margin-bottom: 10px;">
											<div class="mktoOffset" style="width: 10px;"></div>
											<div class="mktoFieldWrap mktoRequiredField">
												<label for="SchoolDistrict" id="LblSchoolDistrict" class="mktoLabel mktoHasWidth" style="width: 100px;color:white;font-size: 16px !important;font-weight: 400 !important;">
													School District:
												</label>
												<div class="mktoGutter mktoHasWidth" style="width: 10px;"></div>
												<input id="SchoolDistrict" name="SchoolDistrict" maxlength="255" type="text" class="mktoField mktoTextField mktoHasWidth mktoRequired" style="width: 225px;">
													<span id="InstructFirstName" tabindex="-1" class="mktoInstruction"></span>
													<div class="mktoClear"></div>
											</div>
											<div class="mktoClear"></div>
										</div>
										<div class="mktoFieldDescriptor mktoFormCol col-sm-6" style="margin-bottom: 10px;">
											<div class="mktoOffset" style="width: 10px;"></div>
											<div class="mktoFieldWrap mktoRequiredField">
												<label for="SchoolZipcode" id="LblSchoolZipcode" class="mktoLabel mktoHasWidth" style="width: 100px;color:white;font-size: 16px !important;font-weight: 400 !important;">
													School Zipcode:
												</label>
												<div class="mktoGutter mktoHasWidth" style="width: 10px;"></div>
												<input id="SchoolZipcode" name="SchoolZipcode" maxlength="255" type="text" class="mktoField mktoTextField mktoHasWidth mktoRequired" style="width: 225px;">
												<span id="InstructLastName" tabindex="-1" class="mktoInstruction"></span>
												<div class="mktoClear"></div>
											</div>
											<div class="mktoClear"></div>
										</div>
										<div class="mktoClear"></div>
									</div>
									<div class="row">
										<div class="mktoFieldDescriptor mktoFormCol col-sm-6" style="margin-bottom: 10px;">
											<div class="mktoOffset" style="width: 10px;"></div>
											<div class="mktoFieldWrap mktoRequiredField">
												<label for="ApplyRole" id="LblApplyRole" class="mktoLabel mktoHasWidth" style="width: 137px;color:white;font-size: 16px !important;font-weight: 400 !important;">
													Role:
												</label>
												<div class="mktoGutter mktoHasWidth" style="width: 10px;"></div>
												<select id="ApplyRole" name="ApplyRole" class="mktoField mktoHasWidth mktoRequired mktoInvalid" style="width: 225px;" aria-invalid="true">
													<option value="">Select...</option>
													<option value="student">Student</option>
													<option value="teacher">Teacher</option>
												</select>
												<span id="InstructproductInterest" tabindex="-1" class="mktoInstruction"></span>
												<div class="mktoClear"></div>
											</div>
										</div>
									</div>
									<div class="row">
										<span class="mktoButtonWrap mktoDownloadButton" style="margin-left: 17px;">
											<button type="submit" class="mktoButton">Request Demo</button>
										</span>
									</div>
								</form>
								<!--
								<div id="confirmform" style="visibility:hidden;">
									<h4 style="color: #D8EC83; line-height: 1.2em; margin-bottom: 0px; padding-bottom: 0px;">Thank you for your request. We will be in touch soon! </h4>
								</div>
								-->
								<div id="hide-on-confirm" style="visibility:inherit;">
									<p style="color:#d8ec83; line-height: 1.2em;padding-top:20px;font-size:18px;" id="request-hints">
										<strong>Important:</strong> Please be sure to provide accurate information so that we can provide you the best service.
									</p>
								</div>
							</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<script type="text/javascript">
$("#request-demo-form").submit(function(e){
	var emailAddress = $("#EmailAddress").val();
	if (!emailAddress || !validateEmail(emailAddress)) {
		$("#request-hints").html("<strong>Error:</strong> Correct Email Address is Required.");
		return false;
	}
	this.submit;
});
function validateEmail(email) {
	const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	return re.test(String(email).toLowerCase());
}
</script>
<?php include('includes/footer.php'); ?>