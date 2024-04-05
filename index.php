<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Boostrap Modal CRUD</title>

    <!--Bostrap css-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>



    <!-- Modal -->
    <div class="modal fade" id="completeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="completename" class="form-label">Name</label>
                        <input type="text" class="form-control" id="completename" placeholder="Enter your name">
                    </div>
                    <div class="form-group">
                        <label for="completeemail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="completemail" placeholder="Enter your email">
                    </div>
                    <div class="form-group">
                        <label for="completemobile" class="form-label">Mobile</label>
                        <input type="text" class="form-control" id="completemobile"
                            placeholder="Enter your mobile number">
                    </div>
                    <div class="form-group">
                        <label for="completeplace" class="form-label">Place</label>
                        <input type="text" class="form-control" id="completeplace" placeholder="Enter your place">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" onclick="adduser()">Submit</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>


    <!--update model-->

    <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="updatename" class="form-label">Name</label>
                        <input type="text" class="form-control" id="updatename" placeholder="Enter your name">
                    </div>
                    <div class="form-group">
                        <label for="updatemail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="updatemail" placeholder="Enter your email">
                    </div>
                    <div class="form-group">
                        <label for="updatemobile" class="form-label">Mobile</label>
                        <input type="text" class="form-control" id="updatemobile"
                            placeholder="Enter your mobile number">
                    </div>
                    <div class="form-group">
                        <label for="updateplace" class="form-label">Place</label>
                        <input type="text" class="form-control" id="updateplace" placeholder="Enter your place">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" onclick="updateDetails()">Update</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <input type="hidden" id="hiddendata">

                </div>
            </div>
        </div>
    </div>


    <div class="container my-3">
        <h1 class="text-center">PHP CRUD Operations using Boostrap Modal </h1>
        <button class="btn btn-dark my-3" data-bs-toggle="modal" data-bs-target="#completeModal">Add New users</button>
        <div id="displayDataTable">
        </div>
    </div>

    <!--Boostrap javascript-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>

    <script>
    $(document).ready(function() {
        displayData();
    });
    // display function
    function displayData() {
        var displayData = "true";
        $.ajax({
            url: "display.php",
            type: 'post',
            data: {
                displaySend: displayData
            },
            success: function(data, status) {
                $('#displayDataTable').html(data);
            }
        });
    }

    function adduser() {
        var nameAdd = $('#completename').val();
        var emailAdd = $('#completemail').val();
        var mobileAdd = $('#completemobile').val();
        var placeAdd = $('#completeplace').val();

        $.ajax({
            url: "insert.php",
            type: 'post',
            data: {
                nameSend: nameAdd,
                emailSend: emailAdd,
                mobileSend: mobileAdd,
                placeSend: placeAdd,
            }
            success: function(data, status) {
                //function to display data;
                //console.log(status);
                displayData();
            }
        });
    }

    //Delete record
    function DeleteUser(deleteid) {
        $.ajax({
            url: "delete.php",
            type: 'post',
            data: {
                deletesend: deleteid
            },
            success: function(data, status) {
                $('#completeModal').modal('hide');
                displayData();
            }
        });
    }

    // update function
    function GetDetails(updateid) {
        $('#hiddendata').val(updateid);

        $.Post("update.php", {
            updateid: updateid
        }, function(data, status) {
            var userid = JSON.parse(data);
            $('#updatename').val(userid.name);
            $('#updateemail').val(userid.email);
            $('#updatemobile').val(userid.mobile);
            $('#updatepalce').val(userid.place);
        });

        $('#updateModal').modal("show");
    }


    // onclick update event function
    function updateDetails() {
        var updatename = $('#updatename').val();
        var updateemail = $('#updateemail').val();
        var updatemobile = $('#updatemobile').val();
        var updateplace = $('#updateplace').val();
        var hiddendate = $('#hiddendata').val();

        $.post("update.php", {
                updatename: updatename,
                updateemail: updateemail,
                updatemobile: updatemobile,
                updateplace: updateplace,
            },
            function(data, status) {
                $('#updateModel').modal('hide');
                displayData();
            });
    }
    </script>
</body>

</html>