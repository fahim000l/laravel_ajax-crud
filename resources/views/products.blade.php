<!DOCTYPE html>
<html data-theme="light" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <script src="https://kit.fontawesome.com/6f0249e16e.js" crossorigin="anonymous"></script>
        <!-- Styles -->
        @vite('resources/css/app.css')

    </head>
    <body>
        <p class='text-3xl font-bold text-center my-10'>Laravel Ajex Practice</p>
        <div class='w-[50%] mx-auto'>
            <div class="overflow-x-auto">
                <label for="addProductModal" class="btn btn-success">Add new Product</label>
                <table class="table table-zebra">
                    <!-- head -->
                    <thead>
                        <tr>
                            <th></th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- row 1 -->
                        @foreach ( $products as $key=>$product)
                        <tr>
                            <th>{{$key+1}}</th>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->price }}</td>
                            <td>
                                <label
                                    id="updateProductBtn"
                                    for="updateProductModal"
                                    class="btn btn-error btn-sm"
                                    data-id="{{ $product->id }}"
                                    data-name="{{ $product->name }}"
                                    data-price="{{ $product->price }}"
                                >
                                    <i class="fa-solid fa-pen-to-square text-xl"></i>
                                </label>
                                <button id="deleteBtn" data-name="{{ $product->name }}" data-id="{{ $product->id }}" class="btn btn-info btn-sm">
                                    <i class="fa-solid fa-trash text-xl"></i>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $products->links() !!}
            </div>
        </div>

        @include('add_product_modal')
        @include('update_product_modal')
        @include('products_js')
        {!! Toastr::message() !!}
    </body>
</html>
