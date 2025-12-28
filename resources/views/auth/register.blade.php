<x-app>
   <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5 mt-5">
            <div class="card shadow-sm p-4">
                <h2 class="text-center ">Register</h2>
                <form action="{{ route('register_post') }}" method="post">
                    @csrf
                    <div class="mt-3 mb-3">
                       <label for="email"class="fw-bold">Email</label>
                       <input type="email" class="form-control" placeholder="user@gmail.com" name="email" id="email" value="{{ old('email') }}">
                       @error('email')
                           <div class="text-danger">{{ $message }}</div>
                       @enderror
                    </div>
                     <div class="mt-3 mb-3">
                        <label for="username"class="fw-bold">Username</label>
                        <input type="text" class="form-control" placeholder="username" name="username" id="username" value="{{ old('username') }}">
                         @error('username')
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
                     <div class="mt-3 mb-3">
                        <label for="password_confirmation"class="fw-bold">Confirm Password</label>
                        <input type="password" class="form-control" placeholder="Confirm password" name="password_confirmation" id="password_confirmation">
                         @error('password_confirmation')
                           <div class="text-danger">{{ $message }}</div>
                       @enderror
                     </div>
                     <div class="mb-3 mt-3 text-center">
                      <button type="submit" class="btn btn-primary text-center">Register</button>
                     </div>
                </form>
            </div>  
        </div>
    </div>
   </div>
</x-app>