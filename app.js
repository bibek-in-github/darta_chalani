const backBtn = document.querySelector('.back-btn');

backBtn && backBtn.addEventListener('click', () => {
    window.history.back();
});

const deleteForm = document.querySelector('.deleteForm');

deleteForm && deleteForm.addEventListener('submit', (e) => {
    const confirmDelete = confirm('Are you sure you want to delete this?');
    if (!confirmDelete) {
        e.preventDefault();
    }
});