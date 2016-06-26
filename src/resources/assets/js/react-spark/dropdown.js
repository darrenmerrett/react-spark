document.addEventListener("DOMContentLoaded", function(event) { 

	var findAncestor = function(el, cls) {
	    while ((el = el.parentElement) && !el.classList.contains(cls));
	    return el;
	}

	var closeDropdowns = function(exclude) {

	  	var dropdowns = document.getElementsByClassName('dropdown');

		for (var ii=0; ii < dropdowns.length; ii++) {

			if (dropdowns[ii] !== exclude) {

				dropdowns[ii].classList.remove('open');

			}

		}

	}

	var els = document.getElementsByClassName('dropdown-toggle');

	for (var i=0; i < els.length; i++) {

		els[i].onclick = function(e) {

			e.preventDefault();

			e.stopPropagation();

		  	var dropdown = findAncestor(this, 'dropdown');

		  	dropdown.classList.toggle('open');

		  	closeDropdowns(dropdown);

		}

	}

	document.body.onclick = function() {

		closeDropdowns();

	}

});