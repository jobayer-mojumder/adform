<!DOCTYPE html>
<html>

<head>
	<meta http-equiv="cache-control" content="no-cache" />
	<title>BILL OF SALE</title>
	<link rel="stylesheet" type="text/css" media="screen" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css" />
	
	<link rel="stylesheet" type="text/css" media="all" href="<?=base_url()?>style/css/fonts7.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?=base_url()?>style/css/screen7.css" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<link rel="stylesheet" type="text/css" media="screen" href="<?=base_url()?>style/css/responsive7.css" />
	<link rel="stylesheet" type="text/css" media="screen" href="<?=base_url()?>style/css/modal.css" />
	<style type="text/css">
		/* LOOK AND FEEL */

		body {
			background: #FCFCFC;
			background-size: cover;
			font-family: 'Lato', sans-serif;
			font-size: 13px;
			background-position: 50% 50%;
		}

		.form_table {
			width: 650px;
			margin-left: auto;
			margin-right: auto;
			border-radius: 0;
			border: 1px solid #D9DDE2;
			background: #FFFFFF;
			background-size: cover;
			color: #36454E;
			overflow: hidden;
			box-shadow: none;
			background-position: 50% 50%;
		}

		.form_table a {
			color: #0D47A1;
		}

		.outside a {
			color: #0D47A1;
		}

		.form_table a:visited {
			color: #0D47A1;
		}

		.outside a:visited {
			color: #0D47A1;
		}

		.segment_header {
			width: auto;
			margin: 1px;
			color: #FFFFFF;
			background: #2196F3;
			background-size: cover;
			background-repeat: repeat;
			background-position: 50% 50%;
			border-radius: 0;
		}

		.segment_header h1 {
			border-radius: 0;
			padding: 20px 10px;
			font-family: 'Lato', sans-serif;
		}

		.q {
			padding: 10px;
			margin-bottom: 10px;
			margin-left: 10px;
			float: left;
			display: block;
		}

		.q .question {
			font-weight: bold;
		}

		.q .left_question_first {
			width: 15em;
		}

		.required .icon {
			background-image: none;
			background-position: left;
			background-repeat: no-repeat;
			font-size: 13px;
			padding-left: 14px;
		}

		.q .text_field {
			/* input:text, input:password, textarea */
			background: #FFFFFF;
			border: 1px solid #D9DDE2;
			border-radius: 2px;
			border-width: 1px;
			color: #36454E;
			font-family: 'Lato', sans-serif;
			font-size: 14px;
			margin: 1px 0;
			padding: 10px;
		}

		.q .file_upload {
			/* input:file */
			background: #FFFFFF;
			border: 1px solid #D9DDE2;
			border-radius: 2px;
			border-width: 1px;
			color: #36454E;
			font-family: 'Lato', sans-serif;
			font-size: 14px;
			margin-top: 1px;
			padding: 10px;
		}

		.q .file_upload_button {
			/* upload button */
			margin-top: 2px;
		}

		.q .inline_grid td {
			/* multi-choice choices */
			padding: 5px;
			vertical-align: baseline;
		}

		.q .drop_down {
			/* select */
			background: #FFFFFF;
			border: 1px solid #D9DDE2;
			border-radius: 2px;
			border-width: 1px;
			color: #36454E;
			font-family: 'Lato', sans-serif;
			font-size: 14px;
			margin: 1px 0;
			padding: 9px;
		}

		.q .matrix th {
			color: #7A858B;
			background: #F0F2F4;
			padding: 5px;
			font-weight: bold;
			text-align: center;
			vertical-align: bottom;
		}

		.q .matrix td {
			padding: 5px;
			text-align: center;
			white-space: nowrap;
			height: 26px;
			border-bottom: 1px solid #D9DDE2;
			border-top: 1px solid #D9DDE2;
		}

		.q .matrix td.question {
			border-right: 1px solid #D9DDE2;
			font-weight: normal;
		}

		.q .matrix .multi_scale_sub th {
			font-weight: normal;
			border-top: 1px solid #D9DDE2 !important;
			background: #F4F6F9;
		}

		.q .matrix .multi_scale_break {
			border-right: 1px solid #D9DDE2;
		}

		.q .matrix_row_dark td {
			color: #36454E;
			background: #FCFCFC;
		}

		.q .matrix_row_dark td.question {
			color: #36454E;
			background: #FCFCFC;
		}

		.q .matrix_row_light td {
			color: #36454E;
			background: #FFFFFF;
		}

		.q .matrix_row_light td.question {
			color: #36454E;
			background: #FFFFFF;
		}

		.q .rating_ranking td {
			padding: 5px;
		}

		.q .scroller {
			border: 1px solid #D9DDE2;
		}

		.highlight {
			/* active item highlight */
			background: #FFF9C4 !important;
		}

		tr.highlight td {
			/* active item highlight */
			background: #FFF9C4 !important;
		}

		.outside {
			color: #36454E;
		}

		.outside_container {
			width: 650px;
			padding: 1em 0;
			margin-left: auto;
			margin-right: auto;
			text-align: center;
			color: #36454E;
		}

		.outside_container .submit_button {
			/* submit buttons */
			color: #FFFFFF !important;
			background: #1795FF;
			background-size: auto;
			border-style: none;
			border-width: 0px;
			border-color: #FFFFFF;
			border-radius: 2px;
			text-align: center;
			font-family: 'Lato', sans-serif;
			font-size: 14px;
			font-weight: normal;
			min-width: 20%;
			padding: 10px 20px;
			text-transform: none;
			box-shadow: none;
		}

		.outside_container .submit_button:hover {
			background: #106AB7;
			border-color: #BBBBBB;
			background-size: auto;
		}

		.progressBarWrapper {
			border-radius: 0;
			background: #FFFFFF;
			background-size: cover;
			border-color: #D9DDE2;
		}

		.progressBarBack {
			color: #FFFFFF;
			background-color: #1795FF;
		}

		.progressBarFront {
			color: #36454E;
		}

		.ui-widget {
			font-family: 'Lato', sans-serif;
		}

		.invalid {
			background: #FDF1F0;
		}

		.invalid .invalid_message {
			color: #EC756B;
			background: #FDF1F0;
			border: 1px solid #EC756B;
			border-radius: 2px;
		}

		.form_table.invalid {
			border: 2px solid #EC756B;
		}

		.invalid .matrix .invalid_row {
			background: #FDF1F0;
		}

		/* END LOOK AND FEEL */
	</style>
	<!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script> -->
	<script type="text/javascript" src="<?=base_url()?>style/js/jquery.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>style/js/jquery-ui.min.js"></script>


	<style>
		#step1,
		#step2,
		#step3,
		#step4,
		#step5,
		#step6,
		#div-sold-date,
		#vehicle_attached,
		#vehicle_attached_file1,
		#vehicle_attached_file2,
		#older-year,
		#other-make,
		#gift-reason-relationship,
		#first-seller-heading,
		#additional-seller-heading,
		#modal-next-button,
		#modal-submit-button {
			display: none;
		}
		.btn_back{
			text-align: center;
			border-radius: 4px;
			font-size: 14px;
			font-weight: normal;
			background: #1795FF;
			color: #FFFFFF;
		}
	</style>

	<script type="text/javascript">
		var instructions = {};
		instructions[53] = "https://developers.google.com/maps/documentation/javascript/examples/places-autocomplete-addressform";
		instructions[23] = "Phone will not appear on Document";
		instructions[24] = "email will not appear on Document";
		instructions[54] = "https://vpic.nhtsa.dot.gov/";
		instructions[39] = "Ex. Parent - Family - Other";
		instructions[49] = "phone will not appear on form";
		instructions[50] = "email will not appear on form";
		instructions[52] = "200";
	</script>

	<script src="<?=base_url()?>style/js/form7.js"></script>
