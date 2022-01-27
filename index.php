<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta
			name="viewport"
			content="width=device-width, initial-scale=10"
		/>
		<meta name="description" content="task manager graph dashboard admin team tasks" />
		<title>Project Manager</title>
		<!--	CSS FILES 	-->
		<link
			rel="stylesheet"
			href="./css/index.css"
			type="text/css"
			media="screen"
		/>
		<link rel="shortcut icon" href="./dist/Company_Logo.png" type="image/png" />
		<!--		CHART.JS JAVASCRIPT		 	-->
		<script defer src="./dist/chart.js/dist/chart.js"></script>
		 <script defer
			src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.4.1/chart.min.js"
			integrity="sha512-5vwN8yor2fFT9pgPS9p9R7AszYaNn0LkQElTXIsZFCL7ucT8zDCAqlQXDdaqgA1mZP47hdvztBMsIoFxq/FyyQ=="
			crossorigin="anonymous"
			referrerpolicy="no-referrer"
		></script> 
		<!-- 	MULTISELECT LIBRARY 	 -->
		 <link rel="stylesheet" 
		type="text/css"
		href="./dist/multiselect/MSFmultiSelect-2.3/msfmultiselect.css"
		/> 
		 <script defer src="./dist/multiselect/MSFmultiSelect-2.3/msfmultiselect.min.js"></script> 
		<link
			type="text/css"
			rel="stylesheet"
			href="./dist/multiselect/multiselect.css"
		/>
		<script src="./dist/multiselect/scripts/multiselect.js" defer></script>
		<script src="./dist/multiselect/multiselect.min.js" defer></script>

		<!--   	  JQUERY  	  -->
		<script src="./js/jquery-3.6.0.js" type="text/javascript" defer></script>
		 <script defer
			src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"
			integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg=="
			crossorigin="anonymous"
		></script>
		<script defer
			src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
			integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
			crossorigin="anonymous"
		></script>

		<!--		TABLE FILTER LIBRARY 		-->
		<link
			rel="stylesheet"
			href="./dist/tableFilter/buttons.dataTables.min.css"
		/>
		<script defer src="./dist/tableFilter/jquery.dataTables.min.js"></script>
		<script defer src="./dist/tableFilter/dataTables.fixedHeader.min.js"></script>
		<script defer src="./dist/tableFilter/dataTables.buttons.min.js"></script>
		<script defer src="./dist/tableFilter/buttons.colVis.min.js"></script>

		<!--	 	BOOOTSTRAP		 -->
		 <link
			rel="stylesheet"
			href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
			integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
			crossorigin="anonymous"
		/>
		<script defer
			src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
			integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
			crossorigin="anonymous"
		></script> 
		<link rel="stylesheet" href="./css/bootstrap.min.css" type="text/css" />
		<script defer src="./js/bootstrap.min.js"></script>
	</head>
	<body>
		<nav>
			<header>
				<h1 class="CompanyHead">Company<span class="itHead">Name</span></h1>
			</header>
			<div class="flexMe">
				<div class="logowrapper">
					<img src="./dist/new_logo.png" alt="Company Logo" />
				</div>
				<div class="header">
					<h3>Are you tasked with managing projects and team assessments</h3>
					<span class='move'>Click to Add a new Task now!</span>
				</div>
			</div>
			<div class="hero">chart representation</div>
			<main>
				<div class="canvasCont" id="chart1">
					<h3 class="CompanyHead">pictorial <span class="itHead">view 1</span></h3>
					<canvas id="barChart"></canvas>
				</div>
				<div class="canvasCont" id="chart2">
					<h3 class="CompanyHead">pictorial <span class="itHead">view 2</span></h3>
					<canvas id="horizontalChart"></canvas>
				</div>
				<div class="canvasCont" id="chart3">
					<h3 class="CompanyHead">pictorial <span class="itHead">view 3</span></h3>
					<canvas id="doughnutChart"></canvas>
				</div>
			</main>
		</nav>

		<div class="mainTable">
			<div class="taskHead">Company Task Manager</div>
				<div class="tableWrapper">
					<div class="addProject float-right clearfix">
						<button
							type="button"
							class="btn btn-success"
							data-toggle="modal"
							data-target="#myModal"
						>
							Create New Task
						</button>
					</div>
					<table id="projectTable" class="table table-hover table-bordered">
						<thead>
							<tr>
								<td>S/N</td>
								<td style='min-width:10rem;'>TASKNAME</td>
								<td class="tableDate">ASSIGNED TO</td>
								<td>PRIORITY</td>
								<td class="tableDate">START DATE</td>
								<td class="tableDate">PLANNED END DATE</td>
								<td class="tableDate">ACTUAL END DATE</td>
								<td class="tableDate">GO LIVE DATE</td>
								<td style='max-width:60px;'>NO OF DAYS</td>
								<td>STATUS</td>
								<td style='min-width:10rem;'>NOTES</td>
							</tr>
						</thead>
						<tbody id="newRow">
							<!--LOOP THRU THE DB INTO A TABLE-->
							<?php include('Connect.php');
								$result = mysqli_query($conn, "select * from taskmanager");
								while ($row = mysqli_fetch_array($result)):                
							?>
							<tr>
								<td><?php echo $row['id']; ?> 
								<div class="flexMe">
									<button
										class="updateBtn"
										title="Edit Task"
										data-toggle="modal"
										data-target="#updateModal"
										value="<?php echo $row['id']; ?>"
										>
										<svg width="17" height="17" viewBox="0 0 28 25" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M19.5708 4.06329L23.9556 8.46759C24.1403 8.65314 24.1403 8.95587 23.9556 9.14142L13.3389 19.8055L8.82778 20.3084C8.225 20.3768 7.71458 19.8641 7.78264 19.2586L8.28333 14.7274L18.9 4.06329C19.0847 3.87775 19.3861 3.87775 19.5708 4.06329ZM27.4458 2.94513L25.0736 0.562317C24.3347 -0.179871 23.134 -0.179871 22.3903 0.562317L20.6694 2.29083C20.4847 2.47638 20.4847 2.77911 20.6694 2.96466L25.0542 7.36896C25.2389 7.5545 25.5403 7.5545 25.725 7.36896L27.4458 5.64044C28.1847 4.89337 28.1847 3.68732 27.4458 2.94513V2.94513ZM18.6667 16.9051V21.8758H3.11111V6.25079H14.2819C14.4375 6.25079 14.5833 6.18732 14.6951 6.0799L16.6396 4.12677C17.009 3.75568 16.7465 3.12579 16.2264 3.12579H2.33333C1.04514 3.12579 0 4.1756 0 5.46954V22.657C0 23.951 1.04514 25.0008 2.33333 25.0008H19.4444C20.7326 25.0008 21.7778 23.951 21.7778 22.657V14.952C21.7778 14.4295 21.1507 14.1707 20.7813 14.5369L18.8368 16.4901C18.7299 16.6024 18.6667 16.7488 18.6667 16.9051Z" />
										</svg>
									</button>
									<a 	
										class="delBtn" 
										title="Delete Task"
										onclick="return confirm('Do you want to Delete this Table\'s Entry Yes/No ?')"
										href="./process.php?delete=<?php echo $row['id']; ?>" 
									>
										<svg  width="15" height="15" viewBox="0 0 20 23" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M1.42857 20.8438C1.42857 21.4156 1.65434 21.9641 2.0562 22.3685C2.45806 22.7728 3.00311 23 3.57143 23H16.4286C16.9969 23 17.5419 22.7728 17.9438 22.3685C18.3457 21.9641 18.5714 21.4156 18.5714 20.8438V5.75001H1.42857V20.8438ZM13.5714 9.34375C13.5714 9.15313 13.6467 8.97031 13.7806 8.83552C13.9146 8.70073 14.0963 8.625 14.2857 8.625C14.4752 8.625 14.6568 8.70073 14.7908 8.83552C14.9247 8.97031 15 9.15313 15 9.34375V19.4063C15 19.5969 14.9247 19.7797 14.7908 19.9145C14.6568 20.0493 14.4752 20.125 14.2857 20.125C14.0963 20.125 13.9146 20.0493 13.7806 19.9145C13.6467 19.7797 13.5714 19.5969 13.5714 19.4063V9.34375ZM9.28571 9.34375C9.28571 9.15313 9.36097 8.97031 9.49492 8.83552C9.62888 8.70073 9.81056 8.625 10 8.625C10.1894 8.625 10.3711 8.70073 10.5051 8.83552C10.639 8.97031 10.7143 9.15313 10.7143 9.34375V19.4063C10.7143 19.5969 10.639 19.7797 10.5051 19.9145C10.3711 20.0493 10.1894 20.125 10 20.125C9.81056 20.125 9.62888 20.0493 9.49492 19.9145C9.36097 19.7797 9.28571 19.5969 9.28571 19.4063V9.34375ZM5 9.34375C5 9.15313 5.07526 8.97031 5.20921 8.83552C5.34316 8.70073 5.52485 8.625 5.71429 8.625C5.90373 8.625 6.08541 8.70073 6.21936 8.83552C6.35332 8.97031 6.42857 9.15313 6.42857 9.34375V19.4063C6.42857 19.5969 6.35332 19.7797 6.21936 19.9145C6.08541 20.0493 5.90373 20.125 5.71429 20.125C5.52485 20.125 5.34316 20.0493 5.20921 19.9145C5.07526 19.7797 5 19.5969 5 19.4063V9.34375ZM19.2857 1.43751H13.9286L13.5089 0.597469C13.42 0.417877 13.2831 0.266809 13.1135 0.161259C12.944 0.0557084 12.7485 -0.000136022 12.5491 7.87602e-06H7.44643C7.24749 -0.00076166 7.05236 0.0548745 6.8834 0.160542C6.71443 0.26621 6.57846 0.417635 6.49107 0.597469L6.07143 1.43751H0.714286C0.524845 1.43751 0.343164 1.51323 0.209209 1.64802C0.0752549 1.78282 0 1.96563 0 2.15626L0 3.59376C0 3.78438 0.0752549 3.9672 0.209209 4.10199C0.343164 4.23678 0.524845 4.31251 0.714286 4.31251H19.2857C19.4752 4.31251 19.6568 4.23678 19.7908 4.10199C19.9247 3.9672 20 3.78438 20 3.59376V2.15626C20 1.96563 19.9247 1.78282 19.7908 1.64802C19.6568 1.51323 19.4752 1.43751 19.2857 1.43751V1.43751Z" />
										</svg>
									</a>
								</div>
								</td>
								<td><?php echo $row['taskName']; ?></td>
								<td><?php echo $row['assignedTo']; ?></td>
								<td><?php echo $row['priority']; ?></td>
								<td><?php echo $row['startDate']; ?></td>
								<td><?php echo $row['plannedEnd']; ?></td>
								<td><?php echo $row['actualEnd']; ?></td>
								<td><?php echo $row['goLive']; ?></td>
								<td><?php echo $row['noOfDays']; ?></td>
								<td><?php echo $row['newStatus']; ?></td>
								<td><?php echo $row['notes']; ?></td>
							</tr>
							<?php endwhile; ?>
						</tbody>
					</table>
				</div>
			</div>
		<!--  MODAL  -->
		<div id="myModal" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title text-center moveL">
							Create A New Task
						</h4>
						<button
							type="button"
							class="close"
							data-dismiss="modal"
						>
							&times;
						</button>
					</div>
					<!-- 	FORM 	-->
					<div class="modal-body">
						<form>
							<div class="form-groupped">
								<label>Task Name</label>
								<input
									class="form-control"
									type="text"
									placeholder="Add a Project Name"
									name="taskName"
								/>
								<span class="errorDiv1 showErr chek2d"></span>
							</div>
							<div class="form-groupped">
								<label>team assigned to</label>
									<div>
									<select
									class="form-control"
									id="teamSelect"
										name="assignedTo[]"
										multiple
										>
										<option value="Persons 1">
											Persons 1
										</option>
										<option value="Persons 2">
											Persons 2
										</option>
										<option value="Persons 3">
											Persons 3
										</option>
										<option value="Persons 4">
											Persons 4
										</option>
										<option value="Persons 5">
											Persons 5
										</option>
									</select>
								</div>
									<span class="errorDiv2 showErr chek2d"></span>
								</div>

								<div class="form-groupped">
									<label>priority</label>
									<select
									class="form-control"
									name="priority"
									>
									<option
										value=""
										disabled
										selected
										hidden
									></option>
									<option value="high">high</option>
									<option value="medium">
										medium
									</option>
									<option value="low">low</option>
								</select>
								<span class="errorDiv3 showErr chek2d"></span>
							</div>
							<div class="form-groupped">
								<label>start date</label>
								<input
									type="date"
									class="form-control"
									name="startDate"
									/>
								<span class="errorDiv4 showErr chek2d"></span>
							</div>
							<div class="form-groupped">
								<label>planned end date</label>
								<input
									type="date"
									class="form-control"
									name="plannedEnd"
									/>
								<span class="errorDiv5 showErr chek2d"></span>
							</div>
							<div class="form-groupped">
								<label>actual end date</label>
								<input
									type="date"
									class="form-control"
									name="actualEnd"
									/>
								<span class="errorDiv6 showErr chek2d"></span>
							</div>
							<div class="form-groupped">
								<label>go live date</label>
								<input
									type="date"
									class="form-control"
									name="goLive"
									/>
								<span class="errorDiv7 showErr chek2d"></span>
							</div>
							<div class="form-groupped">
								<label>no of days</label>
								<input
									type="text"
									class="form-control"
									name="noOfDays"
									/>
								<span class="errorDiv8 showErr chek2d"></span>
							</div>
							<div class="form-groupped">
								<label>status</label>
								<select
									class="form-control"
									name="newStatus"
									>
									<option
										value=""
										disabled
										selected
										hidden
									></option>
									<option value="open">open</option>
									<option value="on Going">
										on Going
									</option>
									<option value="closed">
										closed
									</option>
									<option value="done">done</option>
								</select>
								<span class="errorDiv9 showErr chek2d"></span>
							</div>
							<div class="form-groupped">
								<label>notes</label>
								<input
									class="form-control"
									type="text"
									name="notes"
								/>
								<span class="errorDiv10 showErr chek2d"></span>
							</div>
							<div class="modal-footer">
								<input
									type="submit"
									class="btn btn-success btn-md"
									name="submit"
								/>
								<button
									type="button"
									class="btn btn-danger btn-md"
									data-dismiss="modal"
								>
									Close
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- UPDATE MODAL  -->
<?php if (isset($_GET["edit"])){
			include("process.php");
		}else{
			require_once 'process.php';
		}
