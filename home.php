<?php
		include ("Connect.php");
			// Taking all values from the form
		$taskName = $_POST ["taskName"] ?? ''; 
		$assignedTo = $_POST ["assignedTo"] ?? array();
			// Convert The Submitted Multiple Array Value
		$teamMem = implode(", ", $assignedTo) ?? '';
		$priority = $_POST ['priority'] ?? '';
		$startDate = $_POST ['startDate'] ?? '';
		$plannedEnd = $_POST ['plannedEnd'] ?? '';
		$actualEnd = $_POST ['actualEnd'] ?? '';
		$goLive = $_POST ["goLive"] ?? '';
		$noOfDays = $_POST ["noOfDays"] ?? '';
		$newStatus = $_POST ["newStatus"] ?? '';
		$notes = $_POST ["notes"] ?? '';

			// Performing insert query execution
		$sql = "INSERT INTO taskmanager VALUES ('','$taskName',
			'$teamMem', '$priority', '$startDate', '$plannedEnd',
             '$actualEnd', '$goLive', '$noOfDays', '$newStatus', '$notes')";
            //OUTPUT SOME DETAILS
		if(mysqli_query($conn, $sql)){
			$result = mysqli_query($conn, "select * from taskmanager");
			$row = mysqli_fetch_array($result);
			echo 
            "<td>*</td>".
            "<td>$taskName</td>
			<td>$teamMem</td>
			<td>$priority</td>
            <td>$startDate</td>
            <td>$plannedEnd</td>
            <td>$actualEnd</td>
            <td>$goLive</td>
            <td>$noOfDays</td>
            <td>$newStatus</td>
            <td>$notes</td>";
		} else{
			echo "ERROR: Hush! Sorry $sql. "
				. mysqli_error($conn);
		}
		// Close connection
		mysqli_close($conn);
?>