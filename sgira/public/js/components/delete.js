$(".form-delete").on("submit", function(e) {
    e.preventDefault();
    form = $(this);
    Swal.fire({
        title: "Deseja mesmo confirmar essa ação? ",
        text: "Essa ação será irreversível",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#28a745",
        cancelButtonColor: "#dc3545",
        cancelButtonText: "Não",
        confirmButtonText: "Sim",
        reverseButtons: true
    }).then(result => {
        if (result.value) {
            form.unbind(e);
            form.submit();
        }
    });
});
