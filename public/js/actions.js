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