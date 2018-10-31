<?php
		session_start();
		require 'connect.php';

		$query = "insert into feedback values (feedback_sequence.nextval,'".$_POST["name"]."','".$_POST["email"]."','".$_POST["subject"]."','".$_POST["message"]."','".$_SESSION['uname']."')";
		$s = oci_parse($c, $query);
		$r = oci_execute($s);

		echo "<script>
			alert('Thankyou for your feedback');
			window.location.href='index.html';
			</script>";
?>