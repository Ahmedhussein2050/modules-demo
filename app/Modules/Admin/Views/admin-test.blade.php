<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Admin CRUD</title>

</head>

<body style="margin-top: 60px" class="container">



<div class="container">

    <div class="card card-block">
        <h2 class="card-title">Laravel AJAX Examples
            <small>via jQuery .ajax()</small>
        </h2>
        <p class="card-text">Learn how to handle ajax with Laravel and jQuery.</p>
        <button id="btn-add" name="btn-add" class="btn btn-primary btn-xs">Add New Category</button>
    </div>

    <div>
        <table class="table table-inverse">
            <thead>
            <tr>
                <th>ID</th>
                <th>category</th>
                <th>Description</th>
                <th>Edit or Delete</th>
            </tr>
            </thead>
            <tbody id="categories-list" name="categories-list">
            @foreach ($categories as $category)
                <tr id="category{{$category->id}}">
                    <td>{{$category->id}}</td>
                    <td>{{$category->name}}</td>
                    <td>{{$category->desc}}</td>
                    <td>
                        <button class="btn btn-info open-modal" value="{{$category->id}}">Edit
                        </button>
                        <button class="btn btn-danger delete-category" value="{{$category->id}}">Delete
                        </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="modal fade" id="categoryEditorModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="categoryEditorModalLabel">Category Editor</h4>
                    </div>
                    <div class="modal-body">
                        <form id="modalFormData" name="modalFormData" class="form-horizontal" novalidate="">

                            <div class="form-group">
                                <label for="category" class="col-sm-2 control-label">category</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="category" name="category"
                                           placeholder="Enter Name" value="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Description</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="description" name="description"
                                           placeholder="Enter category Description" value="">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="btn-save" value="add">Save changes
                        </button>
                        <input type="hidden" id="id" name="id" value="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="{{asset('js/laraCrud.js')}}"></script>
</body>
</html>
