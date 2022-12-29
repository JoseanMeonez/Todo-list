import * as fn from "./functions.js";

window.addEventListener('load', () => {
	// Default variables used in each function
	let task = document.getElementById("task")
	let add_todo = document.getElementById('add-todo')
	let remove_all = document.getElementById('remove-all')
	let remove_done_t = document.getElementById('remove-done-t')
	let schedule = document.getElementById('calendar')

	// Main JS functions
	fn.add_task(add_todo, schedule, task)
	fn.remove_completed(remove_done_t)
	fn.remove_all(remove_all)
})