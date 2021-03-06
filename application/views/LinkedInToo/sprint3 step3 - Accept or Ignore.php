﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<base href="<?php echo base_url(); ?>" />
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title><?php echo $heading; ?></title>
<?php echo link_css($css_url); ?>
<?php echo link_css($css_url_1); ?>
<link rel="shortcut icon" href="images/favicon.ico" />

</head>

<body id="pagekey-iwe_reconnect" class="en member v2  chrome-v5 chrome-v5-responsive sticky-bg js ">
<div id="header" class="global-header responsive-header nav-v5-2-header responsive-1">
	<div id="top-header">
		<div class="wrapper">
			<div class="header-section first-child">
				<h2 class="logo-container">
					<a id="in-logo" class="logo" href="#"> LinkedIn </a>
				</h2>
				<form id="global-search" class="global-search voltron voltron-vertical-selector">
					<fieldset>
						<legend>Find People, Jobs, Companies, and More</legend>
						<div id="control_gen_2" class="search-scope global-nav-styled-dropdown">
							<label for="main-search-category">Search for: </label>
							<span class="label">
								<span class="styled-dropdown-select-all">All</span>
							</span>
							<select id="main-search-category" class="search-category" name="type">
								<option class="all" value="all" title="">All</option>
								<option class="people" value="people" title="">People</option>
								<option class="jobs" value="jobs" title="">Jobs</option>
								<option class="companies" value="companies" title="">Companies</option>
								<option class="groups" value="groups" title="">Groups</option>
								<option class="edu" value="edu" title="">Edu</option>
								<option class="inbox" value="inbox" title="">Inbox</option>
							</select>
							<ul class="search-selector">
								<li class="all option first selected highlighted"><div>All</div></li>
								<li class="people option"><div>People</div></li>
								<li class="jobs option"><div>Jobs</div></li>
								<li class="companies option"><div>Companies</div></li>
								<li class="groups option"><div>Groups</div></li>
								<li class="edu option"><div>Universities</div></li>
								<li class="inbox option"><div>Inbox</div></li>
							</ul>
						</div>
						<div id="search-box-container" class="search-box-container">
							<span id="search-autocomplete-container" class="/typeahead">
								<input id="main-search-box" class="search-term yui-ac-input" type="text" autocomplete="off" value="" name="keywords" placeholder="Search for people, jobs, companies, and more..." />
								<span id="search-typeahead-container"></span>
							</span>
						</div>
						<button class="search-button" type="submit" value="Search" name="search">
							<span>Search</span>
						</button>
					</fieldset>
					<div class="advanced-search-outer">
						<div class="advanced-search-inner">
							<a id="advanced-search" class="advanced-search" href="">Advanced </a>
						</div>
					</div>
				</form>
			</div>
			<div class="header-section last-child">
				<ul id="control_gen_5" class="nav utilities" role="navigation">
					<li class="nav-item activity-tab"><a class="activity-toggle inbox-alert" href="<?php echo base_url();?>index.php/LinkedIn/add_connection/load_requests">Inbox</a></li>
					<li class="nav-item activity-tab"><a class="activity-toggle notifications-alert" href="">Notifications</a></li>
					<li class="nav-item activity-tab"><a class="activity-toggle add-connections-btn" href="">Add Connections</a></li>
					<li class="nav-item account-settings-tab"><a class="account-toggle" href=""><img src="images/profilepic.jpg" width="20" height="20" /></a></li>
				</ul>
			</div>
		</div>
	</div>
	<div id="responsive-nav-scrollable" class="responsive-nav">
		<div class="wrapper">
			<ul id="control_gen_6" class="nav main-nav" role="navigation">
				<li class="nav-item"><a href="" class="nav-link">Home</a></li>
				<li class="nav-item"><a href="" class="nav-link">Profile</a>
					<ul id="profile-sub-nav" class="sub-nav">
						<li><a href="">Edit Profile</a></li>
						<li><a href="">Who viewed your Profile</a></li>
					</ul>
				</li>
				<li class="nav-item"><a href="" class="nav-link">Network</a>
					<ul id="profile-sub-nav" class="sub-nav">
						<li><a href="">Contacts</a></li>
						<li><a href="">Add Connections</a></li>
						<li><a href="">Find Alumni</a></li>
					</ul>
				</li>
				<li class="nav-item"><a href="" class="nav-link">Jobs</a></li>
				<li class="nav-item"><a href="" class="nav-link">Interests</a>
					<ul id="profile-sub-nav" class="sub-nav">
						<li><a href="">Companies</a></li>
						<li><a href="">Groups</a></li>
						<li><a href="">Influencers</a></li>
						<li><a href="">Education</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</div>
