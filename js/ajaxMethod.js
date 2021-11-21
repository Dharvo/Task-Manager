// FORM SUBMISSION USING AJAX
$("form").on("submit", (event) => {
	event.preventDefault();
	validateModalForm();
	//CHECKER FUNCTION TO RETURN FALSE IF THEREs ERROR
	var errorArray = document.querySelectorAll("span.chek2d");
	const chekParam = () => {
		let x = 0;
		while (x < errorArray.length) {
			const spanCheck = errorArray[x].innerHTML == "";
			if (!spanCheck) {
				return false;
			}
			x++;
		}
		console.log("I WILL POST FORM");
		var formValues = $(event.target).serialize();
		$.post("./home.php", formValues, (data) => {
			var tableBody = document.getElementById("newRow");
			var newTr = document.createElement("TR");
			newTr.innerHTML = data;
			tableBody.append(newTr);
		});
		//ALERT HERE ND RELOAD
		alert("Your Entry is Being Submitted !");
		location.href = "index.php";
	};
	chekParam();
});

//TABLE FILTER FUNCTIONALITY
var table = $("#projectTable").DataTable({
	fixedHeader: false,
	dom: "Bfrtip",
	buttons: ["colvis"],
	paging: false,
	info: false,
	filter: false,
});

// SET ROW'S S/N TO PULL INPUT VALUE
// AND SET THE ATTRIBUTE OF THE PULL LINK TO THAT ROW'S (S/N)
$(".updateBtn").on("click", (modBtn) => {
	var pullInput = $('input[name="id10"]')[0];
	pullInput.value = modBtn.currentTarget.value;
	$(".pullBtn").attr(
		"href",
		"./index.php?edit=" + $('input[name="id10"]').val()
	);
});

$("#updateForm").on("submit", (event) => {
	var updateValues = $(event.target).serialize();
	console.log("UPDATED VALUES:- ", updateValues);
	$.post("./process.php", updateValues, (update) => {
		console.log("I WILL UPDATE FORM WITH -"), update;
	});
	alert("Your Task is Being Updated !");
	setTimeout(() => {
		window.location.href = "./index.php";
	}, 3000);
});
