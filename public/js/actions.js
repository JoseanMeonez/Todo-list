let url = "https://pixel-todo.laravel.cloud";
let snd1 = new Audio("https://actions.google.com/sounds/v1/cartoon/cartoon_boing.ogg");
let snd2 = new Audio("https://actions.google.com/sounds/v1/cartoon/cartoon_cowbell.ogg");

// This function changes de checkbox status as checked or not
function $ch3ck3d(txt_id, id) {
	let data = (document.getElementById(id).value == 0) ? 1 : 0
	document.getElementById(id).value = data

	// Sending data to the api
	fetch(`${url}/api/completed-task/${id}/${data}`, {
		method: 'put',
		headers: {
			Accept: 'application/json',
		},
	})
	.then(response => response.text())
	.then(text => {
		if (data == 1) {
			// Playing sound and adding classnames
			snd1.play();
			document.getElementById(txt_id).classList.add("text-decoration-line-through")
			document.getElementById(txt_id).classList.add("text-muted")
			return console.log(text)
		} else {
			// Playing sound and removing classnames
			snd2.play();
			document.getElementById(txt_id).classList.remove("text-decoration-line-through")
			document.getElementById(txt_id).classList.remove("text-muted")
			return console.log(text)
		}
	})
}

// This help to capture and update the task's data
function edit_task(txt_id, sch_id, id) {
	$this = document.getElementById(`e-${id}`)
	txt_id = document.getElementById(txt_id)
	sch_id = document.getElementById(sch_id)

	if ($this.checked == true) {
		txt_id.readOnly = ''
		sch_id.readOnly = ''

		// Setting a timeout for client to update the task
		setTimeout(() => {
			fetch(`${url}/api/update-task/${txt_id.value}/${sch_id.value}/${id}`, {
				method: 'put',
				headers: {
					Accept: 'application/json',
				},
			})
			.then(response => response.text())
			.then(text => {
				return console.log(text)
			})
		}, 10000);
	} else {
		txt_id.readOnly = true
		sch_id.readOnly = true

		// Updating the task
		fetch(`${url}/api/update-task/${txt_id.value}/${sch_id.value}/${id}`, {
			method: 'put',
			headers: {
				Accept: 'application/json',
			},
		})
		.then(response => response.text())
		.then(text => {
			return console.log(text)
		})
	}
}
