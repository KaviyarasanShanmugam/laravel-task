<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel Task</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  </head>
  <body class="bg-secondary">
    <div class="container">
        <h1 class="text-center text-white">Laravel Task</h1>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">ADD COMMENTS</h5> <hr>
                <form action="{{ route('comment.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-lg-2">
                            <label for="user_type">User Type</label>
                        </div>
                        <div class="col-lg-10">
                            <select class="form-select" id="user_type" name="user_type" required>
                                <option value="" selected disabled>Select user type</option>
                                <option value="1">Admin</option>
                                <option value="2">Customer</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-lg-2">
                            <label for="user">User</label>
                        </div>
                        <div class="col-lg-10">
                            <select class="form-select" id="user" name="user" required>
                                <option value="" selected disabled>Select user</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-lg-2">
                            <label for="comment">Description</label>
                        </div>
                        <div class="col-lg-10">
                            <textarea class="form-control" id="description" name="description" required></textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary float-end mt-2">Submit</button>

                </form>
                <div class="mt-5">
                    <h5 class="card-title">COMMENTS</h5> <hr>
                    @foreach ($comments as $comment)
                        <div class="card mb-3">
                            <div class="row g-0">
                                <div class="col-md-1">
                                    <img src="" class=" rounded-start" alt="img" height="50%">
                                </div>
                                <div class="col-md-11">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ @$comment->admin_id ? $comment->admin->name.' - Admin' : $comment->customer->name.' - Customer' }}</h5>
                                        <p class="card-text">{{ $comment->description }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        var adminData = {!! json_encode($admin) !!};
        var customerData = {!! json_encode($customer) !!};
        $('#user_type').change(function() {
            var userType = $(this).val();

            $('#user').empty();
            $('#user').append(`<option value="" selected disabled>Select user</option>`)
            $.each(userType == 1 ? adminData : customerData, function(id, name) {
                $('#user').append($('<option>', {
                    value: id,
                    text: name
                }));
            });
        });
    </script>
  </body>
</html>
