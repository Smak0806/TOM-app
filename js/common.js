function _(args){
    return document.getElementById(args);
}

function hideElement(element){
    _(element).style.visibility = "hidden";
}

function showElement(element){
    _(element).style.visibility = "visible";
}

function getDisplay(element){
    return _(element).style.display;
}

function setDisplay(element, status){
    _(element).style.display = status;
}

function toggleDisplay(element){
    if(getDisplay(element)!="none"){
        setDisplay(element, "none")
    }else{
        setDisplay(element, "block");
    }
}