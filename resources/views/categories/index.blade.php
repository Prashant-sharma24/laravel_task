<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Document</title>
</head>
<body>
    <div class="container">
        <h1>Categories</h1>
        <div class="col-md-6 offset-md-3 text-end">
            <a href="{{ route('products.index') }}" class="btn btn-warning">Goto to Products page</a>
        </div>
        <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">Add Category</a>

        <table class="table">
            <thead>
                <tr>
                    <th></th>
                    <th>Category Name</th>
                    <th>Category Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td><input type="checkbox"></td>
                        <td>{{ $category->name }}</td>
                        <td><img src="{{ asset($category->image) }}" alt="Category Image"></td>
                        <td>
                            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this category?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>
</html>
