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
        <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            +Add
        </button>
        <table class="table table-danger">
            <tr>
                <th>Code</th>
                <th>Name</th>
                <th>Type</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
            <?php
            getProduct(); ?>
        </table>
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
                    <div class="row">
                        <div class="col-12">
                            <label for=""><b>Product Name</b></label>
                            <input type="text" name="pro_name" class="mt-2 form-control" placeholder="Product Name">
                        </div>
                        <div class="col-12 mt-3">
                            <label for=""><b>Product Type</b></label><br>
                            <select name="pro_type" id="" class="mt-2 col-12">
                                <option value="SelectType" disabled selected>Select Type</option>
                                <option value="Drinks">Drinks</option>
                                <option value="Food">Food</option>
                            </select>
                        </div>
                        <div class="col-12 mt-3">
                            <label for=""><b>Product Quantity</b></label>
                            <input type="text" name="pro_qty" class="form-control mt-2" placeholder="Product Quantity">
                        </div>
                        <div class="col-12 mt-3">
                            <label for=""><b>Product Price</b></label>
                            <input type="text" name="pro_price" class="form-control" placeholder="Product Price">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="btn-save">Save </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

</html>