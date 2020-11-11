@extends('layout')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-6 mx-auto">
				<center> <h1>Products</h1> </center>
				@if($products->count())
					<table  class="table table-bordered table-dark">
						<thead>
							<tr>
								<th>Product Name</th>
								<th>Product Price</th>
								<th>Product Image</th>
								<th>Edit </th>
								<th colspan="2"><a href="{{route('product.create')}}" class="btn btn-primary btn-sm">Add</a></th>
								

							</tr>
						</thead>
						<tbody>
							@foreach($products as $product)
								<tr>
									<th>{{$product->product_name}}</th>
									<th>{{$product->product_price}}</th>
									<th>
										<img src="{{$product->product_image}}" width="100px">
									</th>
									<th><a href="{{route('product.edit',['id'=>$product->id])}}" class="btn btn-secondary btn-sm">Edit</a></th>
									<th><a href="{{route('product.delete',['id'
										=>$product->id])}}" class="btn btn-danger btn-sm">Delete</a></th>
									
								</tr>	
							@endforeach
						</tbody>
					</table>
					<th><a href="{{ url()->previous() }}" class="btn btn-primary btn-sm">Back</a></th>
					<th><a href="" class="btn btn-primary btn-sm">Shop</a></th>
				@else
					<div class="alert alert-danger">
						Product not found
						<a href="{{route('product.create')}}" class="btn btn-secondary btn-sm">Add New</a>

					</div>
				@endif
			</div>
		</div>
	</div>
@endsection

@section('script')
	<script type="text/javascript">
		
	</script>
@endsection
