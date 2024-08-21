document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('edit-form');
    const saveButton = document.getElementById('save-button');

    // Сохраняем изначальные значения полей формы
    const initialFormState = new FormData(form);

    form.addEventListener('input', function () {
        const currentFormState = new FormData(form);
        let formChanged = false;

        // Сравниваем текущее состояние формы с исходным
        for (let [name, value] of currentFormState) {
            if (initialFormState.get(name) !== value) {
                formChanged = true;
                break;
            }
        }

        saveButton.disabled = !formChanged;
    });
});
