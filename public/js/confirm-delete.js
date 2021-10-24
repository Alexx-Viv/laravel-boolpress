const deleteButton = document.querySelectorAll(".delete-button");
deleteButton.forEach(form => {
    form.addEventListener("submit", function(e) {
        e.preventDefault();
        const conf = confirm("Sicuro di voler eliminare questo post?");
        if (conf) this.submit();
    });
});
