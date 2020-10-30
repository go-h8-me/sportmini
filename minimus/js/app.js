const regCheck = document.querySelector("#regCheckbox"),
        regButton = document.querySelector("#regButton");


function checkChecked(){
    if(regCheck.checked){
        regButton.removeAttribute("disabled");
    }else{
        regButton.setAttribute("disabled", "disabled");
    }
}
regCheck.addEventListener("click", checkChecked);
checkChecked();