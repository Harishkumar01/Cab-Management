<?php
	require 'connect.php';

	$mail1 = $_POST["email"];
	$pwd1 = $_POST["pwd"];

	echo $mail1;
	echo $pwd1;

	$query = "Select email,password from driver";
	$s = oci_parse($c,$query);
	oci_execute($s);

	while ($row = oci_fetch_array($s)) {
			$x = $row['EMAIL'];
			$y = $row['PASSWORD'];

			if($x == $mail1 && $y == $pwd1){
				echo "<li>".$x."</li><br>";
				echo "<li>".$y."</li><br>";
				$query = "insert into logindriver values (logindriver_sequence.nextval,'".$_POST["email"]."','".$_POST["pwd"]."')";
				$s = oci_parse($c, $query);
				$r = oci_execute($s);		
				header('Location:index.html');
			}
	}
	echo "<script>
		alert('Account do not exist please sign up');
		window.location.href='dsignup.html';
		</script>";
?>