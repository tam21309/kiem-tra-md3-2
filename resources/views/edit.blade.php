<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sửa Chi Tiêu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>
    {{-- @include('sweetalert::alert') --}}
    <div class="container">
    <form action="{{ route('categories.update',$item->id) }}" method="post">
      @method('PUT')
        @csrf
    <div class="mb-3">
      <h2>Sửa Chi Tiêu</h2>
    </div>
      
      <div class="row">
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Tên</label>
        <input type="text" name="name" value="{{ $item->name }}" class="form-control" id="exampleFormControlInput1" placeholder="Tên">
        @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
      </div>
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Ngày</label>
        <input type="date" name="ngay" value="{{ $item->name }}" class="form-control" id="exampleFormControlInput1" placeholder="Ngày">
        @error('ngay')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Số Tiền</label>
        <input type="text" name="so_tien" value="{{ $item->so_tien }}" class="form-control" id="exampleFormControlInput1" placeholder="Số Tiền">
        @error('so_tien')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    </div>
    
    <div class="mb-3">
        <input type="submit" class="btn btn-primary" value="Sửa" >
        <a class="btn btn-danger" href="{{ route('categories.index') }}">Hủy</a>
    </div>
</form>
</div>
     
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>