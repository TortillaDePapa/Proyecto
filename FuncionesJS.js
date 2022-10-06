document.addEventListener('DOMContentLoaded', (event) => {



    const producto1 = { Nombre: 'Lucas' }
    const producto2 = { Nombre: 'Lu' }
    const producto3 = { Nombre: 'cas' }

    BuscarEvento([producto1, producto2, producto3])

  


})

function BuscarEvento(arrayProductos) {

    let botonbuscar = document.getElementById('busqueda');
    botonbuscar.addEventListener('keypress', (event) => {

        if (event.code === 'Enter') {

            Buscar(arrayProductos,botonbuscar.value)
            
        }
    })




}


function Buscar(arrayProductos,query) {
    let arrayfiltrado = []


    if (arrayProductos.length > 0) {

        arrayfiltrado = arrayProductos.filter(producto => producto.Nombre.startsWith(query))


    }
    console.log(arrayfiltrado)

    return arrayfiltrado
}









