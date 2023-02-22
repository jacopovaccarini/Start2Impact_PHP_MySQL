function nessuna_prestazione() {
  Swal.fire({ // Messaggio avviso nessuna prestazione erogata
    title: "Nessuna Prestazione Erogata trovata in Bonny",
    icon: 'warning',
    showCancelButton: false,
    confirmButtonColor: "#22b14c"
  });
}

function error_date() {
  Swal.fire({ // Messaggio avviso nessuna prestazione erogata
    title: "La Data finale non può essere prima della Data iniziale",
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
    title: 'Prestazione creata correttamente'
  });
}

function success_delete() {
  Toast.fire({ // Messaggio avviso prestazione cancellata
    icon: 'success',
    title: 'Prestazione eliminata correttamente'
  });
}

function error_create() {
  Toast.fire({ // Messaggio errore prestazione non creata
    icon: 'error',
    title: 'Impossibile creare la prestazione'
  });
}

function error_delete() {
  Toast.fire({ // Messaggio errore prestazione non cancellata
    icon: 'error',
    title: 'Impossibile eliminare la prestazione'
  });
}
