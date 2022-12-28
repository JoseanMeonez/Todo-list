let url = "http://127.0.0.1:8000";
let snd1 = new Audio("https://actions.google.com/sounds/v1/cartoon/cartoon_boing.ogg");  
let snd2 = new Audio("https://actions.google.com/sounds/v1/cartoon/cartoon_cowbell.ogg");

function $ch3ck3d(txt_id, id) {
	let data = (document.getElementById(id).value == 0) ? 1 : 0

	fetch(`${url}/api/completed-task/${id}/${data}`, {
		method: 'post',
		headers: {
			Accept: 'application/json',
		},
	})
	.then(response => response.text())
	.then(text => {
		if (document.getElementById(id).value == 0) {
			snd1.play();
			document.getElementById(id).value = 1
			document.getElementById(txt_id).classList.add("text-decoration-line-through")
			document.getElementById(txt_id).classList.add("text-muted")
		} else {
			snd2.play();
			document.getElementById(id).value = 0
			document.getElementById(txt_id).classList.remove("text-decoration-line-through")
			document.getElementById(txt_id).classList.remove("text-muted")
		}
	
		// console.log(txt_id, id, data);	
		console.log(text)
	})
}