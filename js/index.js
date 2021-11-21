//MULTI SELECT JAVASCRIPT FUNCTIONALITY
document
	.multiselect("#teamSelect")
	.setCheckBoxClick("checkboxAll", function (target) {
		console.log("Checkbox 'Select All' was clicked and got value ", target);
	});
document
	.multiselect("#teamSelectUpd")
	.setCheckBoxClick("checkboxAll", function (target) {
		console.log("Checkbox 'Select All' was clicked and got value ", target);
	});

//VALIDATE SUBMITTED FORM
const validateModalForm = () => {
	//FORM VALIDATION ON NEW INPUT
	if ($('[name="taskName"]').val() == "" || $('[name="taskName"]').val() <= 3) {
		$("span.errorDiv1").html("*Must be 5 Characters or More");
	} else {
		$("span.errorDiv1").html("");
	}
	if ($('[name="assignedTo[]"]').val() == "") {
		$("span.errorDiv2").html(
			`*Assign the ${$('[name="taskName"]').val()} Task to a Person or Team`
		);
	} else {
		$("span.errorDiv2").html("");
	}
	if ($('[name="priority"]').val() == null) {
		$("span.errorDiv3").html("*Select a Priority Level");
	} else {
		$("span.errorDiv3").html("");
	}
	if ($('[name="startDate"]').val() == "") {
		$("span.errorDiv4").html("*Include a Start Date for the Task");
	} else {
		$("span.errorDiv4").html("");
	}
	if ($('[name="plannedEnd"]').val() == "") {
		$("span.errorDiv5").html("*Do you have a Planned End Date");
	} else {
		$("span.errorDiv5").html("");
	}
	if ($('[name="actualEnd"]').val() == "") {
		$("span.errorDiv6").html("*Pls Include an Actual End Date");
	} else {
		$("span.errorDiv6").html("");
	}
	if ($('[name="goLive"]').val() == "") {
		$("span.errorDiv7").html("*Add a Day to go Live with Project");
	} else {
		$("span.errorDiv7").html("");
	}
	var noOfDaysInputVal = $('[name="noOfDays"]').val();
	if (typeof noOfDaysInputVal !== "string") {
		$("span.errorDiv8").html("*Must be a Number");
	} else if (noOfDaysInputVal == "") {
		$("span.errorDiv8").html("*Add Number of Day(s) for Task");
	} else {
		$("span.errorDiv8").html("");
	}
	if ($('[name="newStatus"]').val() == null) {
		$("span.errorDiv9").html("*Add Current Status of the Task");
	} else {
		$("span.errorDiv9").html("");
	}
	if ($('[name="notes"]').val() == "") {
		$("span.errorDiv10").html("*Describe the Task above");
	} else {
		$("span.errorDiv10").html("");
	}
};

//PROJECT VALUES
var openProjects = 0;
var onGoingProjects = 0;
var closedProjects = 0;
var doneProjects = 0;

//INCREMENTING DATA VARIABLES ON CHANGE OF STATUS INPUT
const tableRows = document.querySelectorAll("tbody tr");
var statusdata;
var prioritydata;
tableRows.forEach((tableRow) => {
	prioritydata = tableRow?.children[3];
	statusdata = tableRow?.children[9];
	switch (prioritydata?.innerHTML) {
		case "high":
			prioritydata?.classList?.add("highClass");
			break;
		case "medium":
			prioritydata?.classList?.add("midClass");
			break;
		default:
			prioritydata?.classList?.add("lowClass");
			break;
	}
	switch (statusdata?.innerHTML) {
		case "open":
			statusdata?.classList?.add("openClass");
			openProjects++;
			break;
		case "on Going":
			statusdata?.classList?.add("onGoingClass");
			onGoingProjects++;
			break;

		case "closed":
			statusdata?.classList?.add("closedClass");
			closedProjects++;
			break;
		default:
			statusdata?.classList?.add("doneClass");
			doneProjects++;
			break;
	}
});
console.log(
	"No of Projects -",
	" DONE: ",
	doneProjects,
	" CLOSED: ",
	closedProjects,
	" ON_GOING: ",
	onGoingProjects,
	" OPEN: ",
	openProjects
);

//  BAR CHART INTERACTION
var barChart = document.getElementById("barChart").getContext("2d");
//  BAR CHART FUNCTION
var myChart = new Chart(barChart, {
	type: "bar",
	data: {
		labels: ["OPEN", "ON GOING", "CLOSED", "DONE"],
		datasets: [
			{
				label: ["No of Open Projects"],
				data: [openProjects, onGoingProjects, closedProjects, doneProjects],
				backgroundColor: [
					"rgba(11, 255, 20, 0.7)",
					"rgba(216, 122, 0, 0.7)",
					"rgba(255, 0, 0, 0.7)",
					"rgba(0, 146, 37, 0.7)",
				],
				hoverBackgroundColor: [
					"rgba(11, 255, 20, 0.85)",
					"rgba(216, 122, 0, 0.85)",
					"rgba(255, 0, 0, 0.85)",
					"rgba(0, 146, 37, 0.85)",
				],
				borderColor: [
					"rgb(10, 255, 10)",
					"rgb(255, 120, 0)",
					"rgb(250, 0, 0)",
					"rgb(0, 145, 40)",
				],
				borderWidth: 1.2,
			},
		],
	},
	options: {
		legend: {},
		scales: {
			y: {
				beginAtZero: true,
			},
		},
	},
});

