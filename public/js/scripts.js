function no_pe() {
  Swal.fire({ //messaggio avviso nessuna prestazione erogata
    title: "Nessuna Prestazione Erogata trovata in Bonny",
    icon: 'warning',
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
  Toast.fire({ //messaggio avviso prestazione creata
    icon: 'success',
    title: 'Prestazione creata correttamente'
  });
}

function success_delete() {
  Toast.fire({ //messaggio avviso prestazione cancellata
    icon: 'success',
    title: 'Prestazione eliminata correttamente'
  });
}

function error_create() {
  Toast.fire({ //messaggio errore prestazione non creata
    icon: 'error',
    title: 'Impossibile creare la prestazione'
  });
}

function error_delete() {
  Toast.fire({ //messaggio errore prestazione non cancellata
    icon: 'error',
    title: 'Impossibile eliminare la prestazione'
  });
}
