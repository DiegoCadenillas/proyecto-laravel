let userReview = document.body.querySelector('#user-review');

let currentUserReviewValue = userReview.innerHTML;

restartUserReview();

function restartUserReview() {
    let reviewEditForm = document.body.querySelector('#review-edit-form');
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

        reviewEditForm.innerHTML =
            '<h4 class="mb-4" style="text-align:center;width:100%;">Edite su reseña</h1>' +

            '      <div class="form-group">' +
            '        <label for="score">Puntuación</label>' +
            '        <select class="form-control" id="score" name="score" required>' +
            '          <option value="" disabled selected>Elija una opción</option>' +
            '          <option value="5">5 - Excelente</option>' +
            '          <option value="4">4 - Muy bueno</option>' +
            '          <option value="3">3 - Decente</option>' +
            '          <option value="2">2 - Regular</option>' +
            '          <option value="1">1 - Malo</option>' +
            '        </select>' +
            '      </div>' +

            '      <div class="form-group" style="margin-top:1.5rem">' +
            '        <label for="comment">Comentario</label>' +
            '        <textarea class="form-control" id="comment" name="comment" rows="3" required></textarea>' +
            '      </div>' +

            '      <input type="hidden" name="productId" value="{{ $product->id }}" style="margin-top:1.5rem">' +

            '      <button type="submit" class="btn btn-primary">Guardar Reseña</button>' +
            '      <button type="button" class="btn btn-warning" id="cancel-review-edit-btn">Cancelar</button>';
        reviewEditForm.classList.remove('hidden-review-edit-form');

        let cancelReviewEditBtn = document.body.querySelector('#cancel-review-edit-btn');

        cancelReviewEditBtn.addEventListener("click", () => {
            restartUserReview();
        })
    })
}