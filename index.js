$(document).ready(function () {

    list()

    $('#submitForm').on("submit", (e) => {
        let formData = new FormData(document.getElementById('submitForm'))

        $.ajax({
            type: "POST",
            data: formData,
            url: "action.php",
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                list();
                $('#myModal').modal('hide');
            }
        });
    })



    $("#search").on("keyup", function () {
        let search = $("#search").val();
        $.ajax({
            type: "POST",
            url: "action.php",
            data: {
                type: "search",
                search: search,
            },
            success: function (data) {
                $("#tbody").html(data);
            },
        });
    });



    $(document).on('click', '.edit', function () {
        let editId = this.getAttribute('id');
        $('#myModal').modal('show');

        $.ajax({
            type: "POST",
            data: {
                type: "edit",
                editId: editId
            },
            url: "action.php",
            success: function (data) {
                let parsedEditData = JSON.parse(data);

                let id = parsedEditData.id;
                let name = parsedEditData.name;
                let age = parsedEditData.age;
                let email = parsedEditData.email;


                $("#hiddenId").val(id);
                $("#name").val(name);
                $("#age").val(age);
                $("#email").val(email);



            }
        });


    })

})


$(".dec").on("click", (e) => {

    console.log('Yo! dec');
    let dec = "DESC";
    list(dec);
});


$(".inc").on("click", (e) => {

    console.log('Yo! inc');

    let asc = "ASC";
    list(asc);
});



$(document).on('click', '.delete', function () {

    let deleteId = $(this).attr("id");

    $.ajax({
        type: "POST",
        data: {
            type: "delete",
            deleteId: deleteId
        },
        url: "action.php",
        success: function (data) {
            list()
        }
    });
})

$(document).on('click', '.page-item', function () {
    let page = $(this).attr("id");

    list("",page);
})


document.getElementById('myModal').addEventListener('hidden.bs.modal', function () {
    var form = this.querySelector('form');
    if (form) {
        form.reset();
    }
});


function list( sort = 'asc', page = 1) {
    $.ajax({
        type: "POST",
        data: {
            type: "list",
            page: page,
            sort: sort
        },
        url: "action.php",
        success: function (data) {
            let parsedData = JSON.parse(data);

            let tbodyData = parsedData['tbody'];
            let pagination = parsedData['pagination'];

            console.log("pagination", parsedData);

            $('#tbody').html(tbodyData)
            $("#pagination").html(pagination);
        }
    });
}
