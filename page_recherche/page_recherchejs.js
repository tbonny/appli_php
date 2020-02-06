function API() {
    fetch('api.php').then ((resp)=>resp.json()).then (function(data){
        //Data est la réponse HTTP de l'API
        console.log(data);
        UpdateDiv("f", data[0]);
    })
    .catch(function(error){
        console.log(error);
    });  
}

function UpdateDiv(id, text){
    var e =document.getElementById(id).innerHTML = text;
}