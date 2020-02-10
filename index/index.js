function modif_1(){
    var element = document.getElementById('modif1');
    element.innerHTML='allez, rejoins nous !!!';
}

function modif_2(){
    var element = document.getElementById('modif2');
    element.innerHTML='Ta pas interet a avoir oublier ton MDP !!!';
}

function modif_3(){
    var element = document.getElementById('modif3');
    element.innerHTML='The master is back !!!';
}

var myVar = setInterval(heure, 1000);

function heure() {

    var d = new Date();
    var n = d.getHours();
    if(n<10){
        var n = "0"+d.getHours();
    }else{
        var n = d.getHours();
    }
    var x = d.getMinutes();
    if(x<10){
        var x = "0"+d.getMinutes();
    }else{
        var x = d.getMinutes();
    }
    var y = d.getSeconds();
    if(y<10){
        var y = "0"+d.getSeconds();
    }else{
        var y = d.getSeconds();
    }
    document.getElementById("time").innerHTML = "Heure : " + n + ":" + x + ":" + y;
}



     
     
    






    
