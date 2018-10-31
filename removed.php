<?php
	require 'connect.php';
	$strSQL = "DELETE FROM DRIVER WHERE EMAIL = '".$_POST["email"]."'";
	$objParse = oci_parse($c, $strSQL);
	$objExecute = oci_execute($objParse, OCI_DEFAULT);
	if($objExecute)
	{
	oci_commit($c); //*** Commit Transaction ***//
	echo "<script>
		alert('Record deleted');
		window.location.href='dsignup.html';
		</script>";
	}
	else
	{
	oci_rollback($objConnect); //*** RollBack Transaction ***//
	echo "Error Save [".$strSQL."";
		echo "<script>
		alert('Account do not exist please sign up');
		window.location.href='loginuser.html';
		</script>";
	}
?>