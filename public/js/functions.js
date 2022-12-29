// This capture the input's data and send it to add a new task
export const add_task = (add_todo, schedule, task) => add_todo.onclick = function () {
	// Setting disabled the add button to avoid double click
	add_todo.setAttribute("disabled", true)

	fetch(`${url}/api/add-new-task/${task.value}/${(schedule.value == '') ? 0 : schedule.value}`, {
		method: 'post',
		headers: {
			task: task.value,
			scheduled: schedule.value,
			Accept: 'application/json',
		},
	})
	.then(response => response.text())
	.then(text => {
		task.value = ''
		schedule.value = ''
		return window.location.reload()
	})
}

// This remove all the marked tasks
export const remove_completed = (remove_done_t) => remove_done_t.onclick = function () {
	// Sending the request to delete the tasks
	fetch(`${url}/api/delete-completed`, {
		method: 'delete',
		headers: {
			Accept: 'application/json',
		},
	})
	.then(response => response.text())
	.then(text => {
		console.log(text)
		return window.location.reload()
	})
}

// This remove all the tasks, marked or not
export const remove_all = (remove_all) => remove_all.onclick = function () {
	// Sending the request to delete the tasks
	fetch(`${url}/api/delete-all`, {
		method: 'delete',
		headers: {
			Accept: 'application/json',
		},
	})
	.then(response => response.text())
	.then(text => {
		console.log(text)
		return window.location.reload()
	})
}