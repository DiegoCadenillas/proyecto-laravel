let userReview = document.body.querySelector('#user-review');

let currentUserReviewValue = userReview.innerHTML;

restartUserReview();

function restartUserReview() {
    let reviewEditForm = document.body.querySelector('#review-edit-form-content');
    console.log(userReview.classList);
    userReview.classList.remove('hidden-review-edit-form');
    userReview.innerHTML = currentUserReviewValue;
    reviewEditForm.classList.add('hidden-review-edit-form');
    reviewEditForm.innerHTML = '';
    reviewEditForm.classList.remove('review-edit-form');

    let reviewEditBtn = document.body.querySelector('#review-edit-btn');

    reviewEditBtn.addEventListener("click", () => {
        console.log('pee');
        userReview.classList.add('hidden-review-edit-form');
        userReview.innerHTML = '';
        reviewEditForm.classList.add('review-edit-form');

        reviewEditForm.style = 'display: block';
        reviewEditForm.classList.remove('hidden-review-edit-form');

        let cancelReviewEditBtn = document.body.querySelector('#cancel-review-edit-btn');

        cancelReviewEditBtn.addEventListener("click", () => {
            restartUserReview();
        })
    })
}