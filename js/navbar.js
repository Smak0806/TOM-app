console.log("NAVBAR.JS");

function getNavbarDisplayStatus(){
    console.log(_("navbarTogglerDemo03").style.display);
}

function addNavbarEvents(){
    _("navbarTogglerDemo03").addEventListener("click", getNavbarDisplayStatus);

}