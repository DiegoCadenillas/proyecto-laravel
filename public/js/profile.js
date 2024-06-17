document.addEventListener('DOMContentLoaded', (event) => {
    const editButton = document.getElementById('edit-profile-btn');
    const cancelButton = document.getElementById('cancel-edit-profile-btn');
    const profileInfo = document.getElementById('profile-info');
    const profileForm = document.getElementById('profile-form');

    editButton.addEventListener('click', () => {
        profileInfo.style.display = 'none';
        profileForm.style.display = 'block';
    });

    cancelButton.addEventListener('click', () => {
        profileForm.style.display = 'none';
        profileInfo.style.display = 'block';
    })
});
