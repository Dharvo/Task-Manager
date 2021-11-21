<?php
		include ("Connect.php");
        $taskNameUpd = "";
        $assignedToUpd = "";
        $priorityUpd = "";
        $startDateUpd = "";
        $plannedEndUpd = "";
        $actualEndUpd = "";
        $goLiveUpd = "";
        $noOfDaysUpd = "";
        $newStatusUpd = "";
        $notesUpd = "";
        $update = false;
//Deleting a Task's Assessment
if (isset($_GET["delete"])){
    $id = $_GET["delete"];
	$conn->query("DELETE FROM taskmanager WHERE id=$id") or die($sql->error());
    header("location: index.php");
}
//Editing a Task's Assessment
if (isset($_GET["edit"])){
    $id = $_GET["edit"];
    $result = $conn->query("SELECT * FROM taskmanager WHERE id=$id");
    $row = $result->fetch_array();
        //Fetch Requested Data and Output in Form
    $taskNameUpd = $row['taskName'];
    $assignedToUpd = $row['assignedTo'];
    $priorityUpd = $row['priority'];
    $startDateUpd = $row['startDate'];
    $plannedEndUpd = $row['plannedEnd'];
    $actualEndUpd = $row['actualEnd'];
    $goLiveUpd = $row['goLive'];
    $noOfDaysUpd = $row['noOfDays'];
    $newStatusUpd = $row['newStatus'];
    $notesUpd = $row['notes'];
        }
    //Replace values in Form
        $idU = $_POST['id10'] ?? '';
        $taskNameU = $_POST['taskName10'] ?? '';
        $assignedToU = $_POST['assignedTo10'] ?? array();
        $newTeamMem = implode(", ", $assignedToU) ?? "";
        $priorityU = $_POST['priority10'] ?? '';
        $startDateU = $_POST['startDate10'] ?? '';
        $plannedEndU = $_POST['plannedEnd10'] ?? '';
        $actualEndU = $_POST['actualEnd10'] ?? '';
        $goLiveU = $_POST['goLive10'] ?? '';
        $noOfDaysU = $_POST['noOfDays10'] ?? '';
        $newStatusU = $_POST['newStatus10'] ?? '';
        $notesU = $_POST['notes10'] ?? '';
    $sql = ("UPDATE taskmanager SET taskName = '$taskNameU', 
    assignedTo = '$newTeamMem', priority = '$priorityU',
    startDate = '$startDateU', plannedEnd = '$plannedEndU',
    actualEnd = '$actualEndU', goLive = '$goLiveU', noOfDays 
    = '$noOfDaysU', newStatus = '$newStatusU', notes = '$notesU'
     WHERE id=$idU") or die(mysqli_query_error());

if(mysqli_query($conn, $sql)){
    echo
    $taskNameU;
    $assignedToU;
    $newTeamMem;
    $priorityU;
    $startDateU;
    $plannedEndU;
    $actualEndU;
    $goLiveU;
    $noOfDaysU;
    $newStatusU;
    $notesU;
}            
?>