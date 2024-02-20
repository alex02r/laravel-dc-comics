import './bootstrap';
import '~resources/scss/app.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
])

const ModalDeleteButton = document.querySelectorAll('#modal-delete button[type="submit"]');

ModalDeleteButton.forEach(elem =>{
    elem.addEventListener('click', function(event){
        //non invia i valori della form
        event.preventDefault();
    })
})
