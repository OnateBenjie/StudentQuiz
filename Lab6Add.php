<?php 

	$xml = new domdocument('1.0');
	$xml->load('Onate_Benjie.xml');

	$StudNo = $_POST["StudNo"];
	$name = $_POST['Name'];
	$q1 = $_POST['Q1'];
	$q2 = $_POST['Q2'];
	$q3 = $_POST['Q3'];
	$q4 = $_POST['Q4'];
	$q5 = $_POST['Q5'];

	$newid = $xml->createElement("StudNo");
	$newName = $xml->createElement("Name", $name);
	$newq1 = $xml->createElement("Q1", $q1);
	$newq2 = $xml->createElement("Q2", $q2);
	$newq3 = $xml->createElement("Q3", $q3);
	$newq4 = $xml->createElement("Q4", $q4);
	$newq5 = $xml->createElement("Q5", $q5);

	$newid->setAttribute('id', $StudNo);
	$newid->appendChild($newName);
	$newid->appendChild($newq1);
	$newid->appendChild($newq2);
	$newid->appendChild($newq3);
	$newid->appendChild($newq4);
	$newid->appendChild($newq5);

	$xml->getElementsByTagName("Student")->item(0)->appendChild($newid);
	$xml->save("Onate_Benjie.xml");

	echo "RECORD SAVED <br> <a href='index.php'>Back</a>"


?>