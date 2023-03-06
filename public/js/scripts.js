function nessuna_prestazione() {
  Swal.fire({ // Messaggio avviso nessuna prestazione erogata
    title: "No Services Provided found in Bonny",
    icon: 'warning',
    showCancelButton: false,
    confirmButtonColor: "#22b14c"
  });
}

function error_date() {
  Swal.fire({ // Messaggio avviso nessuna prestazione erogata
    title: "The Final date cannot be before the Initial date",
    icon: 'error',
    showCancelButton: false,
    confirmButtonColor: "#22b14c"
  });
}

const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 4000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
});

function success_create() {
  Toast.fire({ // Messaggio avviso prestazione creata
    icon: 'success',
    title: 'Service created successfully'
  });
}

function success_delete() {
  Toast.fire({ // Messaggio avviso prestazione cancellata
    icon: 'success',
    title: 'Service deleted successfully'
  });
}

function error_create() {
  Toast.fire({ // Messaggio errore prestazione non creata
    icon: 'error',
    title: 'Unable to create service'
  });
}

function error_delete() {
  Toast.fire({ // Messaggio errore prestazione non cancellata
    icon: 'error',
    title: 'Unable to delete service'
  });
}
