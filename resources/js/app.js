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

        const title_comic = elem.getAttribute('title-comic');

        const modal = document.getElementById('modal-delete');
        
        const CreateModal = new bootstrap.Modal(modal);
        CreateModal.show();

        console.log(title_comic);
        const title = document.getElementById('title');
        title.innerText = title_comic;

        const confirmDelete = document.querySelector('button.btn.btn-primary');
        confirmDelete.addEventListener('click', function(){
            elem.parentElement.submit();
        });
    })
})