//  HORIZONTAL BAR CHART
var horizontalChart = document
	.getElementById("horizontalChart")
	.getContext("2d");
//  HORIZNTAL BAR FUNCTION
var my2ndChart = new Chart(horizontalChart, {
	type: "bar",
	data: {
		labels: ["DONE", "ON GOING", "OPEN", "CLOSED"],
		datasets: [
			{
				axis: "y",
				label: "No of Projects Done",
				data: [doneProjects, onGoingProjects, openProjects, closedProjects],
				backgroundColor: [
					"rgba(0, 146, 37, 0.7)",
					"rgba(216, 122, 0, 0.7)",
					"rgba(11, 255, 20, 0.7)",
					"rgba(255, 0, 0, 0.7)",
				],
				borderColor: [
					"rgb(0, 145, 40)",
					"rgb(255, 120, 0)",
					"rgb(10, 255, 10)",
					"rgb(250, 0, 0)",
				],
				hoverBackgroundColor: [
					"rgb(0, 146, 37)",
					"rgb(216, 122, 0)",
					"rgb(11, 255, 20)",
					"rgb(255, 0, 0)",
				],
				borderWidth: 1.5,
			},
		],
	},
	options: {
		indexAxis: "y",
		legend: {},
		scales: {
			y: {
				beginAtZero: true,
			},
		},
	},
});

//  DOUGHNUT  CHART
var doughnut = document.getElementById("doughnutChart").getContext("2d"); //Chart Element
//  DOUGHNUT CHART FUNCTION
var my3rdChart = new Chart(doughnut, {
	type: "doughnut",
	data: {
		labels: ["DONE", "ON GOING", "OPEN", "CLOSED"],
		datasets: [
			{
				axis: "y",
				label: "# of Votes",
				data: [doneProjects, onGoingProjects, openProjects, closedProjects],
				backgroundColor: [
					"rgba(0, 146, 37, 0.7)",
					"rgba(216, 122, 0, 0.7)",
					"rgba(11, 255, 20, 0.7)",
					"rgba(255, 0, 0, 0.7)",
				],
				borderColor: [
					"rgb(0, 145, 40)",
					"rgb(255, 120, 0)",
					"rgb(10, 255, 10)",
					"rgb(250, 0, 0)",
				],
				hoverBackgroundColor: [
					"rgb(0, 146, 37)",
					"rgb(216, 122, 0)",
					"rgb(11, 255, 20)",
					"rgb(255, 0, 0)",
				],
				borderWidth: 1.5,
			},
		],
	},
	options: {
		indexAxis: "y",
		legend: {},
		scales: {
			y: {
				beginAtZero: true,
			},
		},
	},
});

//PRIORITY SELECT TAG CSS EDIT
const prioSelect = document.querySelectorAll("[name^='priority']");
prioSelect.forEach((prio) => {
	prio.addEventListener("change", (e) => {
		switch (prio.value) {
			case "high":
				prio?.classList?.toggle("red");
				prio?.classList?.remove("yellow", "green");
				break;
			case "medium":
				prio?.classList?.toggle("yellow");
				prio?.classList?.remove("red", "green");
				break;
			case "low":
				prio?.classList?.toggle("green");
				prio?.classList?.remove("red", "yellow");
				break;
			default:
				return;
		}
	});
});
//STATUS SELECT TAG CSS EDIT
const statusSelect = document.querySelectorAll("[name^='newStatu']");
statusSelect.forEach((stat) => {
	stat.addEventListener("change", (e) => {
		switch (stat.value) {
			case "open":
				stat?.classList?.toggle("openG");
				stat?.classList?.remove("goingG", "closedG", "doneG");
				break;
			case "on Going":
				stat?.classList?.toggle("goingG");
				stat?.classList?.remove("openG", "closedG", "doneG");
				break;
			case "closed":
				stat?.classList?.toggle("closedG");
				stat?.classList?.remove("openG", "goingG", "doneG");
				break;
			case "done":
				stat?.classList?.toggle("doneG");
				stat?.classList?.remove("openG", "goingG", "closedG");
				break;
			default:
				return;
		}
	});
});

$("span.move").click(() => {
	document.documentElement.scrollTop =
		document.documentElement.scrollHeight - $("#projectTable").height() - 300;
});
