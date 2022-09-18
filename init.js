
const theme = document.querySelector("#theme input");
theme.addEventListener("input", () =>{
		   let swapProperties = ((first,second) => {
				const temp1 = getComputedStyle(document.documentElement).getPropertyValue(first);
				const temp2 = getComputedStyle(document.documentElement).getPropertyValue(second);

				document.documentElement.style.setProperty(first, temp2);
				document.documentElement.style.setProperty(second,temp1);
			      });
		   swapProperties('--leading-color','--leading-color-alt');

		   const inverted = getComputedStyle(document.documentElement).getPropertyValue('--inverted') == 1 ? 0 : 1;
		   document.documentElement.style.setProperty('--inverted', inverted);

		   for(let x of ['r','g','b']){
				      swapProperties(`--leading-color-${x}`,`--leading-color-${x}-alt`);
		   }
		   for(let x of[1,2,3]){
				swapProperties(`--scrollbar-${x}`,`--scrollbar-${x}-alt`)
		   }
});
const burger = document.querySelector("#burger input");
console.log(burger);
burger.addEventListener("input", () =>{
	let menuBurger = document.getElementById("menuBurg");
	menuBurger.style.display = menuBurger.style.display === "" ? "flex" : "";
	window.scrollTo(0, 0);
	document.body.classList.toggle("stop-scrolling");
})

function checkMedia(e){
	let logo = document.querySelector("#logo img");
	if(e.matches)
		logo.src = "./imgs/icon.png";
	else
		logo.src= "./imgs/default-monochrome.svg"
}
const smallWindow = window.matchMedia('(max-width:1250px)')
smallWindow.addListener(checkMedia);
checkMedia(smallWindow);

(() => {
	setTimeout(() => {
		if(document.getElementById('essa').checked)
		    theme.dispatchEvent(new CustomEvent("input"))
	},20);
})();
