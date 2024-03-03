<?php 

	$xml = new domdocument('1.0');
	$xml->load('Onate_Benjie.xml');
	$xml -> formatOutput = true;
	$xml -> preserveWhiteSpace = false;

	$id = $_POST['id'];
	$students = $xml->getElementsByTagName('StudNo');

	foreach($students as $student){
		$oldid = $student->getAttribute('id');
			if($id == $oldid){
				$xml->getElementsByTagName('Student')->item(0)->removeChild($student);
				$xml->save('Onate_Benjie.xml');
				echo "RECORD DELETED <br> <a href='index.php'>Back</a>";
				break;
			}
	}

?>