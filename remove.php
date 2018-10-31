<?php
	require 'connect.php';
	$strSQL = "DELETE FROM USER1 WHERE EMAIL = '".$_POST["email"]."'";
	$objParse = oci_parse($c, $strSQL);
	$objExecute = oci_execute($objParse, OCI_DEFAULT);
	if($objExecute)
	{
	oci_commit($c); //*** Commit Transaction ***//

		echo "<script>
		alert('Record Deleted');
		window.location.href='usignup.html';
		</script>";
	}
	else
	{
	oci_rollback($objConnect); //*** RollBack Transaction ***//
	echo "Error Save [".$strSQL."";
		echo "<script>
		alert('Account do not exist please sign up');
		window.location.href='logindriver.html';
		</script>";
	}
?>