import './bootstrap';
import '~resources/scss/app.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
])

const ModalDeleteButton = document.querySelectorAll('#form-delete button[type="submit"]');

ModalDeleteButton.forEach(elem =>{
    elem.addEventListener('click', function(event){
        //non invia i valori della form
        event.preventDefault();

        const modal = document.getElementById('modal-delete');

        const CreateModal = new bootstrap.Modal(modal);
        CreateModal.show();

        const confirmDelete = document.querySelector('button.btn.btn-primary');
        confirmDelete.addEventListener('click', function(){
            button.parent.submit();
        });
    })
})
