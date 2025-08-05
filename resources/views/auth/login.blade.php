<!DOCTYPE html>
<html>
<head>
   <title>Pet Pal Log in</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
   <div class="row justify-content-center">
       <div class="col-md-5">
           <div class="card shadow">
               <div class="card-header text-center">
                   <h4>Login to Pet Pal</h4>
               </div>
               <div class="card-body">
                   @if ($errors->any())
                       <div class="alert alert-danger">
                           {{ $errors->first() }}
                       </div>
                   @endif
                   <form method="POST" action="{{ route('login') }}">
                       @csrf
                       <div class="mb-3">
                           <label>Email address</label>
                           <input type="email" name="email" class="form-control" required value="{{ old('email') }}">
                       </div>
                       <div class="mb-3">
                           <label>Password</label>
                           <input type="password" name="password" class="form-control" required>
                       </div>
                       <div class="d-grid">
                           <button class="btn btn-primary" type="submit">Login</button>
                       </div>
                   </form>
               </div>
           </div>
       </div>
   </div>
</div>
</body>
</html>