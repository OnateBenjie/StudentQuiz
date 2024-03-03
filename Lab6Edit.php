<?php 
if(isset($_POST['update'])){
$xml = new domdocument('1.0');
$xml->load("Onate_Benjie.xml");

$id = $_POST["StudNo"];

$StudNos = $xml->getElementsByTagName("StudNo");

$flag=0;

foreach($StudNos as $StudNo){
	$oldid = $StudNo->getAttribute("id");

	if ($id == $oldid){
		$newName = $_POST['newName'];
		$newQ1 = $_POST['newQ1'];
		$newQ2 = $_POST['newQ2'];
		$newQ3 = $_POST['newQ3'];
		$newQ4 = $_POST['newQ4'];
		$newQ5 = $_POST['newQ5'];

		$newNode = $xml->createElement("StudNo");
		$newNode->setAttribute("id",$id);
		$newNode->appendChild($xml->createElement("Name", $newName));
		$newNode->appendChild($xml->createElement("Q1", $newQ1));
		$newNode->appendChild($xml->createElement("Q2", $newQ2));
		$newNode->appendChild($xml->createElement("Q3", $newQ3));
		$newNode->appendChild($xml->createElement("Q4", $newQ4));
		$newNode->appendChild($xml->createElement("Q5", $newQ5));

		$studno = $xml->getElementsByTagName("StudNo");
		$oldNode = $StudNo;
		$xml->getElementsByTagName("Student")->item(0)->replaceChild($newNode, $oldNode);
		$xml->save('Onate_Benjie.xml');
		echo "RECORD CHANGED <br> <a href='index.php'>Back</a>";
		break;
		}
	}
}
?>