((d,w,c,M)=>{
    M.AutoInit();

    const horario = d.getElementById('horario'),
    form = d.forms[0],
    respuesta = d.querySelector('.response');

    const mensaje_error = msg => `
    <p class="section center red darken-1 white-text messages">
    ${msg}
    <br>
    <i class="material-icons">sentiment_very_dissatisfied</i>
    </p>
    `;

    const mensaje_ok = msg => `
    <p class="section center green darken-1 white-text messages">
    ${msg}
    <br>
    <i class="material-icons">sentiment_very_satisfied</i>
    </p>
    `;  
    
    d.addEventListener('change',e=>{
        if (e.target.matches('#actividad')) {
            let data = new FormData();
            data.append('disciplina', e.target.value);

            fetch('./app.php',{
                body: data,
                method: 'POST'
            })
            .then(res => { 
                let mensaje = mensaje_ok(`Correcto`); 
                c(res);
                return (res.ok) ? res.text() : Promise.reject({ status: res.status, statusText: res.statusText})
            })
            .then(res => { 
                c(res);
                horario.innerHTML=`<h5 class="grey-text text-darken-2">Elige horario</h5>${res}`
            })            
            .catch(err => { 
                let mensaje = mensaje_error(`Algo salio mal. Error ${err.status}: ${err.statusText}`); 
                c(mensaje);
                horario.innerHTML=mensaje;
            })
        }
    });

    d.addEventListener('submit',e=>{

    });

    d.addEventListener('click',e=>{

    });
    
})(document, window, console.log, M);