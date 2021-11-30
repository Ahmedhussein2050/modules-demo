jQuery(document).ready(function($){
    ////----- Open the modal to CREATE a link -----////
    jQuery('#btn-add').click(function () {
        jQuery('#btn-save').val("add");
        jQuery('#modalFormData').trigger("reset");
        jQuery('#categoryEditorModal').modal('show');
    });

    ////----- Open the modal to UPDATE a link -----////
    jQuery('.open-modal').click(function () {
        var id = $(this).val();
        $.get('categories/' + id, function (data) {
            jQuery('#id').val(data.id);
            jQuery('#category').val(data.name);
            jQuery('#description').val(data.desc);
            jQuery('#btn-save').val("update");
            jQuery('#categoryEditorModal').modal('show');
        })
    });

    // Clicking the save button on the open modal for both CREATE and UPDATE
    $("#btn-save").click(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        e.preventDefault();
        var formData = {
            name: jQuery('#category').val(),
            desc: jQuery('#description').val(),
        };
        var state = jQuery('#btn-save').val();
        var type = "POST";
        var id = jQuery('#id').val();
        var ajaxurl = 'create';
        if (state === "update") {
            type = "PUT";
            ajaxurl = 'categories/' + id;
        }
        $.ajax({
            type: type,
            url: ajaxurl,
            data: formData,
            dataType: 'json',
            success: function (data) {
                var category =
                    '<tr>'+'<td>'+data.id+'</td><td>'+data.name+'</td><td>'+data.desc+'</td>'+'<td><button class="btn btn-info open-modal">Edit</button><button class="btn btn-danger open-modal">Delete</button></td>'+'</tr>';
                if (state === "add") {
                    jQuery('#categories-list').append(category);
                } else {
                    $("#category" + id).replaceWith(category);
                }
                jQuery('#modalFormData').trigger("reset");
                jQuery('#categoryEditorModal').modal('hide')
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });

    ////----- DELETE a link and remove from the page -----////
    jQuery('.delete-category').click(function () {
        var id = $(this).val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "DELETE",
            url: 'categories/' + id,
            success: function (data) {
                $("#category" + id).remove();
            },
            error: function (data) {
                console.log('Error:', data);
            }

        });
    });
});
