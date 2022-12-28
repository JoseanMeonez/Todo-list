window.addEventListener('load', () => {
	let add_todo = document.getElementById('add-todo')
	let task = document.getElementById("task")

	fetch('http://127.0.0.1:8000/api/getTasks', {
    method: 'GET',
    headers: {
			'Accept': 'application/json',
    },
	})
	.then(response => response.text())
	.then(text => console.log(JSON.parse(text)))

	add_todo.onclick = function (e) {
		e.preventDefault()
		console.log(task.value)
		fetch(`http://127.0.0.1:8000/api/task/${task.value}/0`, {
			method: 'POST',
			headers: {
				task: task.value,
				scheduled: 0,
				Accept: 'application/json',
			},
		})
		.then(response => response.text())
		.then(text => console.log(text))
	}
})

function $ch3ck3d(txt_id, id) {
	if (document.getElementById(id).value == 0) {
	  var snd = new Audio("https://actions.google.com/sounds/v1/cartoon/cartoon_boing.ogg");  
    snd.play();
		document.getElementById(id).value = 1
		document.getElementById(txt_id).classList.add("text-decoration-line-through")
		document.getElementById(txt_id).classList.add("text-muted")
	} else {
		var snd = new Audio("https://actions.google.com/sounds/v1/cartoon/cartoon_cowbell.ogg");  
    snd.play();
		document.getElementById(id).value = 0
		document.getElementById(txt_id).classList.remove("text-decoration-line-through")
		document.getElementById(txt_id).classList.remove("text-muted")
	}	
	console.log(txt_id, id, document.getElementById(id).value);
}