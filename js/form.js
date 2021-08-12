function checkState(element){
    
    console.log(element);
    
    if(element.checked===true){
        console.log("checked");
        document.getElementById("DayOfWeek").removeAttribute("disabled");
    }else{
        console.log("not checked");
        document.getElementById("DayOfWeek").setAttribute("disabled", "disabled");
    }
}