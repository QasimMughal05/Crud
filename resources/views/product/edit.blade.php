@extends('layout')

@section('content')
	<center><h1>Edit Product</h1></center>
	<div class="container">
		<div class="row">
			<div class="col-6 mx-auto">
				@if($product)
					<form method="post" action="/product/update" enctype="multipart/form-data">
							@if ($errors->any())
						    <div class="alert alert-danger">
						        <ul>
						            @foreach ($errors->all() as $error)
						                <li>{{ $error }}</li>
						            @endforeach
						        </ul>
						    </div>
						@endif
						@csrf
						<input type="text" name="id" hidden="" value="{{$product->id}}">
						<div class="form-group">
							<label for="exampleInputEmail1">Product Name</label>
							<input type="text" class="form-control" id="productName" aria-describedby="productName" name="product_name" value="{{$product->product_name}}">
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Product Price</label>
							<input type="text" class="form-control" id="productPrice" aria-describedby="productName" name="product_price" value="{{$product->product_price}}">
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Product Image</label>
						  <div class="custom-file">
							    <input type="file" class="custom-file-input" id="productImage" name="product_image">
							    <label class="custom-file-label" for="inputGroupFile04">Choose file</label>
							</div>
						</div>
						<br>
					  	<button type="submit" class="btn btn-primary" name="update">Update</button>
					</form>
				@else
					<div class="alert alert-danger">
						Product Not Found
					</div>
				@endif
			</div>
		</div>
	</div>
@endsection