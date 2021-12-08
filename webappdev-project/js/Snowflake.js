const body = document.body;

//How often snowflakes are made, smaller interval = more snowflakes
setInterval(createSnowFlake, 50);


function createSnowFlake() {
	const snow_flake = document.createElement('p');
	
	//randomize snowflake shape
	const snow_flake_type = Math.floor(Math.random() * 3) + 1;
	
	//The font replaces the capital letters A-Z with snowflakes
	switch(snow_flake_type) {
		case 1:
			snow_flake.appendChild(document.createTextNode("T"));
			break;
		case 2:
			snow_flake.appendChild(document.createTextNode("C"));
			break;
		case 3:
			snow_flake.appendChild(document.createTextNode("S"));
			break;
		default:
			break;
	}
	
	//add css style
	snow_flake.classList.add('fa-snowflake');
	//randomize starting position
	snow_flake.style.left = Math.random() * window.innerWidth + 'px';
	//randomize snowflake duration
	snow_flake.style.animationDuration = Math.random() * 3 + 2 + 's'; // between 2 - 5 seconds
	//randomize snowflake opacity
	snow_flake.style.opacity = Math.random();
	//randomize snowflake size
	snow_flake.style.fontSize = Math.random() * 20 + 20 + 'px';
	
	//add the snowflake to the page
	document.body.appendChild(snow_flake);
	
	//remove snowflake at the end of the timer
	setTimeout(() => {
		snow_flake.remove();
	}, 5000)
}