<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Contact Us - Shield Plus</title>
	<link rel="stylesheet" type="text/css" href="./css/contact-us.css">
    <script src="javascript/contact-us.js"></script>
</head>

<body>
<div class="main-container">

	<?php include_once('inc/header1-1.php'); ?>
	
    <div class="contact-details">
	<div class = "c1">
            <h1>Contact Shield Plus</h2>
            <p>If you have any questions or need assistance, we're here to help!</p>
            <button onclick="askContactNow()">Contact Us Now</button>

            <p>Do you require help with your health insurance? Speak with Shield Plus right now for individualised assistance. 
            Our staff is available to assist you in locating the ideal insurance plan to meet your needs. Contact us by phone, email, or 
            by completing the form below. Our top priorities are your well-being and mental clarity!</p>
        </div>

        <div class = "forms">
        <fieldset>
        <legend>Fill the form</legend>
        <form action="contact.php" method="post">
            <label>Your Name:</label><br>
            <input type="text" id="name" name="name" required><br><br>
            <label>Your Email:</label><br>
            <input type="email" id="email" name="email" required><br><br>
            <label>Message:</label><br>
            <textarea id="message" name="message" required></textarea><br><br>
            <input type="button" id="submitButton" value="Submit" onclick="myfunction()">
        </form>
        </fieldset>

        <br><br>

        <fieldset>
            <legend><b>Contact us via</b></legend>  
            <div class = "det">
                Adress : 124, Colombo 7, Galle Face<br><br>
                Phone : +94 11 5 745 856 <br><br>
                Email : shieldplusinsurance@gmail.com<br><br>
                <a href="#">web : www.shieldplus.com</a>
            </div>
        </fieldset>	

	<footer>
		<hr>
		&copy; 2024 Copyright Reserved - Shield Plus Insurance <br>
		<small>email@shieldplus.com</small>
	</footer>
    </div>
	</div>


</body>
</html>