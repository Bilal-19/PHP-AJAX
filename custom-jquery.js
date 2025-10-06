$(document).ready(function () {
    function loadTable() {
        $.ajax({
            url: "ajax-load.php",
            type: "POST",
            cache: false,
            success: function (data) {
                // Here we specify where to show data
                $("#table-data").html(data);
            }
        })
    }
    loadTable();

    /*
    $("#submit-btn").on("click", function (e) {
        e.preventDefault();
        var name = $("#username").val()
        var email = $("#useremail").val()
        // Send above values to php file

        // form validation
        if (name == "" || email == "") {
            $("#err-msg").html("All fields are required").slideDown()
            $("#success-msg").slideUp()
        } else {
            $.ajax({
                url: "ajax-insert.php",
                type: "POST",
                data: { user_name: name, user_email: email },
                success: function (data) {
                    console.log("message from server: " + data)
                    // 'data' can be 0 or 1 as we specified in the file
                    if (data == 1) {
                        loadTable();
                        $("#addForm").trigger("reset") //reset form fields
                        $("#success-msg").html("New record added").slideDown()
                        $("#err-msg").slideUp()
                    } else {
                        $("#err-msg").html("Can't add new record").slideDown()
                        $("#success-msg").slideUp()
                    }

                }
            });
        }
        return false;
    })
    */

    // Delete records
    $(document).on("click", "#del-rec", function () {
        if (confirm("Do you really want to delete this record")) {
            var user_id = $(this).data("id");
            var el = this; //to use for later purpose

            $.ajax({
                url: "ajax-del.php",
                type: "POST",
                data: { userID: user_id },
                success: function (data) {
                    if (data == 1) {
                        // Select closest table row element and added fade out animation
                        $(el).closest("tr").fadeOut()
                    } else {
                        $("#err-msg").html("Can't delete record").slideDown();
                        $("#success-msg").slideUp()
                    }
                }
            });
        }
    })


    // Edit records
    $(document).on("click", "#edit-rec", function () {
        var user_id = $(this).data("edit-id");
        $.ajax({
            url: "ajax-edit.php",
            type: "POST",
            dataType: "json",
            data: { userID: user_id },
            success: function (data) {
                console.log(data);
                $("#username").val(data.name)
                $("#useremail").val(data.email)
                $("#user_id").val(data.id)
                $("#submit-btn").val("Update")
            }
        });
    })

    // Update record
    // Form: Add new record or Update existing record
    $("#submit-btn").on("click", function (e) {
        var submit_mode = $("#submit-btn").val()
        var id = $("#user_id").val()
        var name = $("#username").val()
        var email = $("#useremail").val()

        // form validation
        if (name == "" || email == "") {
            $("#err-msg").html("All fields are required").slideDown()
            $("#success-msg").slideUp()
        } else {
            if (submit_mode == "Add") {
                $.ajax({
                    url: "ajax-insert.php",
                    type: "POST",
                    data: { user_name: name, user_email: email, submit_mode: "add" },
                    success: function (data) {
                        console.log("message from server: " + data)
                        // 'data' can be 0 or 1 as we specified in the file
                        if (data == 1) {
                            loadTable();
                            $("#addForm").trigger("reset") //reset form fields
                            $("#success-msg").html("New record added").slideDown()
                            $("#err-msg").slideUp()
                        } else {
                            $("#err-msg").html("Can't add new record").slideDown()
                            $("#success-msg").slideUp()
                        }
                    }
                });
            } else {
                $.ajax({
                    url: "ajax-insert.php",
                    type: "POST",
                    data: { user_name: name, user_email: email, submit_mode: "edit", user_id: id },
                    success: function (data) {
                        console.log("message from server: " + data)
                        // 'data' can be 0 or 1 as we specified in the file
                        if (data == 1) {
                            loadTable();
                            $("#addForm").trigger("reset") //reset form fields
                            $("#success-msg").html("Record updated").slideDown()
                            $("#err-msg").slideUp()
                        } else {
                            $("#err-msg").html("Can't update record").slideDown()
                            $("#success-msg").slideUp()
                        }
                    }
                });
            }
        }
        return false;
    })

    // Live Search
    $("#search").on("keyup", function () {
        var search = $(this).val()

        $.ajax({
            url: "ajax-live-search.php",
            type: "POST",
            data: { search: search },

            success: function (data) {
                $("#table-data").html(data);
            }
        })
    })

    // Fetch data based on page number
    function loadTable(page) {
        $.ajax({
            url: "ajax-pagination.php",
            type: "POST",
            data: { page_no: page },

            success: function (data) {
                $("#table-data").html(data);
            }
        })
    }
    loadTable();

    $(document).on("click", ".pagination .page-item .page-link", function (e) {
        e.preventDefault() // Remove the default behaviour of anchor tag
        var page_id = $(this).attr("id")
        loadTable(page_id)
    })

})

