function getNavbarDisplayStatus(){
   return _("navbarTogglerDemo03").style.display;
}

function setNavbarDisplay(status){
    _("navbarTogglerDemo03").style.display = status;
}

function navbarDisplayToggle(){
        
    if(getNavbarDisplayStatus()=="" || getNavbarDisplayStatus()=="none"){        
        setNavbarDisplay("block");
    }else{
        setNavbarDisplay("none");
    }
}

function addNavbarEvents(){
    _("navbarButton").addEventListener("click", navbarDisplayToggle);
}

console.log("NAVBAR.JS");
window.onload = function(){
    addNavbarEvents();
}