<div class="profile">
	<h4>First name : <?php echo $this->session->userdata('logged_in')['firstname']; ?></h4>
	<h4>Last name : <?php echo $this->session->userdata('logged_in')['lastname']; ?></h4>
	<h4>Mobile : <?php echo $this->session->userdata('logged_in')['mobile']; ?></h4>
	<h4>Email : <?php echo $this->session->userdata('logged_in')['email']; ?></h4>
	<h4>Change password</h4>
</div>