<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Card crud</title>
</head>

<body>

    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal" id="openModal">
        Open modal
    </button>

    <!-- The Modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Modal Heading</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form id="submitForm" onsubmit="return false" enctype="multipart/form-data">
                        <input type="hidden" name="type" value="insert">
                        <input type="hidden" name="hiddenId" id="hiddenId">
                        <div class="form-group">
                            <label for="name" class="col-form-label">Name:</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <div class="form-group">
                            <label for="age" class="col-form-label">Age:</label>
                            <input class="form-control" id="age" name="age"></input>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-form-label">Email:</label>
                            <input class="form-control" id="email" name="email"></input>
                        </div>
                        <button type="submit" id="submitFormBtn" class="btn btn-primary" value="Submit">Submit</button>
                    </form>
                </div>

                <!-- Modal footer -->

            </div>
        </div>
    </div>



    <div class="form-outline w-20 mt-5 d-flex flex-end col-2">
        <input type="email" placeholder="Search her|" class="form-control input-sm border border-info border-2 mb-3  "
            id="search">
    </div>

    <div class="col-6">
        <table class="table table-striped  table-bordered mt-5">
            <thead>

                <tr>
                    <td>Id <a class="inc"><i class='fa fa-arrow-up'></a> <a class="dec"><i
                                class='fa fa-arrow-down dec'></a></td>
                    <td>Name <a class="inc"><i class='fa fa-arrow-up'></a> <a class="dec"><i
                                class='fa fa-arrow-down dec'></a></td>
                    <td>Age <a class="inc"><i class='fa fa-arrow-up'></a> <a class="dec"><i
                                class='fa fa-arrow-down dec'></a></td>
                    <td>Email <a class="inc"><i class='fa fa-arrow-up'></a> <a class="dec"><i
                                class='fa fa-arrow-down dec'></a></td>
                    <td>Action</td>

                </tr>
            </thead>
            <tbody id="tbody">
            </tbody>
        </table>
        <div id='pagination'></div>
    </div>

</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="index"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</html>