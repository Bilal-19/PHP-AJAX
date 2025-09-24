<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP AJAX</title>
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10 mb-2 mt-2">
                <div class="d-flex justify-content-between">
                    <h2>Employees</h2>
                    <button class="btn btn-primary" id="load-btn">Load Records</button>
                </div>
            </div>
        </div>

        <!-- Add New Record -->
        <form id="addForm">
            <div class="row my-3">
                <div class="col-md-3">
                    <input type="text" class="form-control" placeholder="Enter name" id="username">
                    <input type="text" hidden id="user_id">
                </div>

                <div class="col-md-3">
                    <input type="email" class="form-control" placeholder="Enter email address" id="useremail">
                </div>

                <div class="col-md-3">
                    <input type="submit" class="btn btn-success" value="Save Record" id="submit-btn">
                </div>
            </div>
        </form>

        <div id="err-msg" class="bg-danger text-white rounded"></div>
        <div id="success-msg" class="bg-success text-white"></div>

        <div class="row">
            <div class="col-md-10">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Customer Name</th>
                            <th>Email</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="table-data"></tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Bootstrap CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>

    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <script src="/custom-jquery.js" type="text/javascript"></script>
</body>

</html>