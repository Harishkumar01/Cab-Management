<?php
	require 'connect.php';

	$pass = $_POST["password"];
	$confirm_password = $_POST["confirm_password"];

	if($pass != $confirm_password){
		echo "<script>
		alert('Password mismatch');
		window.location.href='dsignup.html';
		</script>";
	}
	else{
		$query = "insert into driver values (driver_sequence.nextval,'".$_POST["name"]."','".$_POST["email"]."','".$_POST["phone"]."','".$_POST["password"]."','".$_POST["confirm_password"]."')";
		$s = oci_parse($c, $query);
		$r = oci_execute($s);
		


		$query = "insert into vehicle values (vehicle_sequence.nextval,'".$_POST["vehicle"]."',driver_sequence.currval)";
		$s = oci_parse($c, $query);
		$r = oci_execute($s);
		
		
		$query = "select * from driver";
		$s = oci_parse($c, $query);
		if (!$s) {
		    $m = oci_error($c);
		    trigger_error('Could not parse statement: '. $m['message'], E_USER_ERROR);
		}
		$r = oci_execute($s);
		if (!$r) {
		    $m = oci_error($s);
		    trigger_error('Could not execute statement: '. $m['message'], E_USER_ERROR);
		}
		 
		echo "<table border='1'>\n";
		$ncols = oci_num_fields($s);
		echo "<tr>\n";
		for ($i = 1; $i <= $ncols; ++$i) {
		    $colname = oci_field_name($s, $i);
		    echo "  <th><b>".htmlspecialchars($colname,ENT_QUOTES|ENT_SUBSTITUTE)."</b></th>\n";
		}
		echo "</tr>\n";
		 
		while (($row = oci_fetch_array($s, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
		    echo "<tr>\n";
		    foreach ($row as $item) {
		        echo "<td>";
		        echo $item!==null?htmlspecialchars($item, ENT_QUOTES|ENT_SUBSTITUTE):"&nbsp;";
		        echo "</td>\n";
		    }
		    echo "</tr>\n";
		}
		echo "</table>\n";
		header("Location:logindriver.html");
	}

?>