<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php
        include('function.php');
    ?>
</head>

<body>
    <div class="container bg-dark p-3">
        <h1 class="text-light text-center table-hover">Product Crud</h1>
        <!-- Button trigger modal -->
        <div class="d-flex justify-content-between">

            <button type="submit" class="btn btn-primary" id="btn-open-add" data-bs-toggle="modal"
                data-bs-target="#exampleModal">
                +Add
            </button>
            <form action="" class="d-flex">
                <input type="text" class="form-control border-0 shadow-none " placeholder="Search...">
                <button type="submit" class="btn btn-success border-0" id="btn-open-add" data-bs-toggle="modal"
                    data-bs-target="#exampleModal">
                    Search
                </button>
            </form>



        </div>
        <table class="table table-dark p-3">
            <tr>
                <th>Code</th>
                <th>Name</th>
                <th>Type</th>
                <th class="pe-4">Quantity</th>
                <th class="pe-5">Price</th>
                <th>Action</th>
            </tr>
            <?php
            getProduct(); ?>
        </table>
        <div class="text-light">
            <ul class="d-flex ">
                <li class="nav-link py-3 rounded-3 px-4 me-3 bg-success"><a href=""
                        class="text-decoration-none text-light">1</a>
                </li>
                <li class="nav-link py-3 rounded-3 px-4 bg-success"><a href=""
                        class="text-decoration-none text-light">2</a></li>
            </ul>
        </div>
    </div>

</body>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header ">
                <h1 class="modal-title fs-5  fw-bold" id="exampleModalLabel">
                    Insert Product
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form action="" method="post">
                    <!-- use if for show index code -->
                    <input type="hidden" name="updateCode" id="updateCode_txt">

                    <div class="row">
                        <div class="col-12">
                            <label for=""><b>Product Name</b></label>
                            <input type="text" name="pro_name" id="pro_name_txt" class="mt-2 form-control"
                                placeholder="Product Name">
                        </div>
                        <div class="col-12 mt-3">
                            <label for=""><b>Product Type</b></label><br>
                            <select name="pro_type" id="pro_type_txt" class="mt-2 col-12">
                                <option value="SelectType" disabled selected>Select Type</option>
                                <option value="Drinks">Drinks</option>
                                <option value="Food">Food</option>
                            </select>
                        </div>
                        <div class="col-12 mt-3">
                            <label for=""><b>Product Quantity</b></label>
                            <input type="text" name="pro_qty" id="pro_qty_txt" class="form-control mt-2"
                                placeholder="Product Quantity">
                        </div>
                        <div class="col-12 mt-3">
                            <label for=""><b>Product Price</b></label>
                            <input type="text" id="pro_price_txt" name="pro_price" class="form-control"
                                placeholder="Product Price">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="btn-save" name="btn-save">Save </button>
                        <button type="submit" class="btn btn-warning" id="btn-update" name="btn-update">Update </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    $('#btn-open-add').click(function() {
        $('#btn-update').addClass('d-none');
        $('#btn-save').removeClass('d-none');

        $('#pro_name_txt').val('');
        //.val(take it from table database not name="pro_name" u put in html)
        $('#pro_type_txt').val('');
        $('#pro_qty_txt').val('');
        $('#pro_price_txt').val('');

        $('.modal-title').text("Insert Product");
    })
    $('body').on('click', '#btn-open-update', function() {
        //when click on ('body') where it have update it will run(parent of btn)
        $('#btn-save').addClass('d-none');
        $('#btn-update').removeClass('d-none');
        var row = $(this).parents('tr'); //(this) is the btn update
        console.log(row);
        var code = $(this).parents('tr').find('td').eq(0).text(); //eq is index
        // console.log(code);
        var name = $(this).parents('tr').find('td').eq(1).text();
        var type = $(this).parents('tr').find('td').eq(2).text();
        var qty = $(this).parents('tr').find('td').eq(3).text();
        var price = $(this).parents('tr').find('td').eq(4).text();

        $('#updateCode_txt').val(code);
        $('#pro_name_txt').val(name);
        $('#pro_type_txt').val(type);
        $('#pro_qty_txt').val(qty);
        $('#pro_price_txt').val(price);

        $('.modal-title').text("Update Product");
    })
})
</script>

</html>