import * as fn from "./functions.js";

window.addEventListener('load', () => {
	let task = document.getElementById("task")
	let add_todo = document.getElementById('add-todo')
	let schedule = document.getElementById('calendar')

	fn.add_task(add_todo, schedule, task)
})