<div id="body" class="">
<div class="wrapper hp-nus-wrapper">
<div id="main" class="grid-c">
<div id="content" class="inbox-v2 ads-v2">
<div id="inbox-tabview" class="inbox-tabview">
<div class="content">
	<div id="invitations" class=" inbox-null">
		<form id="bulk-form" novalidate="novalidate" name="bulkActionForm" method="POST" action="/inbox/bulk_action">
			<div class="new-bulk">
				<a class="new-link btn-quaternary" href="">Add connections</a>
				<ul class="bulk">
					<li><input class="btn-quaternary" type="submit" value="Accept" name="bulkInvitationAccept" disabled="" /></li>
					<li><input class="btn-quaternary" type="submit" value="Ignore" name="bulkInvitationIgnore" disabled="" /></li>
				</ul>
			</div>
			<div class="select-filters-sort">
				<div class="select">
					<h4>Select:</h4>
					<ul>
						<li><a class="select-all disabled" href="#">All</a></li>
						<li><a class="select-none disabled" href="#">None</a></li>
					</ul>
				</div>
			</div>
			<ol class="inbox-list "></ol>
		</form>
		<div class="pymk">
			<!-- <h3>People you may know...</h3> -->
			<ul id="control_gen_15">
				<?php if($results != NULL)
				{
					foreach ($results as $iter):?>
					<li class="person">
						<img class="photo" width="40" height="40" alt="No Photo" src="images/ghost_profile_40x40_v1.png" />
						<div class="content">
							<span class="new-miniprofile-container">
								<strong><h4><a class="fn" href="#"><?php echo $iter->user_id2; ?></a></h4></strong>
							</span>
							<p class="headline">Accountant at Mobilink Franchise</p>
							<ul class="inbox-actions">
								<form id="acceptFrom" method="post" action="<?php echo base_url();?>index.php/LinkedIn/add_connection/accept_request">
									<li>
										<!-- <input type="hidden" name="contact_fname" value="<?php echo $iter->firstName; ?>"> -->
										<!-- <input type="hidden" name="contact_lname" value="<?php echo $iter->lastName; ?>"> -->
										<input type="hidden" name="contact_id" value="<?php echo $iter->user_id2; ?>">
										<!-- <a class="btn-ternary invite-dialog" title="Invite <?php echo $iter->firstName; ?> to connect">Connect</a> -->
										<button class="btn-ternary invite-dialog" type="submit" value="Connect" name="connect">
											<span>Connect</span>
										</button>
										<!-- <input class="btn-ternary invite-dialog" type="submit" value="Connect" /> -->
									</li>
								</form>
								<form id="ignoreFrom" method="post" action="<?php echo base_url();?>index.php/LinkedIn/add_connection/ignore_request">
									<li>
										<input type="hidden" name="contact_id" value="<?php echo $iter->user_id2; ?>">
										<div id="control_gen_9" class="droplist" style="position: static;">
											<!-- <a class="no-track btn-quaternary" href="#">Ignore</a> -->
											<button class="btn-ternary invite-dialog" type="submit" value="Ignore" name="ignore">
												<span>Ignore</span>
											</button>
											<!-- <input class="no-track btn-quaternary" type="submit" value="Ignore" /> -->
										</div>
									</li>
								</form>	
							</ul>
						</div>
					</li>
				<?php endforeach; } ?>
			</ul>
		</div>
	</div>
</div>
</div>
</div>
</div>
</div>
</div>
	<div class="footer">
		<ul class="footer-links">
			<li class="bold"><a href="#"><strong>Help Center</strong></a></li>
			<li><a href="#">About</a></li>
			<li><a href="#">Press</a></li>
			<li><a href="#">Blog</a></li>
			<li><a href="#">Careers</a></li>
			<li><a href="#">Advertising</a></li>
			<li><a href="#">Talent Solutions</a></li>
			<li><a href="#">Tools</a></li>
			<li><a href="#">Mobile</a></li>
			<li><a href="#">Developers</a></li>
			<li><a href="#">Publishers</a></li>
			<li><a href="#">Language</a></li>
		</ul>
		<div class="clear"></div>
		<ul class="footer-links">
			<li><a href="#"><strong>Upgrade Your Account</strong></a></li>
		</ul>
		<div class="clear"></div>
		<ul class="footer-links">
			<li><img src="images/logo-footer.png" alt="Footer Logo" /></li>
			<li><a href="#">User Agreement </a></li>
			<li><a href="#">Privacy Policy </a></li>
			<li><a href="#">Community Guidelines </a></li>
			<li><a href="#">Cookie Policy </a></li>
			<li><a href="#">Copyright Policy </a></li>
		</ul>
	</div> <!-- END: FOOTER -->
</body>

</html>