</head>

<body>

	<!-- The Modal -->
	<div style="text-align: center; margin: 10px;">
		<a href="<?=base_url('home')?>" class="submit_button btn_back">GO Back</a>
	</div>
	<div id="myModal" class="modal">
		<div class="modal-content">
			<h1 id = "modal-heading">Error</h1>
			<span class="close" id = "myBtn">&times;</span>						
			<p id = "modal-message">Some text in the Modal..</p>
			
			<div id = "modal-action">
				<button class="special_button" type = "button" id = "stay-here-button">Close</button>
				<button class="special_button" type = "button" id = "modal-next-button">Next >></button>
				<button style = "display:none" class="special_button" type = "submit" id = "modal-submit-button">Submit</button>
			</div>
		</div>				
	</div>

	<form method="post" id="FSForm" name = "bill_form" action="form.php" enctype="multipart/form-data" onsubmit="">

	
	
		<span id="step1">
			<!-- BEGIN_ITEMS -->
			<div class="form_table">

				<div class="clear"></div>

				<div id="q0" class="q full_width">
					<a class="item_anchor" name="ItemAnchor0"></a>
					<div style="text-align:center;">
						<img src="<?=base_url()?>style/images/ARN-_HEADER.jpg" alt="" />
					</div>
				</div>

				<div class="clear"></div>

				<div id="q2" class="q required">
					<a class="item_anchor" name="ItemAnchor1"></a>
					<label class="question top_question" for="date_today">
						<span style="font-size: 18px;">
							<strong>Today's Date ?</strong>
						</span>&nbsp;
						<b class="icon_required" style="color:#FF0000">*</b>
					</label>
					<input type="text" name="date_today" class="text_field calendar_field" id="date_today" size="10" maxlength="10" datemax=""
					 datemin="" value="" date="mm-dd-yy" />
					<img class="svg popup_button inline_button" src="<?=base_url()?>style/icon/calendar.svg" alt="calendar" style="vertical-align:middle;" />

				</div>
				<div id="q3" class="q required">
					<a class="item_anchor" name="ItemAnchor2"></a>
					<span class="question top_question">
						<span style="font-size: 18px;">Is the date of Sale Different ?</span>&nbsp;
						<b class="icon_required" style="color:#FF0000">*</b>
					</span>
					<table class="inline_grid">
						<tr>
							<td>
								<input type="radio" name="same_sale_date_radio" class="multiple_choice" value="yes" />
								<label for="RESULT_RadioButton-2_0">YES</label>
							</td>
						</tr>
						<tr>
							<td>
								<input checked="checked" type="radio" name="same_sale_date_radio" class="multiple_choice" value="no" />
								<label for="RESULT_RadioButton-2_1">NO</label>
							</td>
						</tr>
					</table>
				</div>
				<div id="div-sold-date" class="q required">
					<a class="item_anchor" name="ItemAnchor3"></a>
					<label class="question top_question" for="date_sold">
						<span style="font-size: 18px;">
							<strong>Date Sold ?</strong>
						</span>&nbsp;
						<b class="icon_required" style="color:#FF0000">*</b>
					</label>
					<input type="text" name="date_sold" class="text_field calendar_field" id="date_sold" size="10" maxlength="10" datemax=""
					 datemin="" value="" date="mm-dd-yy" />
					<img class="svg popup_button inline_button" src="<?=base_url()?>style/icon/calendar.svg" alt="calendar" style="vertical-align:middle;" />

				</div>
				<div class="clear"></div>

			</div>
			<!-- END_ITEMS -->
			<script type="text/javascript">var itemRules = { 4: { "criteria": [{ "item": 3, "answer": "0", "operator": "==" }], "action": "show", "join": "||" } };</script>
			
			<div class="outside_container">
				<div class="buttons_reverse">
					<input type="button" value="Next &gt;&gt;" class="submit_button" id="next-1" />
				</div>
			</div>

		</span>




		<span id="step2">

			<div class="outside_container">
				<div class="progressBarWrapper">
					<div class="progressBarBack" style=" width:14%; ">
						<div class="progressBarText">14%&nbsp;Complete</div>
					</div>
					<div class="progressBarFront">
						<div class="progressBarText">14%&nbsp;Complete</div>
					</div>
				</div>
			</div>
			<!-- BEGIN_ITEMS -->
			<div class="form_table">

				<div class="clear"></div>

				<div id="div-form-completed-by" class="q required">
					<a class="item_anchor" name="ItemAnchor5"></a>
					<label class="question top_question" for="RESULT_RadioButton-5">
						<span style="font-size: 18px;">
							<strong>Who is completing this form?</strong>
						</span>&nbsp;
						<b class="icon_required" style="color:#FF0000">*</b>
					</label>
					<select name="form_completed_by" class="drop_down">
						<option value="seller">Seller</option>
						<option value="dealer">Dealer</option>
					</select>
				</div>
				<div id="div-number-of-seller" class="q required">
					<a class="item_anchor" name="ItemAnchor6"></a>
					<label class="question top_question" for="RESULT_RadioButton-6">
						<span style="font-size: 18px;">
							<strong>Number of Seller ?</strong>
						</span>&nbsp;
						<b class="icon_required" style="color:#FF0000">*</b>
					</label>
					<select name="number_of_seller" class="drop_down">
						<option value="1">One</option>
						<option value="2">Two</option>
					</select>
				</div>
				<div id="div-attach-file" class="q required">
					<a class="item_anchor" name="ItemAnchor7"></a>
					<label class="question top_question" for="RESULT_RadioButton-7">
						<span style="font-size: 14px;">
							<strong>Attach Copy ID ?</strong>
						</span>&nbsp;
						<b class="icon_required" style="color:#FF0000">*</b>
					</label>
					<select name="buyer_seller_attach_file" class="drop_down">
						<option value="no">No</option>
						<option value="yes">Yes</option>
					</select>
				</div>

				<div class="clear"></div>

				<div id="div-attached-doc" class="q full_width">
					<a class="item_anchor" name="ItemAnchor8"></a>
					<div class="full_width_space">
						<div>
							<span style="color: #ff0000;">Attached Documents will not attach to form</span>
						</div>
					</div>
				</div>

				<div class="clear"></div>

				<div id="div-result-file-upload-buyer-seller" class="q">
					<a class="item_anchor" name="ItemAnchor9"></a>
					<label class="question top_question" for="buyer_or_seller_attach_file-9"></label>
					<div class="">
						<input type="file" name="buyer_or_seller_attached_file" accept=".jpg, .jpeg .JPG .JPEG" size="25" class="file_upload" id="buyer_or_seller_attach_file-9" />
						<br/>
						<div class="file_upload_files"></div>
						<div class="file_upload_info"></div>
					</div>
				</div>

				<div class="clear"></div>

				<div id="div-result-file-upload-2" class="q">
					<a class="item_anchor" name="ItemAnchor10"></a>
					<label class="question top_question" for="RESULT_FileUpload-10"></label>
					<div class="">
						<input type="file" name="RESULT_FileUpload-10" size="25" class="file_upload2" id="RESULT_FileUpload-10" />
						<br/>
						<div class="file_upload_files"></div>
						<div class="file_upload_info"></div>
					</div>
				</div>

				<div class="clear"></div>

				<div id="div-dealer-name" class="q required">
					<a class="item_anchor" name="ItemAnchor11"></a>
					<label class="question top_question" for="RESULT_TextField-11">
						<span style="font-size: 18px;">
							<strong>Dealer Name</strong>
						</span>&nbsp;
						<b class="icon_required" style="color:#FF0000">*</b>
					</label>
					<input type="text" name="dealer_name" value = "XYZ Motors" class="text_field" id="RESULT_TextField-11" size="25" maxlength="255" value="" />
				</div>
				<div id="div-dealer-number" class="q required">
					<a class="item_anchor" name="ItemAnchor12"></a>
					<label class="question top_question" for="RESULT_TextField-12">
						<span style="font-size: 18px;">
							<strong>Dealer Number</strong>
						</span>&nbsp;
						<b class="icon_required" style="color:#FF0000">*</b>
					</label>
					<input type="text" name="dealer_number" value = "BGD123456" class="text_field" id="RESULT_TextField-12" size="10" maxlength="255" value="" />
				</div>

				<div class="clear"></div>

				<label class="question top_question block-heading" id = "first-seller-heading">
					<span>
						<strong>Seller</strong>
					</span>&nbsp;
				</label>
				<div class="clear"></div>

				<div id="div-sellers-last-name1" class="q required">
					<a class="item_anchor" name="ItemAnchor13"></a>
					<label class="question top_question" for="RESULT_TextField-13">
						<span style="font-size: 18px;">
							<strong>Last Name</strong>
						</span>&nbsp;
						<b class="icon_required" style="color:#FF0000">*</b>
					</label>
					<input type="text" name="sellers_last_name1" value = "Smith" class="name text_field" id="RESULT_TextField-13" size="20" maxlength="255" value=""
					/>
				</div>
				<div id="div-sellers-middle-name1" class="q">
					<a class="item_anchor" name="ItemAnchor14"></a>
					<label class="question top_question" for="RESULT_TextField-14">
						<span style="font-size: 18px;">
							<strong>Middle Name</strong>
						</span>
					</label>
					<input type="text" name="sellers_middle_name1" class="name text_field" id="RESULT_TextField-14" size="15" maxlength="255" value=""
					/>
				</div>
				<div id="div-sellers-first-name1" class="q required">
					<a class="item_anchor" name="ItemAnchor15"></a>
					<label class="question top_question" for="RESULT_TextField-15">
						<span style="font-size: 18px;">
							<strong>First Name</strong>
						</span>&nbsp;
						<b class="icon_required" style="color:#FF0000">*</b>
					</label>
					<input type="text" name="sellers_first_name1" value = "John" class="name text_field" id="RESULT_TextField-15" size="20" maxlength="255" value=""
					/>
				</div>

				<div class="clear"></div>
				<label class="question top_question block-heading" id = "additional-seller-heading">
					<span>
						<strong>Additional Seller</strong>
					</span>&nbsp;
				</label>
				<div class="clear"></div>

				<div id="div-sellers-last-name2" class="q required">
					<a class="item_anchor" name="ItemAnchor16"></a>
					<label class="question top_question" for="RESULT_TextField-16">
						<strong>
							<span style="font-size: 18px;">Last Name</span>
						</strong>&nbsp;
						<b class="icon_required" style="color:#FF0000">*</b>
					</label>
					<input type="text" name="sellers_last_name2" value = "Smith" class="name text_field" id="RESULT_TextField-16" size="20" maxlength="255" value=""
					/>
				</div>
				<div id="div-sellers_middle-name2" class="q">
					<a class="item_anchor" name="ItemAnchor17"></a>
					<label class="question top_question" for="RESULT_TextField-17">
						<span style="font-size: 18px;">
							<strong>Middle Name</strong>
						</span>
					</label>
					<input type="text" name="sellers_middle_name2" class="name text_field" id="RESULT_TextField-17" size="15" maxlength="255" value=""
					/>
				</div>
				<div id="div-sellers-first-name2" class="q required">
					<a class="item_anchor" name="ItemAnchor18"></a>
					<label class="question top_question" for="RESULT_TextField-18">
						<span style="font-size: 18px;">
							<strong>First Name</strong>
						</span>&nbsp;
						<b class="icon_required" style="color:#FF0000">*</b>
					</label>
					<input type="text" name="sellers_first_name2" value = "Robert" class="name text_field" id="RESULT_TextField-18" size="20" maxlength="255" value=""
					/>
				</div>
				<div class="clear"></div>

			</div>
			<!-- END_ITEMS -->
			<div class="outside_container">
				<div class="buttons_reverse">
					<input type="button" value="Next &gt;&gt;" class="submit_button" id="next-2" />
					<input type="button" value="&lt;&lt; Previous" class="submit_button" id="prev-2" />
				</div>
			</div>
		</span>




		<span id="step3">
			<div class="outside_container">
				<div class="progressBarWrapper">
					<div class="progressBarBack" style=" width:29%; ">
						<div class="progressBarText">29%&nbsp;Complete</div>
					</div>
					<div class="progressBarFront">
						<div class="progressBarText">29%&nbsp;Complete</div>
					</div>
				</div>
			</div>
			<!-- BEGIN_ITEMS -->
			<div class="form_table">

				<div class="clear"></div>

				<div id="q25" class="q full_width">
					<a class="item_anchor" name="ItemAnchor20"></a>
					<div class="segment_header" style="width:auto;text-align:Left;">
						<h1 style="font-size:30px;padding:20px 1em ;">SELLER ADDRESS </h1>
					</div>
				</div>

				<div class="clear"></div>


				<div id="q18" class="q required">
					<a class="item_anchor" name="ItemAnchor21"></a>
					<label class="question top_question" for="RESULT_TextField-21">
						<strong>
							<span style="font-size: 18px;">Street Address</span>
						</strong>&nbsp;
						<b class="icon_required" style="color:#FF0000">*</b>
					</label>
					<input type="text" name="seller_street_address" class="text_field" id="RESULT_TextField-21" size="52" maxlength="255" value="1916 Colorado"
					/>
				</div>

				<div class="clear"></div>

				<div id="q19" class="q">
					<a class="item_anchor" name="ItemAnchor22"></a>
					<label class="question top_question" for="RESULT_TextField-22">Address Line 2</label>
					<input type="text" name="seller_address_line_2" class="text_field" id="RESULT_TextField-22" size="52" value="Suite C" />
				</div>

				<div class="clear"></div>

				<div id="q20" class="q required">
					<a class="item_anchor" name="ItemAnchor23"></a>
					<label class="question top_question" for="RESULT_TextField-23">
						<strong>
							<span style="font-size: 18px;">City</span>
						</strong>&nbsp;
						<b class="icon_required" style="color:#FF0000">*</b>
					</label>
					<input type="text" name="seller_city" class="text_field" id="RESULT_TextField-23" size="30" maxlength="255" value="Los Angeles" />
				</div>
				<div id="q21" class="q required">
					<a class="item_anchor" name="ItemAnchor24"></a>
					<label class="question top_question" for="RESULT_RadioButton-24">
						<strong>
							<span style="font-size: 18px;">State</span>
						</strong>&nbsp;
						<b class="icon_required" style="color:#FF0000">*</b>
					</label>
					<select id="RESULT_RadioButton-24" name="seller_state" class="drop_down">
						<option></option>
						<option value="AL">Alabama</option>
                        <option value="AK">Alaska</option>
                        <option value="AZ">Arizona</option>
                        <option value="AR">Arkansas</option>
                        <option value="CA" selected>California</option>
                        <option value="CO">Colorado</option>
                        <option value="CT">Connecticut</option>
                        <option value="DE">Delaware</option>
                        <option value="DC">District Of Columbia</option>
                        <option value="FL">Florida</option>
                        <option value="GA">Georgia</option>
                        <option value="HI">Hawaii</option>
                        <option value="ID">Idaho</option>
                        <option value="IL">Illinois</option>
                        <option value="IN">Indiana</option>
                        <option value="IA">Iowa</option>
                        <option value="KS">Kansas</option>
                        <option value="KY">Kentucky</option>
                        <option value="LA">Louisiana</option>
                        <option value="ME">Maine</option>
                        <option value="MD">Maryland</option>
                        <option value="MA">Massachusetts</option>
                        <option value="MI">Michigan</option>
                        <option value="MN">Minnesota</option>
                        <option value="MS">Mississippi</option>
                        <option value="MO">Missouri</option>
                        <option value="MT">Montana</option>
                        <option value="NE">Nebraska</option>
                        <option value="NV">Nevada</option>
                        <option value="NH">New Hampshire</option>
                        <option value="NJ">New Jersey</option>
                        <option value="NM">New Mexico</option>
                        <option value="NY">New York</option>
                        <option value="NC">North Carolina</option>
                        <option value="ND">North Dakota</option>
                        <option value="OH">Ohio</option>
                        <option value="OK">Oklahoma</option>
                        <option value="OR">Oregon</option>
                        <option value="PA">Pennsylvania</option>
                        <option value="RI">Rhode Island</option>
                        <option value="SC">South Carolina</option>
                        <option value="SD">South Dakota</option>
                        <option value="TN">Tennessee</option>
                        <option value="TX">Texas</option>
                        <option value="UT">Utah</option>
                        <option value="VT">Vermont</option>
                        <option value="VA">Virginia</option>
                        <option value="WA">Washington</option>
                        <option value="WV">West Virginia</option>
                        <option value="WI">Wisconsin</option>
                        <option value="WY">Wyoming</option>
					</select>
				</div>
				<div id="q53" class="q required">
					<a class="item_anchor" name="ItemAnchor25"></a>
					<table class="inline_grid">
						<tr>
							<td>
								<input type="checkbox" name="bypass_verification_checkbox" class="multiple_choice" id="RESULT_CheckBox-25_0" value="true" />
								<label for="RESULT_CheckBox-25_0">Bypass Address Verification</label>
							</td>
							<td>
								<input type="button" value="Verify" class="special_button" id = "seller-verify-button"/>
							</td>
						</tr>
					</table>

					
				</div>

				<div class="clear"></div>

				<div id="q12" class="q required">
					<a class="item_anchor" name="ItemAnchor26"></a>
					<label class="question top_question" for="RESULT_TextField-26">
						<span style="font-size: 18px;">
							<strong>Zip Code</strong>
						</span>&nbsp;
						<b class="icon_required" style="color:#FF0000">*</b>
					</label>
					<input type="number" name="seller_zip" class="number text_field" id="RESULT_TextField-26" size="10" maxlength="255" value="90041" />
				</div>
				<div id="q13" class="q required">
					<a class="item_anchor" name="ItemAnchor27"></a>
					<label class="question top_question" for="RESULT_TextField-27">
						<strong>
							<span style="font-size: 18px;">Phone Number</span>
						</strong>&nbsp;
						<b class="icon_required" style="color:#FF0000">*</b>&nbsp;
						<!-- <img class="svg popup_button instructions" src="<?=base_url()?>style/icon/qbut.svg"> -->
					</label>
					<input type="text" name="seller_phone" value = "1-541-754-3010" class="phone text_field" id="RESULT_TextField-27" size="34" maxlength="255" value=""
					/>
				</div>

				<!-- <div class="clear"></div> -->

				<div id="q14" class="q required">
					<a class="item_anchor" name="ItemAnchor28"></a>
					<label class="question top_question" for="RESULT_TextField-28">
						<span style="font-size: 18px;">
							<strong>Email Address</strong>
						</span>&nbsp;
						<b class="icon_required" style="color:#FF0000">*</b>&nbsp;
						<!-- <img class="svg popup_button instructions" src="<?=base_url()?>style/icon/qbut.svg"> -->
					</label>
					<input type="email" name="seller_email_address" value = "abc@mail.com" class="text_field" id="RESULT_TextField-28" size="52" maxlength="255" value=""
					/>
				</div>
				<div class="clear"></div>

			</div>
			<!-- END_ITEMS -->
			
			<div class="outside_container">
				<div class="buttons_reverse">
					<input type="button" disabled value="Next &gt;&gt;" class="submit_button" id="next-3" />
					<input type="button" value="&lt;&lt; Previous" class="submit_button" id="prev-3" />
				</div>
			</div>
		</span>


		<span id="step4">
			<div class="outside_container">
				<div class="progressBarWrapper">
					<div class="progressBarBack" style=" width:43%; ">
						<div class="progressBarText">43%&nbsp;Complete</div>
					</div>
					<div class="progressBarFront">
						<div class="progressBarText">43%&nbsp;Complete</div>
					</div>
				</div>
			</div>
			<!-- BEGIN_ITEMS -->
			<div class="form_table">

				<div class="clear"></div>

				<div id="q27" class="q full_width">
					<a class="item_anchor" name="ItemAnchor30"></a>
					<div class="segment_header" style="width:auto;text-align:Left;">
						<h1 style="font-size:30px;padding:20px 1em ;">VEHICLE INFORMATION </h1>
						<!-- <input type = "submit" value = "submit"> -->
					</div>
				</div>

				<div class="clear"></div>

				<!-- <div id="q54" class="q required">
					<a class="item_anchor" name="ItemAnchor31"></a>
					<span class="question top_question">VIN Finder&nbsp;
						<b class="icon_required" style="color:#FF0000">*</b>&nbsp;
						<img class="svg popup_button instructions" src="<?=base_url()?>style/icon/qbut.svg">
					</span>
					<table class="inline_grid">
						<tr>
							<td>
								<input type="checkbox" name="RESULT_CheckBox-31" class="multiple_choice" id="RESULT_CheckBox-31_0" value="CheckBox-0" />
								<label for="RESULT_CheckBox-31_0">vPic</label>
							</td>
						</tr>
					</table>
				</div> -->
				<div id="q67" class="q required">
					<a class="item_anchor" name="ItemAnchor32"></a>
					<label class="question top_question" for="RESULT_TextField-32">VIN - IDENTIFICATION NUMBER&nbsp;
						<b class="icon_required" style="color:#FF0000">*</b>
					</label>
					<input type="text" name="vin_number" value = ""  class="text_field" id="RESULT_TextField-32" size="18" maxlength="255" value="" />
				</div>
				<div id="q28" class="q required">
					<a class="item_anchor" name="ItemAnchor33"></a>
					<label class="question top_question" for="RESULT_RadioButton-33">YEAR MODEL&nbsp;
						<b class="icon_required" style="color:#FF0000">*</b>
					</label>
					<select id="RESULT_RadioButton-33" name="year_model" class="drop_down">
						<option></option>
						<option value="2020">2020</option>
						<option value="2019">2019</option>
						<option value="2018">2018</option>
						<option value="2017">2017</option>
						<option value="2016">2016</option>
						<option value="2015">2015</option>
						<option value="2014">2014</option>
						<option value="2013">2013</option>
						<option value="2012">2012</option>
						<option value="2011">2011</option>
						<option value="2010">2010</option>
						<option value="2009">2009</option>
						<option value="2008">2008</option>
						<option value="2007">2007</option>
						<option value="2006">2006</option>
						<option value="2005">2005</option>
						<option value="2004">2004</option>
						<option value="2003">2003</option>
						<option value="2002">2002</option>
						<option value="2001">2001</option>
						<option value="2000">2000</option>
						<option value="1999">1999</option>
						<option value="1998">1998</option>
						<option value="1997">1997</option>
						<option value="1996">1996</option>
						<option value="1995">1995</option>
						<option value="1994">1994</option>
						<option value="1993">1993</option>
						<option value="1992">1992</option>
						<option value="1991">1991</option>
						<option value="1990">1990</option>
						<option value="1989">1989</option>
						<option value="1988">1988</option>
						<option value="1987">1987</option>
						<option value="1986">1986</option>
						<option value="1985">1985</option>
						<option value="1984">1984</option>
						<option value="1983">1983</option>
						<option value="1982">1982</option>
						<option value="1981">1981</option>
						<option value="1980">1980</option>
						<option value="1979">1979</option>
						<option value="1978">1978</option>
						<option value="1977">1977</option>
						<option value="1976">1976</option>
						<option value="1975">1975</option>
						<option value="1974">1974</option>
						<option value="1973">1973</option>
						<option value="1972">1972</option>
						<option value="1971">1971</option>
						<option value="1970">1970</option>
						<option value="1969">1969</option>
						<option value="1968">1968</option>
						<option value="1967">1967</option>
						<option value="1966">1966</option>
						<option value="1965">1965</option>
						<option value="1964">1964</option>
						<option value="1963">1963</option>
						<option value="1962">1962</option>
						<option value="1961">1961</option>
						<option value="1960">1960</option>
						<option value="1959">1959</option>
						<option value="1958">1958</option>
						<option value="1957">1957</option>
						<option value="1956">1956</option>
						<option value="1955">1955</option>
						<option value="1954">1954</option>
						<option value="1953">1953</option>
						<option value="1952">1952</option>
						<option value="1951">1951</option>
						<option value="older">OLDER</option>
					</select>
				</div>
				<div id="older-year" class="q required">
					<a class="item_anchor" name="ItemAnchor34"></a>
					<label class="question top_question" for="RESULT_TextField-34">OLDER YEAR&nbsp;
						<b class="icon_required" style="color:#FF0000">*</b>
					</label>
					<input type="text" name="older_year" class="text_field" id="RESULT_TextField-34" size="4" maxlength="255" value="" />
				</div>
				<div id="make" class="q required">
					<a class="item_anchor" name="ItemAnchor35"></a>
					<label class="question top_question" for="RESULT_RadioButton-35">MAKE&nbsp;
						<b class="icon_required" style="color:#FF0000">*</b>
					</label>
					<select id="RESULT_RadioButton-35" name="make" class="drop_down">
						<option></option>
						<option value="Acura">Acura</option>
						<option value="Alfa Romeo">Alfa Romeo</option>
						<option value="AMC">AMC</option>
						<option value="Audi">Audi</option>
						<option value="BMW">BMW</option>
						<option value="Buick">Buick</option>
						<option value="Cadillac">Cadillac</option>
						<option value="Chevrolet">Chevrolet</option>
						<option value="Chrysler">Chrysler</option>
						<option value="Daewoo">Daewoo</option>
						<option value="Daihatsu">Daihatsu</option>
						<option value="Daimler">Daimler</option>
						<option value="Datsun">Datsun</option>
						<option value="Dodge">Dodge</option>
						<option value="Eagle">Eagle</option>
						<option value="Fiat">Fiat</option>
						<option value="Ford">Ford</option>
						<option value="GMC">GMC</option>
						<option value="Honda">Honda</option>
						<option value="Hummer">Hummer</option>
						<option value="Hyundai">Hyundai</option>
						<option value="Infiniti">Infiniti</option>
						<option value="Isuzu">Isuzu</option>
						<option value="Jaguar">Jaguar</option>
						<option value="Jeep">Jeep</option>
						<option value="Jensen">Jensen</option>
						<option value="Kia">Kia</option>
						<option value="Land Rover">Land Rover</option>
						<option value="Lexus">Lexus</option>
						<option value="Lincoln">Lincoln</option>
						<option value="Lotus">Lotus</option>
						<option value="Maserati">Maserati</option>
						<option value="Mazda">Mazda</option>
						<option value="Mercedes-Benz">Mercedes-Benz</option>
						<option value="Mercury">Mercury</option>
						<option value="MG">MG</option>
						<option value="Mini">Mini</option>
						<option value="Mitsubishi">Mitsubishi</option>
						<option value="Nissan">Nissan</option>
						<option value="Oldsmobile">Oldsmobile</option>
						<option value="Peugeot">Peugeot</option>
						<option value="Plymouth">Plymouth</option>
						<option value="Pontiac">Pontiac</option>
						<option value="Porsche">Porsche</option>
						<option value="Reliant">Reliant</option>
						<option value="Renault">Renault</option>
						<option value="Saab">Saab</option>
						<option value="Saturn">Saturn</option>
						<option value="Scion">Scion</option>
						<option value="Smart">Smart</option>
						<option value="Subaru">Subaru</option>
						<option value="Suzuki">Suzuki</option>
						<option value="Tesla">Tesla</option>
						<option value="Toyota">Toyota</option>
						<option value="Triumph">Triumph</option>
						<option value="Volkswagen">Volkswagen</option>
						<option value="Volvo">Volvo</option>
						<option value="other">OTHER</option>
					</select>
				</div>
				<div id="other-make" class="q required">
					<a class="item_anchor" name="ItemAnchor36"></a>
					<label class="question top_question" for="RESULT_TextField-36">OTHER MAKE&nbsp;
						<b class="icon_required" style="color:#FF0000">*</b>
					</label>
					<input type="text" name="other_make" class="text_field" id="RESULT_TextField-36" size="20" maxlength="255" value="" />
				</div>
				<div id="q34" class="q required">
					<a class="item_anchor" name="ItemAnchor37"></a>
					<label class="question top_question" for="RESULT_TextField-37">LICENSE PLATE CF #&nbsp;
						<b class="icon_required" style="color:#FF0000">*</b>
					</label>
					<input type="text" name="license_plate" value = "1AB2345" class="text_field" id="RESULT_TextField-37" size="8" maxlength="255" value="" />
				</div>
				<div id="q60" class="q required">
					<a class="item_anchor" name="ItemAnchor38"></a>
					<label class="question top_question" for="RESULT_RadioButton-38">Attach Doc ?&nbsp;
						<b class="icon_required" style="color:#FF0000">*</b>
					</label>
					<select id="vehicle_attach_doc" name="vehicle_attach_doc" class="drop_down">
						<option value="no">No</option>
						<option value="yes">Yes</option>
					</select>
				</div>

				<div class="clear"></div>

				<div id="vehicle_attached" class="q full_width">
					<a class="item_anchor" name="ItemAnchor39"></a>
					<div class="full_width_space">
						<div>
							<span style="color: #ff0000;">Attached Documents will not attach to form</span>
						</div>
					</div>
				</div>

				<div class="clear"></div>

				<div id="vehicle_attachment_div" class="q">
					<a class="item_anchor" name="ItemAnchor40"></a>
					<label class="question top_question" for="RESULT_FileUpload-40"></label>
					<div class="">
						<input type="file" name="vehicle_attached_file" accept=".jpg, .jpeg .JPG .JPEG" size="25" class="file_upload2" id="RESULT_FileUpload-40" />
						<br/>
						<div class="file_upload_files"></div>
						<div class="file_upload_info"></div>
					</div>
				</div>

				<div class="clear"></div>

				<div id="vehicle_attached_file2" class="q">
					<a class="item_anchor" name="ItemAnchor41"></a>
					<label class="question top_question" for="RESULT_FileUpload-41"></label>
					<div class="">
						<input type="file" name="" size="25" class="file_upload" id="RESULT_FileUpload-41" />
						<br/>
						<div class="file_upload_files"></div>
						<div class="file_upload_info"></div>
					</div>
				</div>
				<div class="clear"></div>

			</div>
			<!-- END_ITEMS -->
			
			<div class="outside_container">
				<div class="buttons_reverse">
					<input type="button" value="Next &gt;&gt;" class="submit_button" id="next-4" />
					<input type="button" value="&lt;&lt; Previous" class="submit_button" id="prev-4" />
				</div>
			</div>
		</span>


		<span id="step5">
			<div class="outside_container">
				<div class="progressBarWrapper">
					<div class="progressBarBack" style=" width:57%; ">
						<div class="progressBarText">57%&nbsp;Complete</div>
					</div>
					<div class="progressBarFront">
						<div class="progressBarText">57%&nbsp;Complete</div>
					</div>
				</div>
			</div>
			<!-- BEGIN_ITEMS -->
			<div class="form_table">

				<div class="clear"></div>

				<div id="q35" class="q full_width">
					<a class="item_anchor" name="ItemAnchor43"></a>
					<div class="segment_header" style="width:auto;text-align:Left;">
						<h1 style="font-size:30px;padding:20px 1em ;">VEHICLE VALUE </h1>
					</div>
				</div>

				<div class="clear"></div>

				<div id="is-vehicle-gift" class="q required">
					<a class="item_anchor" name="ItemAnchor44"></a>
					<label class="question top_question" for="RESULT_RadioButton-44">
						<strong>
							<span style="font-size: 18px;">IS THIS VEHICLE GIFT ?</span>
						</strong>&nbsp;
						<b class="icon_required" style="color:#FF0000">*</b>
					</label>
					<select id="RESULT_RadioButton-44" name="is_vehicle_gift" class="drop_down">
						<option value="no">No</option>
						<option value="yes">Yes</option>
					</select>
				</div>
				<div id="gift-reason-relationship" class="q required">
					<a class="item_anchor" name="ItemAnchor45"></a>
					<label class="question top_question" for="RESULT_TextField-45">
						<strong>IF THIS IS A GIFT - REASON RELATIONSHIP</strong>&nbsp;
						<b class="icon_required" style="color:#FF0000">*</b>&nbsp;
						<img class="svg popup_button instructions" src="<?=base_url()?>style/icon/qbut.svg">
					</label>
					<input type="text" name="gift_reason_relationship" value = "Brother" class="text_field" id="RESULT_TextField-45" size="25" maxlength="255"
					 value="" />
				</div>
				<div id="q38" class="q required">
					<a class="item_anchor" name="ItemAnchor46"></a>
					<label class="question top_question" for="RESULT_TextField-46">
						<strong>CURRENT VALUE / VALUE OF GIFT</strong>&nbsp;
						<b class="icon_required" style="color:#FF0000">*</b>
					</label>
					<input type="number" name="value_of_gift" value = "20000" class="text_field" id="RESULT_TextField-46" placeholder="$" size="25" maxlength="255"
					 value="" />
				</div>
				<div class="clear"></div>

			</div>
			<!-- END_ITEMS -->
			
			<div class="outside_container">
				<div class="buttons_reverse">
					<input type="button" value="Next &gt;&gt;" class="submit_button" id="next-5" />
					<input type="button" value="&lt;&lt; Previous" class="submit_button" id="prev-5" />
				</div>
			</div>
		</span>

		<span id="step6">
			<div class="outside_container">
				<div class="progressBarWrapper">
					<div class="progressBarBack" style=" width:71%; ">
						<div class="progressBarText">71%&nbsp;Complete</div>
					</div>
					<div class="progressBarFront">
						<div class="progressBarText">71%&nbsp;Complete</div>
					</div>
				</div>
			</div>
			<!-- BEGIN_ITEMS -->
			<div class="form_table">

				<div class="clear"></div>

				<div id="q40" class="q full_width">
					<a class="item_anchor" name="ItemAnchor48"></a>
					<div class="segment_header" style="width:auto;text-align:Left;">
						<h1 style="font-size:30px;padding:20px 1em ;">BUYERS INFORMATION </h1>
					</div>
				</div>

				<div class="clear"></div>

				<div id="q43" class="q required">
					<a class="item_anchor" name="ItemAnchor49"></a>
					<label class="question top_question" for="RESULT_TextField-49">
						<strong>
							<span style="font-size: 18px;">Last Name</span>
						</strong>&nbsp;
						<b class="icon_required" style="color:#FF0000">*</b>
					</label>
					<input type="text" name="buyer_last_name" value = "Ara" class="name text_field" id="RESULT_TextField-49" size="20" maxlength="255" value=""
					/>
				</div>
				<div id="q64" class="q required">
					<a class="item_anchor" name="ItemAnchor50"></a>
					<label class="question top_question" for="RESULT_TextField-50">Middle&nbsp;
						<!-- <b class="icon_required" style="color:#FF0000">*</b> -->
					</label>
					<input type="text" name="buyer_middle_name" class="name text_field" id="RESULT_TextField-50" size="15" maxlength="255" value=""
					/>
				</div>
				<div id="q42" class="q required">
					<a class="item_anchor" name="ItemAnchor51"></a>
					<label class="question top_question" for="RESULT_TextField-51">
						<span style="font-size: 18px;">
							<strong>First Name</strong>
						</span>&nbsp;
						<b class="icon_required" style="color:#FF0000">*</b>
					</label>
					<input type="text" name="buyer_first_name" value = "James" class="name text_field" id="RESULT_TextField-51" size="22" maxlength="255" value=""
					/>
				</div>

				<div class="clear"></div>

				<div id="q44" class="q required">
					<a class="item_anchor" name="ItemAnchor52"></a>
					<label class="question top_question" for="RESULT_TextField-52">
						<span style="font-size: 18px;">
							<strong>Street Address</strong>
						</span>&nbsp;
						<b class="icon_required" style="color:#FF0000">*</b>
					</label>
					<input type="text" name="buyer_street_address" value = "1916 Colorado" class="text_field" id="RESULT_TextField-52" size="52" maxlength="255" value=""
					/>
				</div>

				<div class="clear"></div>

				<div id="q45" class="q">
					<a class="item_anchor" name="ItemAnchor53"></a>
					<label class="question top_question" for="RESULT_TextField-53">Address Line 2</label>
					<input type="text" name="buyer_address_line_2" value = "Suite C" class="text_field" id="RESULT_TextField-53" size="52" value="" />
				</div>
				<!-- <div id="q55" class="q required">
					<a class="item_anchor" name="ItemAnchor54"></a>
					<span class="question top_question">Verify Address&nbsp;
						<b class="icon_required" style="color:#FF0000">*</b>
					</span>
					<table class="inline_grid">
						<tr>
							<td>
								<input type="checkbox" name="RESULT_CheckBox-54" class="multiple_choice" id="RESULT_CheckBox-54_0" value="CheckBox-0" />
								<label for="RESULT_CheckBox-54_0">GoogleMapsAPI</label>
							</td>
						</tr>
					</table>
				</div> -->

				<div class="clear"></div>

				<div id="q46" class="q required">
					<a class="item_anchor" name="ItemAnchor55"></a>
					<label class="question top_question" for="RESULT_TextField-55">
						<strong>
							<span style="font-size: 18px;">City</span>
						</strong>&nbsp;
						<b class="icon_required" style="color:#FF0000">*</b>
					</label>
					<input type="text" name="buyer_city" value = "Los Angeles" class="text_field" id="RESULT_TextField-55" size="30" maxlength="255" value="" />
				</div>
				<div id="q47" class="q required">
					<a class="item_anchor" name="ItemAnchor56"></a>
					<label class="question top_question" for="RESULT_RadioButton-56">State&nbsp;
						<b class="icon_required" style="color:#FF0000">*</b>
					</label>
					<select id="RESULT_RadioButton-56" name="buyer_state" class="drop_down">
						<option></option>
						<option value="AL">Alabama</option>
                        <option value="AK">Alaska</option>
                        <option value="AZ">Arizona</option>
                        <option value="AR">Arkansas</option>
                        <option value="CA" selected>California</option>
                        <option value="CO">Colorado</option>
                        <option value="CT">Connecticut</option>
                        <option value="DE">Delaware</option>
                        <option value="DC">District Of Columbia</option>
                        <option value="FL">Florida</option>
                        <option value="GA">Georgia</option>
                        <option value="HI">Hawaii</option>
                        <option value="ID">Idaho</option>
                        <option value="IL">Illinois</option>
                        <option value="IN">Indiana</option>
                        <option value="IA">Iowa</option>
                        <option value="KS">Kansas</option>
                        <option value="KY">Kentucky</option>
                        <option value="LA">Louisiana</option>
                        <option value="ME">Maine</option>
                        <option value="MD">Maryland</option>
                        <option value="MA">Massachusetts</option>
                        <option value="MI">Michigan</option>
                        <option value="MN">Minnesota</option>
                        <option value="MS">Mississippi</option>
                        <option value="MO">Missouri</option>
                        <option value="MT">Montana</option>
                        <option value="NE">Nebraska</option>
                        <option value="NV">Nevada</option>
                        <option value="NH">New Hampshire</option>
                        <option value="NJ">New Jersey</option>
                        <option value="NM">New Mexico</option>
                        <option value="NY">New York</option>
                        <option value="NC">North Carolina</option>
                        <option value="ND">North Dakota</option>
                        <option value="OH">Ohio</option>
                        <option value="OK">Oklahoma</option>
                        <option value="OR">Oregon</option>
                        <option value="PA">Pennsylvania</option>
                        <option value="RI">Rhode Island</option>
                        <option value="SC">South Carolina</option>
                        <option value="SD">South Dakota</option>
                        <option value="TN">Tennessee</option>
                        <option value="TX">Texas</option>
                        <option value="UT">Utah</option>
                        <option value="VT">Vermont</option>
                        <option value="VA">Virginia</option>
                        <option value="WA">Washington</option>
                        <option value="WV">West Virginia</option>
                        <option value="WI">Wisconsin</option>
                        <option value="WY">Wyoming</option>
					</select>
				</div>

				<div id="q48" class="q required">
					<a class="item_anchor" name="ItemAnchor57"></a>
					<label class="question top_question" for="RESULT_TextField-57">Zip Code&nbsp;
						<b class="icon_required" style="color:#FF0000">*</b>
					</label>
					<input type="text" name="buyer_zip" value = "90041" class="number text_field" id="RESULT_TextField-57" size="10" maxlength="255" value="" />
				</div>

				<div class="clear"></div>
				<div id="q53" class="q required">
					<a class="item_anchor" name="ItemAnchor25"></a>
					<table class="inline_grid">
						<tr>
							<td>
								<input type="checkbox" name="bypass_verification_checkbox_buyer" class="multiple_choice" value="true" />
								<label for="RESULT_CheckBox-25_0">Bypass Address Verification</label>
							</td>
							<td>
								<input type="button" value="Verify" class="special_button" id = "buyer-verify-button"/>
							</td>
						</tr>
					</table>					
				</div>

				<div class="clear"></div>
				<div id="q49" class="q required">
					<a class="item_anchor" name="ItemAnchor58"></a>
					<label class="question top_question" for="RESULT_TextField-58">Phone Number&nbsp;
						<b class="icon_required" style="color:#FF0000">*</b>&nbsp;
						<img class="svg popup_button instructions" src="<?=base_url()?>style/icon/qbut.svg">
					</label>
					<input type="text" name="buyer_phone" value = "12-33-9434" class="phone text_field" id="RESULT_TextField-58" size="34" maxlength="255" value="" />
				</div>

				<div class="clear"></div>

				<div id="q50" class="q">
					<a class="item_anchor" name="ItemAnchor59"></a>
					<label class="question top_question" for="RESULT_TextField-59">Email Address&nbsp;
						<img class="svg popup_button instructions" src="<?=base_url()?>style/icon/qbut.svg">
					</label>
					<input type="email" name="buyer_email" value = "example@mail.com" class="text_field" id="RESULT_TextField-59" size="52" maxlength="255" value="" />
				</div>
				<div class="clear"></div>

			</div>
			<!-- END_ITEMS -->
			
			<div class="outside_container">
				<div class="buttons_reverse">
					<!-- <input type="button" value="Submit" class="submit_button" id="next-6" /> -->
					<input type="button" disabled value="Submit" class="special_button" id = "final-submit-button"/>
					<input type="button" value="&lt;&lt; Previous" class="submit_button" id="prev-6" />
				</div>
			</div>
		</span>

	</form>

	<div class="loading-modal"><!-- Place at bottom of page --></div>

	<script src="<?=base_url()?>style/js/main.js"></script>
</body>

</html>
