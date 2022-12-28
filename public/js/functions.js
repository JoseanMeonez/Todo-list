export const add_task = (add_todo, schedule, task) => add_todo.onclick = function () {
	add_todo.setAttribute("disabled", true)

	fetch(`http://127.0.0.1:8000/api/add-new-task/${task.value}/${(schedule.value == '') ? 0 : schedule.value}`, {
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