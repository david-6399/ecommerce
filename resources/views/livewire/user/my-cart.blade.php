<div>
    <div class="cart-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-12">
					<div class="cart-table-wrap">
						<table class="cart-table">
							<thead class="cart-table-head">
								<tr class="table-head-row">
									<th class="product-remove">X</th>
									<th class="product-image">Product Image</th>
									<th class="product-name">Name</th>
									<th class="product-price">Price</th>
									<th class="product-quantity">Quantity</th>
									<th class="product-total">Total</th>
								</tr>
							</thead>
							<tbody>
								
								@foreach($products as $product)
									
								<tr class="table-body-row">
									<td class="product-remove" wire:click='removeProductFromCart({{$product->id}})'><i class="far fa-window-close"></i></td>
									<td class="product-image"><img src="{{asset($product->imagePath)}}" alt=""></td>
									<td class="product-name">{{$product->name}}</td>
									<td class="product-price">{{$product->unitPrice}} DA</td>
									<td class="product-quantity"><input type="number" min="1" wire:model='quantity.{{$product->id}}'
                                        wire:change='updateChange({{$product->id }}, $event.target.value)'></td>
									<td class="product-total">{{$quantity[$product->id]  * $product->unitPrice}}</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>

				<div class="col-lg-4">
					<div class="total-section">
						<table class="total-table">
							<thead class="total-table-head">
								<tr class="table-total-row">
									<th>Total</th>
									<th>Price</th>
								</tr>
							</thead>
							<tbody>
								<tr class="total-data">
									<td><strong>Subtotal: </strong></td>
									<td>{{$totalAmount}} DA</td>
								</tr>
								<tr class="total-data">
									<td><strong>Shipping: </strong></td>
									<td>500 DA</td>
								</tr>
								<tr class="total-data">
									<td><strong>Total: </strong></td>
									<td>{{$totalAmount + 500}} DA</td>
								</tr>
							</tbody>
						</table>
						<div class="cart-buttons">
							<a wire:click='saveQuantity()' class="boxed-btn">Update Cart</a>
							<a class="boxed-btn black" wire:click='checkOut()'>Check Out</a>
						</div>
					</div>

					<div class="coupon-section">
						<h3>Apply Coupon</h3>
						<div class="coupon-form-wrap">
							<form action="index.html">
								<p><input type="text" placeholder="Coupon"></p>
								<p><input type="submit" value="Apply"></p>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
