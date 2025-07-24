// show small toast after cart update
function toast(msg) {
    const el = $('<div class="toast align-items-center text-white bg-success border-0" role="alert">')
        .html(`<div class="d-flex"><div class="toast-body">${msg}</div><button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button></div>`)
        .appendTo('body');
    new bootstrap.Toast(el[0]).show();
}