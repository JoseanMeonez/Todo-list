export const add_task = (add_todo, schedule, task) => add_todo.onclick = function () {
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
		window.location.reload()
	})
}

export const remove_completed = (remove_done_t) => remove_done_t.onclick = function () {
	fetch(`${url}/api/delete-completed`, {
		method: 'delete',
		headers: {
			Accept: 'application/json',
		},
	})
	.then(response => response.text())
	.then(text => {
		console.log(text)
		window.location.reload()
	})
}

export const remove_all = (remove_all) => remove_all.onclick = function () {
	fetch(`${url}/api/delete-all`, {
		method: 'delete',
		headers: {
			Accept: 'application/json',
		},
	})
	.then(response => response.text())
	.then(text => {
		console.log(text)
		window.location.reload()
	})
}