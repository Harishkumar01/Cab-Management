<?php

require 'connect.php';
session_start();

if(isset($_SESSION['uname'])){
    echo $_SESSION["uname"];
}
else{
    echo "<script>
        alert('Please login to book');
        window.location.href='loginuser.html';
        </script>";
}

$query = "insert into booking values (booking_sequence.nextval,'".$_POST["name"]."','".$_POST["email"]."','".$_POST["phone"]."','".$_POST["from"]."','".$_POST["to"]."',to_date('".$_POST["date"]."','MM/DD/YYYY'),'".$_SESSION["uname"]."')";
$s = oci_parse($c, $query);
$r = oci_execute($s);

$a = $_POST["vehicle"];

echo $a;

$query = "select * from vehicle";
$s = oci_parse($c, $query);
$r = oci_execute($s);
$f = 0;

while($row = oci_fetch_array($s)){
    $x = $row['NAME'];
    if($x == $a){
        $query1 = "insert into slot values (slot_sequence.nextval,booking_sequence.currval,'".$row['NAME']."','".$row['DRIVER_ID']."','".$_SESSION['uname']."')";
        $s1 = oci_parse($c, $query1);
        $r1 = oci_execute($s1);
        $f = 1;
        break;  
    }
}

if($f == 0){
        echo "<script>
        alert('Please select other cars');
        window.location.href='carlist.php';
        </script>";
}


echo "<script>
        alert('Your booking in successful Please check your rides');
        window.location.href='rides.php';
        </script>";


$query = "select * from booking";
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

header('Location:index.html');

?>