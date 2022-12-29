let url = "http://127.0.0.1:8000";
let snd1 = new Audio("https://actions.google.com/sounds/v1/cartoon/cartoon_boing.ogg");  
let snd2 = new Audio("https://actions.google.com/sounds/v1/cartoon/cartoon_cowbell.ogg");

function $ch3ck3d(txt_id, id) {
	let data = (document.getElementById(id).value == 0) ? 1 : 0
	document.getElementById(id).value = data

	fetch(`${url}/api/completed-task/${id}/${data}`, {
		method: 'put',
		headers: {
			Accept: 'application/json',
		},
	})
	.then(response => response.text())
	.then(text => {
		if (data == 1) {
			snd1.play();
			document.getElementById(txt_id).classList.add("text-decoration-line-through")
			document.getElementById(txt_id).classList.add("text-muted")
		} else {
			snd2.play();
			document.getElementById(txt_id).classList.remove("text-decoration-line-through")
			document.getElementById(txt_id).classList.remove("text-muted")
		}
	
		// console.log(txt_id, id, data);	
		console.log(text)
	})
}

function edit_task(txt_id, sch_id, id) {
	$this = document.getElementById(`e-${id}`)
	txt_id = document.getElementById(txt_id)
	sch_id = document.getElementById(sch_id)

	if ($this.checked == true) {
		txt_id.readOnly = ''
		sch_id.readOnly = ''
		setTimeout(() => {
			fetch(`${url}/api/update-task/${txt_id.value}/${sch_id.value}/${id}`, {
				method: 'put',
				headers: {
					Accept: 'application/json',
				},
			})
			.then(response => response.text())
			.then(text => {
				console.log(text)
			})
		}, 10000);
	} else {
		txt_id.readOnly = true
		sch_id.readOnly = true
		fetch(`${url}/api/update-task/${txt_id.value}/${sch_id.value}/${id}`, {
			method: 'put',
			headers: {
				Accept: 'application/json',
			},
		})
		.then(response => response.text())
		.then(text => {
			console.log(text)
		})
	}
}