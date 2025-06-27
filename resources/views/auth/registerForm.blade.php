<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous">
    </script>
    <title>Prowebshop Admin Pannel</title>
</head>

<body>
    <section class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card shadow-sm">
                        <div class="card-header bg-primary text-white">
                            <h4 class="mb-0">Register</h4>
                        </div>
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form id="registerForm" action="{{ route('register-form') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group mt-3">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" id="name" value="{{ old('name') }}"
                                        placeholder="Enter Your Name" class="form-control" required>
                                </div>

                                <div class="form-group mt-3">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email" value="{{ old('email') }}"
                                        placeholder="Enter Your Email" class="form-control" required>
                                </div>

                                <div class="form-group mt-3">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" id="password"
                                        placeholder="Enter Your Password" class="form-control" required>
                                </div>

                                <div class="form-group mt-3">
                                    <label for="confirm_password">Confirm Password</label>
                                    <input type="password" name="confirm_password" id="confirm_password"
                                        placeholder="Re-enter Your Password" class="form-control" required>
                                </div>

                                <div class="form-group mt-4 text-center" style="float:inline-end">
                                    <button type="submit" class="btn btn-primary"
                                        style="margin-right:20px">Register</button>
                                    <a href="{{ route('login') }}">We have an already account</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <script>
        $(document).on('submit', '#registerForm', function(e) {
            e.preventDefault();

            $.ajax({
                type: 'POST',
                url: "{{ route('register-form') }}", // your form's route
                data: $(this).serialize(),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Add CSRF token header
                },
                success: function(response) {
                    if (response.redirect) {
                        window.location.href = response.redirect;
                    } else {
                        alert('Something went wrong!');
                    }
                },
                error: function(xhr) {
                    let errors = xhr.responseJSON.errors;
                    let messages = Object.values(errors).flat().join('\n');
                    alert(messages);
                }
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.min.js"
        integrity="sha384-RuyvpeZCxMJCqVUGFI0Do1mQrods/hhxYlcVfGPOfQtPJh0JCw12tUAZ/Mv10S7D" crossorigin="anonymous">
    </script>
</body>

</html>
