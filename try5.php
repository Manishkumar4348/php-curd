<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<!--
YouTube Link Dout Rhne pr (Youtube se pdai kre)

https://www.google.com/search?q=how+to+insert+multiple+dynamically+in+form+row+data+in+php&sxsrf=APwXEdf1TcHbco0TrDewzaV4AgcpPGocuQ%3A1684047478065&ei=doZgZPPIA5uTseMP3riKwAk&oq=how+to+insert+multiple+dynamically+form+row+data+in+php&gs_lcp=Cgxnd3Mtd2l6LXNlcnAQARgAMgoIIRCgARDDBBAKMgoIIRCgARDDBBAKOgoIABBHENYEELADOgQIIxAnOggIIRCgARDDBDoHCCMQsAIQJ0oECEEYAFCXCVjIiAFgvJUBaANwAXgAgAG8AogBhyKSAQYyLTE3LjGYAQCgAQHIAQjAAQE&sclient=gws-wiz-serp#fpstate=ive&vld=cid:3bee4fec,vid:HZarmNqfL7s
-->


<body class="bg-dark">
    <div class="container">
        <div class="row my-4">
            <div class="col-lg-10 mx-auto">
                <div class="card shadow">
                    <div class="card-header">
                        <h4>Add Items</h4>
                    </div>
                    <div class="card-body p-4">
                        <div id="show_alert"></div>
                        <form action="#" method="POST" id="add_form">
                            <div id="show_item">
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <input type="text" name="product_name[]" class="form-contro" placeholder="Item Name" required>
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <input type="number" name="product_price[]" class="form-contro" placeholder="Item price" required>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <input type="text" name="product_qty[]" class="form-contro" placeholder="Item Quantity" required>
                                    </div>

                                    <div class="col-md-2 mb-3 d-grid">
                                        <button class="btn btn-success add_item_btn">Add More</button>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <input type="submit" value="Add" class="btn btn-primary w-25" id="add_btn">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"> </script>
    <script>
        $(document).ready(function() {
            $(".add_item_btn").click(function(e) {
                e.preventDefault();
                $("#show_item").prepend(`
                <div class="row append_item">
                                    <div class="col-md-4 mb-3">
                                        <input type="text" name="product_name[]" class="form-contro" placeholder="Item Name" required>
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <input type="number" name="product_price[]" class="form-contro" placeholder="Item price" required>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <input type="text" name="product_qty[]" class="form-contro" placeholder="Item Quantity" required>
                                    </div>

                                    <div class="col-md-2 mb-3 d-grid">
                                        <button class="btn btn-danger remove_item_btn">Remove</button>
                                    </div>
                                </div>`);
            });

            $(document).on('click', '.remove_item_btn', function(e) {
                e.preventDefault();
                let row_item = $(this).parent().parent();
                $(row_item).remove();
            });

            //ajax requert to insert all form data
            $("#add_form").submit(function(e) {
                e.preventDefault();
                $("#add_btn").val('Adding...');
                $.ajax({
                    url: 'action.php',
                    method: 'post',
                    data: $(this).serialize(),
                    success: function(response) {
                        $("#add_btn").val('Add');
                        $("#add_form")[0].reset();
                        $(".append_item").remove();
                        $("#show_alert").html(`<div class="alert alert-success"  role="alert">${response}</div>`);
                    }
                });
            });
        });
    </script>
</body>

</html>