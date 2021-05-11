<div class="modal fade" id="pointOfSales" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Добавить новую точку</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="form">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="name" class="form-label">Название</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="url" class="form-label">URL</label>
                                <input type="url" class="form-control" name="url" id="url" required>
                            </div>
                            <div class="mb-3">
                                <label for="image_url" class="form-label">Изображение</label>
                                <input type="url" class="form-control" name="image_url" id="image_url" required>
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Телефон</label>
                                <input type="text" class="form-control" id="phone" name="phone" required>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="description" class="form-label">Описание</label>
                                <textarea name="description" id="description" cols="30" rows="5" class="form-control"
                                          required></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="address" class="form-label">Адрес</label>
                                <input type="text" class="form-control" id="address" name="address" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                    <button type="submit" class="btn btn-primary">Сохранить</button>
                </div>
            </form>
        </div>
    </div>
</div>
@section('scripts')
    <script>
        const form = $('#form');
        form.submit(function (event) {
            event.preventDefault();
            const data = serializeJson($(this).serializeArray());
            fetch('', {
                method: 'POST', body: JSON.stringify(data), headers: {
                    "Content-type": "application/json"
                }
            }).then(resp => resp.json())
                .then(data => {
                    if (data.success === false) {
                        alert(data.message)
                    } else {
                       location.reload();
                    }
                }).catch(err => {
                alert(err);
            });
        })

    </script>
@endsection
