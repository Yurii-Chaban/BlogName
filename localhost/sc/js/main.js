$('documenr').ready((function () {
    $.ajax({
            method: "GET",
            url: "data.json"
        })
        .done(function (data) {
            lastID = data.lastid;
            for (var i = 1; i <= lastID; i++) {
                if (data[i].text != '') {
                    $('#tasks').append('<li  class="task" id="' + i + '">' + data[i].text + '</li>')
                }
            }
        });
    $('#tasks').on('click', '.task', function () {
        formData = {
            "idtodelete": $(this).attr('id')
        }
        $(this).remove();
        $.ajax({
            method: "POST",
            url: "app.php",
            data: 'formdata=' + $.toJSON(formData)
        });
    });
    $("#data-input").submit(function () {
        if ($('#todovalue').val() != '') {
            currentID = lastID + 1;
            formData = {
                "text": $('#todovalue').val(),
                "id": currentID
            }
            $.ajax({
                    method: "POST",
                    url: "app.php",
                    data: 'formdata=' + $.toJSON(formData)
                });
            if (formData.text != '') {
                $('#tasks').append('<li' +
                    'class="task">' + formData.text + '</li>');
            }
        }
    });
}));