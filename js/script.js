"use strict"

function CreateURL(event) {
    var txtUrl = document.getElementById("txtUrl").value;
    let pResult = document.getElementById("pResult");
    pResult.innerHTML = "";

    if (txtUrl.length <= 3) {
        pResult.innerHTML = "<span style='color: red'>URL invalida</span>";
        return false;
    }
}

function Delete(event) {

   
    if (!confirm("Deseja realmente remover essa URL?"))
       return;
       event.disabled = true;
       event.value = "APAGADO";
       window.open("remove.php?id="+ event.getAttribute("data-id"), "_blank")       
}

function Login() {
    var txtUserkey = document.getElementById("txtUserkey").value;
    let pResult = document.getElementById("pResult");
    pResult.innerHTML = "";
    
    if (txtUserkey.length <= 3) {   
        pResult.innerHTML = "<span style='color: red'>Senha invalida</span>";   
        return false;
    } else {
        return true;
    }
}


function Copy(event){

    event.select();

   
    navigator.clipboard.writeText(event.value);
    alert("Copiado: " + event.value);
}