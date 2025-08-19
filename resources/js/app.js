import './bootstrap';
import '../css/app.css';
import 'flatpickr';

import "flatpickr/dist/flatpickr.min.css";

import '@fortawesome/fontawesome-free/css/all.min.css';

import Choices from 'choices.js';
import 'choices.js/public/assets/styles/choices.min.css';

import Swal from 'sweetalert2';
window.Swal = Swal; // Make it available globally

document.addEventListener('DOMContentLoaded', () => {
    const userTypeSelect = document.getElementById('user_type');
    if (userTypeSelect) {
        new Choices(userTypeSelect, {
            searchEnabled: true,
            itemSelectText: '',
            removeItemButton: false,
            shouldSort: false
        });
    }

    window.addEventListener('showDeleteConfirm', event => {
        Swal.fire({
            title: 'Are you sure?',
            text: "This action cannot be undone.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                Livewire.dispatch('deleteUser', { id: event.detail.id });
            }
        });
    });

    window.addEventListener('deleted', () => {
        Swal.fire(
            'Deleted!',
            'The user has been deleted.',
            'success'
        );
    });
});

flatpickr(".datepicker", {
    dateFormat: "Y-m-d",
});


