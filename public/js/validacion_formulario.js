function iniciar(){
    document.informacion.addEventListener("invalid",
    validacion, true);
    document.getElementById("enviar").addEventListener("click",
    enviar, false);
    document.informacion.addEventListener("input", controlar,
    false);
}
function validacion(e){//Acciona cuando los campos de texto del todo el formulario no estan validados
    var elemento=e.target;
    elemento.style.background='rgba(188, 183, 47, 0.51)';
}
function enviar(){ //Verifica si los campos de texto estan validados antes de que se envie la informacion 
    var valido=document.informacion.checkValidity();
    var botonEnviar = document.getElementById('enviar');
    if(valido){
        //botonEnviar.disabled = false;
        console.log('El formulario esta correctamente validado');
        //document.informacion.submit();
    }
    else{
        //botonEnviar.disabled = false;
        console.log('El formulario no esta validad');
        //document.getElementById('enviar').disabled=true;
    }
}
function controlar(e){
    var elemento=e.target;
    if(elemento.validity.valid){ // Los datos introducidos son validos
        var formato_valido //en esta variable esta la imagen que se mostrata si el cuadro de texto esta con el formato adecudo
        formato_valido='data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgdmlld0JveD0iMCAwIDQ5MS40MTUgNDkxLjQxNSIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgNDkxLjQxNSA0OTEuNDE1OyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSIgd2lkdGg9IjI0cHgiIGhlaWdodD0iMjRweCI+CjxnPgoJPGc+CgkJPHBhdGggZD0iTTQ5MS4wMTUsODAuOTU5Yy0wLjItMi45LTAuMS01LjctMC42LTguNmMtMC43LTUuNy0yLTExLjMtMy45LTE2LjhjLTcuNi0yMS44LTI0LjYtMzkuOS00NS45LTQ4LjYgICAgYy0yLjctMS01LjQtMi4xLTguMS0yLjljLTIuOS0wLjctNS40LTEuNS04LjYtMmwtNC44LTAuN2wtMi40LTAuM2wtMS43LTAuMWwtMy4zLTAuMmwtMS42LTAuMWgtMi42bC0yNi4xLDAuMWwtNTIuMiwwLjEgICAgYy02OS42LDAuMS0xMzkuMSwwLjEtMjA4LjUtMC41Yy0xMi4zLTAuMS0zMS43LDMuNC0zNy44LDUuOGMtMTIuMSw0LjksMy42LDksMjcuMSwxMi4xYzc3LjUsMTAuMywxNzEuNSwxNC44LDI2Ny4yLDE2bDIxLjYsMC4zICAgIGwxMC4xLDAuMWw1LjQsMC4zYzEuNSwwLjIsMi40LDAuNSwzLjcsMC42YzEwLjUsMi4xLDIwLjcsOC4yLDI3LjUsMTYuN2M2LjksOC42LDEwLjUsMTkuMywxMC4zLDMwLjJsLTAuNiw0My4yICAgIGMtMC43LDU3LjYtMS4zLDExNS4yLTIsMTcyLjljLTAuMiwyOC44LTAuNCw1Ny43LTAuNiw4Ni41bC0wLjEsMjEuNmMwLjEsOC4xLTAuMywxMi42LTEuNSwxNi44Yy0yLjQsOS43LTguNCwxOC41LTE2LjYsMjQuMyAgICBjLTQuMSwyLjktOC42LDUuMS0xMy40LDYuNWMtMi40LDAuNy00LjksMS4xLTcuNCwxLjVsLTMuOCwwLjJjLTEuNCwwLjEtMy41LDAtNS4yLDAuMWwtNDMuNCwwLjJjLTI4LjksMC4zLTU3LjksMC42LTg2LjgsMC45ICAgIGMtMjguNy0wLjQtNTcuMy0wLjctODYtMS4xbC02OC4yLTAuNmwtMzQuMS0wLjJoLTQuM2gtMi4xaC0wLjNoLTAuOGwtNC4zLTAuMmMtMC44LDAtMS4yLTAuMS0xLjUtMC4ybC0xLjEtMC4yICAgIGMtMS4zLTAuMS0zLjMtMC44LTUuMi0xLjJjLTEuOC0wLjctMy43LTEuMi01LjQtMi4xYy03LTMuMi0xMy04LjUtMTcuMy0xNC45Yy00LjItNi41LTYuNy0xMy45LTYuOS0yMS42bC0wLjEtNjcuMyAgICBjLTAuMS00NS40LTAuNC05MC44LTAuOS0xMzYuMWMtMC4zLTIyLjctMC42LTQ1LjMtMC45LTY3LjlsLTAuOC0zMy45bC0wLjMtMTdsLTAuMi04LjV2LTEuMXYtMC4zdi0wLjFjMC0wLjEsMC0wLjEsMC0wLjFsMC4xLTEuOCAgICBjMC4xLTEuMywwLTMuMSwwLjItNHMwLjMtMS45LDAuNC0yLjhjMC4xLTAuOSwwLjUtMi4yLDAuNi0zLjNjMC4yLTEuMSwwLjUtMi4yLDAuOS0zLjNjMC40LTEuMSwwLjYtMi4yLDEtMy4yICAgIGMxLjUtNC4yLDMuOC04LDYuMS0xMS41YzQuOS02LjgsMTAuOS0xMi4xLDE2LjYtMTUuOGMxMS4zLTcuMiwyMC44LTkuNCwxOS0xNC4yYy0wLjgtMS45LTMuOC00LjEtOS01Yy01LjItMS4yLTEyLjctMS0yMS41LDEuOCAgICBjLTguNywyLjgtMTksOC40LTI3LjUsMTguMmMtOC42LDkuNy0xNS40LDIzLjItMTYuOCwzOS44bC0wLjMsNC40bC0wLjEsNS4xbC0wLjIsOC45bC0wLjUsMTcuOGMtMC4yLDExLjktMC40LDIzLjgtMC42LDM1LjcgICAgYy0wLjQsMjMuOC0wLjgsNDcuNi0xLjEsNzEuNGMtMC43LDQ3LjYtMS4xLDk1LjMtMSwxNDIuOWwwLjEsMjguN2wwLjEsMTQuNGMwLDIuNSwwLDQuNiwwLjEsNy40YzAuMiwzLDAuMSw2LDAuNyw5ICAgIGMxLjYsMTIsNiwyMy42LDEyLjgsMzMuNmM2LjgsOS45LDE1LjksMTguMywyNi40LDI0LjJjMi42LDEuNSw1LjQsMi43LDguMSw0YzIuOCwxLDUuNiwyLjIsOC41LDNjMywwLjcsNS42LDEuNiw5LjEsMmw0LjksMC43ICAgIGMxLjcsMC4yLDIuNSwwLjEsMy44LDAuMmw0LjQsMC4yaDMuNmw3LjItMC4xbDE0LjMtMC4xbDU3LjQtMC41Yzc2LjUtMC43LDE1My0xLjUsMjI5LjUtMi4ybDEyLjksMC41YzIuMiwwLjEsNC4xLDAuMiw2LjcsMC4yICAgIGMyLjYtMC4xLDUuMiwwLDcuOC0wLjNjMTAuNS0wLjksMjAuOC00LjEsMzAuMS05LjNjMTguNi0xMC4zLDMyLjktMjguOSwzNy43LTUwLjJjMi43LTEzLjIsMS44LTIwLjEsMi4zLTI5LjFsMC42LTI1LjkgICAgYzAuMy0xNy4zLDAuNi0zNC42LDAuOS01MS45YzEtNjkuMiwxLjQtMTM4LjYsMS40LTIwOC4ydi0yNi4xdi0zLjNDNDkxLjExNSw4My41NTksNDkxLjExNSw4Mi41NTksNDkxLjAxNSw4MC45NTl6IiBmaWxsPSIjMThiYzljIi8+CgkJPHBhdGggZD0iTTE4Ni45MTUsMzM2Ljc1OUwxODYuOTE1LDMzNi43NTljNS42LDYuNCwxNS4zLDcuMiwyMS43LDEuNmwxLjgtMS42YzIyLjItMTkuMSw0NC0zOC44LDYzLjItNjEuMWM0LTMuNCw4LTYuOCwxMS44LTEwLjIgICAgYzI0LjYtMjIuMSw0OC40LTQ1LDY4LjgtNzEuMWM1LjgtNy40LDguMS0xNi4xLDEuMi0yMi4xYy02LjMtNS40LTE1LjMtNS4xLTIyLjgsMWMtMTMuNCwxMC45LTI3LjEsMjEuOC0zOS4yLDM0LjIgICAgYy0xOS41LDE5LjktMzcuOCw0MC45LTU2LjUsNjEuNGMtMTMuNSw4LjQtMjUuOSwxOC4yLTM3LjYsMjguNmMtMTUuNS0xNS40LTMxLjMtMzAuNC00NS45LTQ2LjVjLTEuNS0xLjctNi41LTEuNy05LTAuOCAgICBjLTUsMS45LTUuOSw2LjgtNS4xLDEyLjFjMi42LDE3LjMsMTEuNSwzMi42LDIyLjksNDUuN0wxODYuOTE1LDMzNi43NTl6IiBmaWxsPSIjMThiYzljIi8+Cgk8L2c+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPC9zdmc+Cg==';
        elemento.style.background="url('"+formato_valido+"') center right no-repeat, -webkit-linear-gradient(left, rgba(146, 196, 187, 0.63), rgba(228, 240, 238, 0.48))";
        elemento.style.background="url('"+formato_valido+"') center right no-repeat, -moz-linear-gradient(left, rgba(146, 196, 187, 0.63), rgba(228, 240, 238, 0.48))";
        elemento.style.background="url('"+formato_valido+"') center right no-repeat, linear-gradient(left, rgba(146, 196, 187, 0.63), rgba(228, 240, 238, 0.48))";
    }else{// Los datos introducidos son invalidos
        elemento.style.background='url(data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgdmlld0JveD0iMCAwIDQ5MS40MTUgNDkxLjQxNSIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgNDkxLjQxNSA0OTEuNDE1OyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSIgd2lkdGg9IjI0cHgiIGhlaWdodD0iMjRweCI+CjxnPgoJPGc+CgkJPHBhdGggZD0iTTQ5MS4wMTUsODAuOTU5Yy0wLjItMi45LTAuMS01LjctMC42LTguNmMtMC43LTUuNy0yLTExLjMtMy45LTE2LjhjLTcuNi0yMS44LTI0LjYtMzkuOS00NS45LTQ4LjYgICAgYy0yLjctMS01LjQtMi4xLTguMS0yLjljLTIuOS0wLjctNS40LTEuNS04LjYtMmwtNC44LTAuN2wtMi40LTAuM2wtMS43LTAuMWwtMy4zLTAuMmwtMS42LTAuMWgtMi42bC0yNi4xLDAuMWwtNTIuMiwwLjEgICAgYy02OS42LDAuMS0xMzkuMSwwLjEtMjA4LjUtMC41Yy0xMi4zLTAuMS0zMS43LDMuNC0zNy44LDUuOGMtMTIuMSw0LjksMy42LDksMjcuMSwxMi4xYzc3LjUsMTAuMywxNzEuNSwxNC44LDI2Ny4yLDE2bDIxLjYsMC4zICAgIGwxMC4xLDAuMWw1LjQsMC4zYzEuNSwwLjIsMi40LDAuNSwzLjcsMC42YzEwLjUsMi4xLDIwLjcsOC4yLDI3LjUsMTYuN2M2LjksOC42LDEwLjUsMTkuMywxMC4zLDMwLjJsLTAuNiw0My4yICAgIGMtMC43LDU3LjYtMS4zLDExNS4yLTIsMTcyLjljLTAuMiwyOC44LTAuNCw1Ny43LTAuNiw4Ni41bC0wLjEsMjEuNmMwLjEsOC4xLTAuMywxMi42LTEuNSwxNi44Yy0yLjQsOS43LTguNCwxOC41LTE2LjYsMjQuMyAgICBjLTQuMSwyLjktOC42LDUuMS0xMy40LDYuNWMtMi40LDAuNy00LjksMS4xLTcuNCwxLjVsLTMuOCwwLjJjLTEuNCwwLjEtMy41LDAtNS4yLDAuMWwtNDMuNCwwLjJjLTI4LjksMC4zLTU3LjksMC42LTg2LjgsMC45ICAgIGMtMjguNy0wLjQtNTcuMy0wLjctODYtMS4xbC02OC4yLTAuNmwtMzQuMS0wLjJoLTQuM2gtMi4xaC0wLjNoLTAuOGwtNC4zLTAuMmMtMC44LDAtMS4yLTAuMS0xLjUtMC4ybC0xLjEtMC4yICAgIGMtMS4zLTAuMS0zLjMtMC44LTUuMi0xLjJjLTEuOC0wLjctMy43LTEuMi01LjQtMi4xYy03LTMuMi0xMy04LjUtMTcuMy0xNC45Yy00LjItNi41LTYuNy0xMy45LTYuOS0yMS42bC0wLjEtNjcuMyAgICBjLTAuMS00NS40LTAuNC05MC44LTAuOS0xMzYuMWMtMC4zLTIyLjctMC42LTQ1LjMtMC45LTY3LjlsLTAuOC0zMy45bC0wLjMtMTdsLTAuMi04LjV2LTEuMXYtMC4zdi0wLjFjMC0wLjEsMC0wLjEsMC0wLjFsMC4xLTEuOCAgICBjMC4xLTEuMywwLTMuMSwwLjItNHMwLjMtMS45LDAuNC0yLjhjMC4xLTAuOSwwLjUtMi4yLDAuNi0zLjNjMC4yLTEuMSwwLjUtMi4yLDAuOS0zLjNjMC40LTEuMSwwLjYtMi4yLDEtMy4yICAgIGMxLjUtNC4yLDMuOC04LDYuMS0xMS41YzQuOS02LjgsMTAuOS0xMi4xLDE2LjYtMTUuOGMxMS4zLTcuMiwyMC44LTkuNCwxOS0xNC4yYy0wLjgtMS45LTMuOC00LjEtOS01Yy01LjItMS4yLTEyLjctMS0yMS41LDEuOCAgICBjLTguNywyLjgtMTksOC40LTI3LjUsMTguMmMtOC42LDkuNy0xNS40LDIzLjItMTYuOCwzOS44bC0wLjMsNC40bC0wLjEsNS4xbC0wLjIsOC45bC0wLjUsMTcuOGMtMC4yLDExLjktMC40LDIzLjgtMC42LDM1LjcgICAgYy0wLjQsMjMuOC0wLjgsNDcuNi0xLjEsNzEuNGMtMC43LDQ3LjYtMS4xLDk1LjMtMSwxNDIuOWwwLjEsMjguN2wwLjEsMTQuNGMwLDIuNSwwLDQuNiwwLjEsNy40YzAuMiwzLDAuMSw2LDAuNyw5ICAgIGMxLjYsMTIsNiwyMy42LDEyLjgsMzMuNmM2LjgsOS45LDE1LjksMTguMywyNi40LDI0LjJjMi42LDEuNSw1LjQsMi43LDguMSw0YzIuOCwxLDUuNiwyLjIsOC41LDNjMywwLjcsNS42LDEuNiw5LjEsMmw0LjksMC43ICAgIGMxLjcsMC4yLDIuNSwwLjEsMy44LDAuMmw0LjQsMC4yaDMuNmw3LjItMC4xbDE0LjMtMC4xbDU3LjQtMC41Yzc2LjUtMC43LDE1My0xLjUsMjI5LjUtMi4ybDEyLjksMC41YzIuMiwwLjEsNC4xLDAuMiw2LjcsMC4yICAgIGMyLjYtMC4xLDUuMiwwLDcuOC0wLjNjMTAuNS0wLjksMjAuOC00LjEsMzAuMS05LjNjMTguNi0xMC4zLDMyLjktMjguOSwzNy43LTUwLjJjMi43LTEzLjIsMS44LTIwLjEsMi4zLTI5LjFsMC42LTI1LjkgICAgYzAuMy0xNy4zLDAuNi0zNC42LDAuOS01MS45YzEtNjkuMiwxLjQtMTM4LjYsMS40LTIwOC4ydi0yNi4xdi0zLjNDNDkxLjExNSw4My41NTksNDkxLjExNSw4Mi41NTksNDkxLjAxNSw4MC45NTl6IiBmaWxsPSIjRDgwMDI3Ii8+CgkJPHBhdGggZD0iTTE0Ny4zMTUsMzE1Ljg1OWMtMS4zLDEuMi0wLjgsNS42LDAuMyw4YzIuMiw0LjcsNi43LDYsMTEuMyw1LjhjMTUuMS0wLjUsMjcuOC02LjksMzguNC0xNS43ICAgIGMxNS44LTEzLjMsMzIuMS0yNi4xLDQ3LjItNDAuMmMwLjEsMC4xLDAuMywwLjIsMC40LDAuM2MyLjYsMy4yLDUuMiw2LjQsNy45LDkuNWMxNy4yLDE5LjYsMzUuMiwzOC4zLDU2LjQsNTMuNyAgICBjNiw0LjQsMTMuNiw1LjUsMTkuNi0xLjRjNS41LTYuMiw2LjEtMTQuMiwxLjUtMjAuMmMtOC40LTEwLjgtMTYuNy0yMS44LTI2LjUtMzEuM2MtMTItMTEuNi0yNC43LTIyLjUtMzcuMy0zMy41ICAgIGMxLjItMS40LDIuNC0yLjcsMy41LTQuMWMzLjItMi42LDYuNC01LjIsOS41LTcuOWMxOS42LTE3LjIsMzguMy0zNS4yLDUzLjctNTYuNGM0LjQtNiw1LjUtMTMuNi0xLjQtMTkuNiAgICBjLTYuMi01LjUtMTQuMi02LjEtMjAuMi0xLjVjLTEwLjgsOC40LTIxLjgsMTYuNy0zMS4zLDI2LjVjLTEyLDEyLjQtMjMuMiwyNS40LTM0LjUsMzguNGMtMTkuOC0yOC4yLTQ3LjQtNDkuNC03MC4xLTc1ICAgIGMtMS4yLTEuMy01LjYtMC44LTgsMC4zYy00LjcsMi4yLTYsNi43LTUuOCwxMS4zYzAuNSwxNS4xLDYuOSwyNy44LDE1LjcsMzguNGMxMy40LDE1LjksMjYuMywzMi4zLDQwLjUsNDcuNSAgICBDMTkxLjkxNSwyNjguMjU5LDE3MS42MTUsMjk0LjI1OSwxNDcuMzE1LDMxNS44NTl6IiBmaWxsPSIjRDgwMDI3Ii8+Cgk8L2c+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPC9zdmc+Cg==)center right no-repeat, -webkit-linear-gradient(left, rgba(152, 3, 3, 0.22), #fff1f1)';
    }
}
window.addEventListener("load", iniciar, false);