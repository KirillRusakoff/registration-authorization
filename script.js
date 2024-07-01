const onAuth = document.querySelector('#on_auth');
const onReg = document.querySelector('#on_reg');
const authorization = document.querySelector('#authorization');
const registration = document.querySelector('#registration');

onAuth.addEventListener('click', function(){
    registration.style = 'display:none';
    authorization.style = 'display: flex';
});

onReg.addEventListener('click', function(){
    authorization.style = 'display:none';
    registration.style = 'display: flex';
});

// Вешаем обработчик на событие 'submit' формы с id 'registration'
registration.addEventListener('submit', function(event) {
    event.preventDefault();

    // Сериализация данных формы
    const data = $(this).serialize();

    // Отправка AJAX запроса
    $.ajax({
        url: "./php-code/registration.php", // URL для отправки данных
        type: "POST", // Метод отправки данных
        data: data // Сериализованные данные формы
    })
    .done(function(response) {
        // Если запрос успешен, показываем сообщение об успешной регистрации
        document.querySelector('.form__success').style.display = 'block';
        setTimeout(function(){
            document.querySelector('.form__success').style.display = 'none';
        }, 1500);
    })
    .fail(function(xhr, status, error) {
        // Если запрос неуспешен, показываем сообщение об ошибке
        document.querySelector('.form__error').style.display = 'block';
        setTimeout(function(){
            document.querySelector('.form__error').style.display = 'none';
        }, 1500);
    });
});

document.addEventListener('DOMContentLoaded', function() {
    const checkbox = document.getElementById('rules');
    const submitButton = document.getElementById('submit');

    checkbox.addEventListener('change', function() {
        submitButton.disabled = !this.checked;
    });
});
