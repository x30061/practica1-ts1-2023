let reqsapi = "../api/requisitos.php?codigo=";

let bapi = document.querySelector("#reqs");
bapi.addEventListener("click",miAPI);

async function miAPI() 
{
    let cod = document.querySelector("#cod").value;
    //alert(cod);
    let v1 = await fetch(reqsapi + cod);
    let v2 = await v1.json();
    v2.sort((a,b) => { return -(a.semestre - b.semestre); });
    //alert(JSON.stringify(v2,null,2));
    //console.log(v2);
    borrarTabla();
    crearTabla(v2);
}

function borrarTabla()
{
    let div1 = document.querySelector("#cursos");
    while (div1.firstChild) { div1.removeChild(div1.firstChild); }
}

function crearTabla(cursos)
{
    let tabla = document.createElement("table");
    tabla.classList.add("ecenter");
    let hsem = document.createElement("th");
    let hcod = document.createElement("th");
    let hnom = document.createElement("th");
    hsem.textContent = "SEMESTRE";
    hcod.textContent = "CODIGO";
    hnom.textContent = "NOMBRE";
    tabla.appendChild(hsem);
    tabla.appendChild(hcod);
    tabla.appendChild(hnom);

    for (let i = 0; i < cursos.length; i++) 
    {
        let cur = cursos[i];
        //console.log(JSON.stringify(cur));
        let sem = document.createElement("td");
        let cod = document.createElement("td");
        let nom = document.createElement("td");
        sem.textContent = cur.semestre;
        cod.textContent = cur.codigo;
        nom.textContent = cur.nombre;

        sem.classList.add("tcenter");

        let fila = document.createElement("tr");
        fila.appendChild(sem);
        fila.appendChild(cod);
        fila.appendChild(nom);
        tabla.appendChild(fila);
    }
    let div1 = document.querySelector("#cursos");
    div1.appendChild(tabla);
}