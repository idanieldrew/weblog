jQuery(document).ready(function($) {
    //create category

    $("#btn-save").click(function(e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        })
        e.preventDefault()

        let formData = {
            name: $("#name").val(),
            slug: $("#slug").val(),
            category_id: $("#category_id").val()
        }
        let state = $("#btn-save").val();
        let type = "POST";
        let todo_id = $("#todo_id").val();
        let ajaxUrl = 'store';

        $.ajax({
            type: type,
            url: ajaxUrl,
            data: formData,
            dataType: 'json',

            success: function(data) {
                let list = '<tr id="category' + data.id + '"><td>' + data.id + '</td><td>' + data.name + '</td><td>' + data.slug + '</td><td>' + data.category_id + '</td><td><a href="edit/ ' + data.id + '" class="btn btn-add btn-sm" data-toggle="modal"><i class="fa fa-pencil></i></a><button class="deleteRecord btn btn-danger" data-id=' + data.id + '><i class="fa fa-trash-o"></i></button></td></tr> '

                if (state == 'save') {
                    jQuery('#category_list').append(list)
                } else {
                    jQuery("#category" + todo_id).replaceWith(list);
                }
            },
            error: function(data) {
                console.log(data);
            }
        })
    });
    $(".deleteRecord").click(function() {
        let category = $(this).data("id");
        let token = $("meta[name='csrf-token']").attr("content");
        $.ajax({
            url: category,
            type: 'DELETE',
            data: {
                "id": category,
                "_token": token,
            },
            success: function(data) {
                $('#category' + category).remove()
            },
            error: function(data) {
                console.log(data);
            }

        });


    });

});