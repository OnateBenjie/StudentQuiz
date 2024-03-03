<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="lab6.css">
    <title>Lab 6</title>
</head>
<body>
    <h1>Student Quiz</h1>

    <div class="crud">
        <button onclick="Add()">Add</button>
        <button onclick="Edit()">Edit</button>
        <button onclick="List()">List</button>
        <button onclick="Delete()">Delete</button>
    </div>
    <div class="info">
        <?php
        $xml = new domdocument('1.0');
        $xml->load('Onate_Benjie.xml');

        $students = $xml->getElementsByTagName("StudNo");
         
        echo " <table><thead><tr>";
        echo " <td>StudNo</td>";
        echo " <td>Name</td>";
        echo " <td>Quiz1</td>";
        echo " <td>Quiz2</td>";
        echo " <td>Quiz3</td>";
        echo " <td>Quiz4</td>";
        echo " <td>Quiz5</td>";
        echo " <td>Average</td>";
        echo " </tr> </thead>";
        echo "<tbody>";

            foreach($students as $StudNo){
                $id = $StudNo->getAttribute("id");
                $Name = $StudNo->getElementsByTagName("Name")->item(0)->nodeValue;
                $q1 = $StudNo->getElementsByTagName("Q1")->item(0)->nodeValue;
                $q2 = $StudNo->getElementsByTagName("Q2")->item(0)->nodeValue;
                $q3 = $StudNo->getElementsByTagName("Q3")->item(0)->nodeValue;
                $q4 = $StudNo->getElementsByTagName("Q4")->item(0)->nodeValue;
                $q5 = $StudNo->getElementsByTagName("Q5")->item(0)->nodeValue;

                $ave = ($q1 + $q2 + $q3 + $q4 + $q5) / 5;

                echo "<tr>";
                echo "<td>$id</td>";
                echo "<td>$Name</td>";
                echo "<td>$q1</td>";
                echo "<td>$q2</td>";
                echo "<td>$q3</td>";
                echo "<td>$q4</td>";
                echo "<td>$q5</td>";
                echo "<td>$ave</td>";
                echo "</tr>";
                
        }
                echo "</tbody></table>";
        ?>
    </div>


    <div class="Form" id="addForm">
        <span class="closebutton" onclick="closeAdd()" style="position: absolute; top: 15px; right: 20px;">x</span>
        <h2>Add Student Quiz</h2>
        <form method="POST" action="Lab6Add.php">
            <input type="text" id="StudNo" name="StudNo" placeholder="StudNo" required>
            <input type="text" name="Name" placeholder="Name" required>
            <input type="number" name="Q1" placeholder="Quiz1" required>
            <input type="number" name="Q2" placeholder="Quiz2" required>
            <input type="number" name="Q3" placeholder="Quiz3" required>
            <input type="number" name="Q4" placeholder="Quiz4" required>
            <input type="number" name="Q5" placeholder="Quiz5" required>
            <input type="submit" name="Submit">

        </form>

    </div>

    <div class="Form" id="editForm">
        <form method="POST" action="Lab6Edit.php">
            <span class="closebutton" onclick="closeEdit()" style="position: absolute; top: 15px; right: 20px;">x</span>
            <h2>Edit Student Quiz</h2>
            <p>Select StudNo</p>
            <select name="StudNo">

                <?php
                $xml = new domdocument('1.0');
                $xml->load("Onate_Benjie.xml");

                $students = $xml->getElementsByTagName("StudNo");

                foreach($students as $student){
                $id = $student->getAttribute('id');

                echo "
                <option>$id</option>";
                }
                ?>
            </select>
            <input type="text" name="newName" placeholder="Name">
            <input type="number" name="newQ1" placeholder="Quiz1">
            <input type="number" name="newQ2" placeholder="Quiz2">
            <input type="number" name="newQ3" placeholder="Quiz3">
            <input type="number" name="newQ4" placeholder="Quiz4">
            <input type="number" name="newQ5" placeholder="Quiz5">
            <input type="submit" name="update">
        </form>
    </div>
    <div class="Form" id="listForm">
        <span class="closebutton" onclick="closeList()" style="position: absolute; top: 15px; right: 20px;">x</span>
        <h2>Lists of Student Quiz</h2>
        <?php
        $xml = new domdocument('1.0');
        $xml->load('Onate_Benjie.xml');

        $students = $xml->getElementsByTagName("StudNo");
        foreach($students as $student){

        $id = $student->getAttribute("id");
        $Name = $student->getElementsByTagName("Name")->item(0)->nodeValue;
        $Q1 = $student->getElementsByTagName("Q1")->item(0)->nodeValue;
        $Q2 = $student->getElementsByTagName("Q2")->item(0)->nodeValue;
        $Q3 = $student->getElementsByTagName("Q3")->item(0)->nodeValue;
        $Q4 = $student->getElementsByTagName("Q4")->item(0)->nodeValue;
        $Q5 = $student->getElementsByTagName("Q5")->item(0)->nodeValue;

        $ave = ($Q1 + $Q2 + $Q3 + $Q4 + $Q5) / 5;

        echo "<br><p><b>Student No:</b> $id </p>";
        echo "<p><b>Name:</b> $Name </p>";
        echo "<p><b>Quiz1:</b> $Q1 </p>";
        echo "<p><b>Quiz2: </b>$Q2 </p>";
        echo "<p><b>Quiz3: </b>$Q3 </p>";
        echo "<p><b>Quiz4: </b>$Q4 </p>";
        echo "<p><b>Quiz5: </b>$Q5 </p>";
        echo "<p><b>Average: </b>$ave</p><br>";

        }

        ?>

    </div>
    
    <div class="Form" id="delForm">
        <span class="closebutton" onclick="closeDel()" style="position: absolute; top: 15px; right: 20px;">x</span>
        <h2>Delete Student Quiz</h2>
        <form method="POST" action="Lab6Del.php">
            <p>Select StudNo</p>
            <select name="id">
                <?php
                $xml = new domdocument('1.0');
                $xml->load('Onate_Benjie.xml');

                $Students = $xml->getElementsByTagName('StudNo');

                foreach($Students as $Student){
                $id = $Student->getAttribute('id');

                echo "
                <option>$id</option>";
                }
                ?>
            </select>
            <input type="submit" name="delete">
        </form>
    </div>

    <script src="Lab6.js"></script>
</body>
</html>