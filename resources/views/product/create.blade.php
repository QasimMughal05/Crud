@extends('layout')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-6 mx-auto">
				<h1>Create Product</h1>
					<form method="post" action="/product/store" enctype="multipart/form-data">
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
						<div class="form-group">
							<label for="exampleInputEmail1">Product Name</label>
							<input type="text" class="form-control" id="productName" aria-describedby="productName" name="product_name" value="{{old('product_name')}}">
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Product Price</label>
							<input type="text" class="form-control" id="productPrice" aria-describedby="productName" name="product_price" value="{{old('product_price')}}">
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Product Image</label>
						  <div class="custom-file">
							    <input type="file" class="custom-file-input" id="productImage" name="product_image">
							    <label class="custom-file-label" for="inputGroupFile04">Choose file</label>
							</div>
						</div>
						<br>
					  	<button type="submit" class="btn btn-primary">Submit</button>
					  	<th><a href="{{ url()->previous() }}" class="btn btn-primary">Back</a></th>
					</form>
			</div>
		</div>
	</div>
@endsection