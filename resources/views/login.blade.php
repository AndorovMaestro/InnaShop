@extends("layout")

@section("content")
<form method="post">
    @csrf

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>

            <input type="email" name ="email" class="form-control @if($errors->has("email"))is-invalid @endif"  id="exampleInputEmail1" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>

            @if($errors->has("email"))
            <div id="validationServer03Feedback" class="invalid-feedback">
               {{$errors->first("email")}}
            </div>
            @endif
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@include ("Errors")

@endsection