?>
<?php if (isset($_GET["edit"])):?>
	<div id="updateModal" class="modal fade showModal" role="dialog">
<?php else: ?>
	<div id="updateModal" class="modal fade" role="dialog">
<?php endif;?>
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title text-center moveL">
						Update A Task
					</h4>
					<button
						type="button"
						class="close"
						data-dismiss="modal"
					>
						&times;
					</button>
				</div>
				<!-- CHECK FOR ID TO UPDATE  -->
				<div class="modal-body">
					<form id="updateForm">
						<div class="modal-check">
							<div class="form-groupped pull">
					<?php if(isset($_GET['edit'])):?>
								<label>UPDATE TASK</label>
								<input name="id10" type="text" 
								value=<?php echo $_GET['edit']?>
								/>
					<?php else: ?>
								<label>PULL TASK</label>
								<input name="id10" type="text" 
								placeholder="Input a Project number" 
								/>
								<a class="btn btn-dark btn-sm pullBtn">Pull Project</a>
					<?php endif; ?>
						</div>
					</div>
						<!-- MAIN FORM -->
					<div class="form-groupped">
						<label>Project Name</label>
						<input
						class="form-control"
						type="text"
						placeholder="Pull a Project"
						name="taskName10"
						value="<?php echo $taskNameUpd; ?>"
						/>
					</div>
					<div class="form-groupped">
						<label>assign new team to task</label>
							<div>
								<select
									class="form-control"
									id="teamSelectUpd"
									name="assignedTo10[]"
									value="<?php echo $assignedToUpd; ?>"
									multiple
								>
									<option value="Persons 1">
										Persons 1
									</option>
									<option value="Persons 2">
										Persons 2
									</option>
									<option value="Persons 3">
										Persons 3
									</option>
									<option value="Persons 4">
										Persons 4
									</option>
									<option value="Persons 5">
										Persons 5
									</option>
								</select>
							</div>
					</div>
						<div class="form-groupped">
							<label>select new priority</label>
								<select
								class="form-control"
								name="priority10"
								value="<?php echo $priorityUpd; ?>"
								>
					<?php if (isset($_GET['edit'])):?>
									<option disabled hidden></option>
									<option value="high">high</option>
									<option value="medium">
										medium
									</option>
									<option value="low">low</option>
					<?php else: ?>
									<option
										value=""
										disabled
										selected
										hidden
									></option>
									<option value="high">high</option>
									<option value="medium">
										medium
									</option>
									<option value="low">low</option>
					<?php endif; ?>
							</select>
					</div>
					<div class="form-groupped">
						<label>new start date</label>
						<input
							type="date"
							class="form-control"
							name="startDate10"
							value="<?php echo $startDateUpd; ?>"
						/>
					</div>
					<div class="form-groupped">
						<label>planned end date</label>
						<input
							type="date"
							class="form-control"
							name="plannedEnd10"
							value="<?php echo $plannedEndUpd; ?>"
						/>
					</div>
					<div class="form-groupped">
						<label>actual end date</label>
						<input
							type="date"
							class="form-control"
							name="actualEnd10"
							value="<?php echo $actualEndUpd; ?>"
						/>
					</div>
					<div class="form-groupped">
						<label>go live date</label>
						<input
							type="date"
							class="form-control"
							name="goLive10"
							value="<?php echo $goLiveUpd; ?>"
						/>
					</div>
					<div class="form-groupped">
						<label>no of days left</label>
						<input
							type="text"
							class="form-control"
							name="noOfDays10"
							value="<?php echo $noOfDaysUpd; ?>"
						/>
					</div>
					<div class="form-groupped">
						<label>status of project</label>
						<select
							class="form-control"
							name="newStatus10"
							value="<?php echo $newStatusUpd; ?>"
						>
				<?php if (isset($_GET['edit'])):?>
								<option
									disabled
									hidden
								></option>
								<option value="open">open</option>
								<option value="on Going">
									on Going
								</option>
								<option value="closed">
									closed
								</option>
								<option value="done">done</option>
				<?php else: ?>
								<option
									value=""
									disabled
									selected
									hidden
								></option>
								<option value="open">open</option>
								<option value="on Going">
									on Going
								</option>
								<option value="closed">
									closed
								</option>
								<option value="done">done</option>
				<?php endif; ?>
							</select>
						</div>
						<div class="form-groupped">
							<label>prev notes</label>
							<input
								class="form-control"
								type="text"
								name="notes10"
								value="<?php echo $notesUpd; ?>"
							/>
						</div>
						<div class="modal-footer">
				<?php if(isset($_GET['edit'])):?>
								<button
									class="btn btn-info btn-md"
									type="submit"
									name="update"
								>Update
								</button>
				<?php else: ?>
								<button
									class="btn btn-info btn-md"
									type="submit"
									name="update"
									disabled
								>Update
								</button>
				<?php endif; ?>
							<button
								type="button"
								class="btn btn-danger btn-md"
								data-dismiss="modal"
								data-target="updateModal"
								data-role="close"
							>
								Close
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
		<script defer src="./js/ajaxMethod.js"></script>
		<script defer src="./js/index.js" type="text/javascript"></script>
	</body>
</html>
