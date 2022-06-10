$("#sendMail").on("click", function() {
    var email = $("#email").val(); // Беру все значения из формы с id=email.
    var name = $("#name").val(); // Беру все значения из формы с id=name.
    var phone = $("#phone").val(); // Беру все значения из формы с id=phone.
    var message = $("#message").val(); // Беру все значения из формы с id=message.

    if(email == "") {
        $("#errorMess").text("Введите email");
        return false;
    } else if (name == "") {
        $("#errorMess").text("Введите ваше ФИО");
        return false;
    } else if (phone == "" || phone.length < 11) {
        $("#errorMess").text("Введите корректный номер, длина которого равняется 12 символам");
        return false;
    } 

    $("#errorMess").text("");

/** $.ajax({ 
        type: 'POST',
        url: ''
    })
*/
    window.localStorage.clear();
});