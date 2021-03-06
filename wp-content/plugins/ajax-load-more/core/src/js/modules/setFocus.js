/**
 * setFocus
 * Set user focus to improve accessibility after load events
 * 
 * @param {Boolean} init
 * @param {String} preloaded
 * @param {HTMLElement} element
 * @param {Boolean} alm_is_filtering
 * @since 5.1
 */  
let setFocus = (init = true, preloaded = 'false', element, alm_is_filtering = false) => {
	
	if(!alm_is_filtering){
		if( (init || !element) && preloaded !== 'true' ){
	      return false; // Exit if first run
	   }
   }

   // Check if element is an array.
   // If `transition_container="false"`, `element` will be an array.
   /*
   let is_array = Array.isArray(element);
   element = (is_array) ? element[0] : element;
   */   
   
   // Set tabIndex on `.alm-reveal`
	element.setAttribute('tabIndex', '-1');
   element.style.outline = 'none';
   
   // Get Parent container
   // If `.alm-listing` set parent to element
   let parent = (!element.classList.contains('alm-listing')) ? element.parentNode : element;	
   
   // Scroll Container
	let scrollContainer = parent.dataset.scrollContainer;
	
	// If scroll container, move it, not the window.	
	if(scrollContainer){				
		let container = document.querySelector(scrollContainer);
		if(container){
			let left = container.scrollLeft;
			let top = container.scrollTop;
			element.focus();
			container.scrollLeft = left;
			container.scrollTop = top;			
		}		
	} 
	
	// Move window
	else {   
		let x = window.scrollX;
		let y = window.scrollY;
		element.focus();
		window.scrollTo(x, y);
	}
	
}
export default setFocus; 
