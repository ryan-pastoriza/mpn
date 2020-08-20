function require(script) {
    $.ajax({
        url: script,
        dataType: "script",
        async: false,           // <-- This is the key
        success: function () {},
        error: function () {
            throw new Error("Could not load script " + script);
        }
    });
}

class ElementBuilder{
	addElement(parentId="", elementTag="", elementType="",
			   elementId="", elementClass="", value="",
			   dataToggle, dataTarget="", html="") {
	    try{
			// Add html element to the page
		    var p = document.getElementById(parentId);
		    var newElement = document.createElement(elementTag);
		    newElement.setAttribute('type', elementType);
		    newElement.setAttribute('id', elementId);
		    newElement.setAttribute('class', elementClass);
		    newElement.setAttribute('value', value);
		    newElement.setAttribute('data-toggle', dataToggle);
		    newElement.setAttribute('data-target', dataTarget);
		    newElement.innerHTML = html;
		    p.appendChild(newElement);
		}catch(e){}
	}
	appendElement(parentId="",html=""){
	 	try{
			// Append html element to the page
		    var p = document.getElementById(parentId);
		    p.innerHTML = html;
		}catch(e){}
	}
	removeElement(elementId) {
		try{
		    // Remove an element to the page
		    var element = document.getElementById(elementId);
		    element.parentNode.removeChild(element);
		}catch(e){}
	}
	clearChildElements(elementId){
		try{
		    // Remove an element to the page
		    var element = document.getElementById(elementId);
		    element.innerHTML ="";
		}catch(e){}
	}
}
// Init Element Builder
let EBuild = new ElementBuilder;