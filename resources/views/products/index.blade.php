<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

    <title>Document</title>
</head>
<body>
         <div class="container">
            <h1>Products</h1>
            <div class="text_end mb-4"><a href="{{ route('categories.index') }}" class="btn btn-secondary">Back to Categories</a>
            </div>
            <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Add Product</a>
            <div class="row">
            <div class="col-md-6">
                <form action="{{ route('products.index') }}" method="GET" class="form-inline">
                    <div class="form-group mr-3">
                        <input type="text" name="search" class="form-control" placeholder="Search by Product Name">

                    </div>
                    <div class="form-group mr-3">
                        <select name="category_filter" class="form-control">
                            <option value="">Select Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary mt-4">Search</button>
                </form>
            </div>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th></th>
                        <th>Product Name</th>
                        <th>Product Image</th>
                        <th>Category ID</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>{{ $product->name }}</td>
                            <td><img src="{{ asset($product->image) }}" alt="Product Image"></td>
                            <td>{{ $product->category_id }}</td>
                            <td>
                                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

</body>
</html>
