<x-app>
   <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5 mt-5">
            <div class="card shadow-sm p-4">
                <h2 class="text-center ">Log In</h2>
                <form action="{{ route('login_post') }}" method="post">
                  @csrf

                  @if(session('error'))
                  <div class="alert    alert-danger">
                     <p class="text-danger   ">{{ session('error') }}</p>
                  </div>
                  @endif

                  <div class="mt-3 mb-3">
                     <label for="email"class="fw-bold">Email</label>
                     <input type="email" class="form-control" placeholder="user@gmail.com" name="email" id="email">
                     @error('email')
                        <div class="text-danger">{{ $message }}</div>
                     @enderror
                  </div>
                  <div class="mt-3 mb-3">
                     <label for="password"class="fw-bold">Password</label>
                     <input type="password" class="form-control" placeholder="password" name="password" id="password">
                     @error('password')
                        <div class="text-danger">{{ $message }}</div>
                     @enderror
                  </div>
                  <div class="mb-3 mt-3 text-center">
                   <button type="submit" class="btn btn-primary text-center">Log In</button>
                  </div>
                </form>
            </div>  
        </div>
    </div>
   </div>
</x-app>