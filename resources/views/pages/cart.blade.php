@extends('pages.layout')

@section('title')
    Cart
@endsection

@section('body')

<section id="page-header" class="about-header">
        <h2>#Cart</h2>
        <p>Let's see what you have.</p>
    </section>


    @if (Cart::getContent()->count() > 0)


    <section id="cart" class="section-p1">
        <table width="100%">
            <thead>
                <tr>
                    <td>Image</td>
                    <td>Name</td>
                    <td>Desc</td>
                    <td>Quantity</td>
                    <td>price</td>
                    <td>Subtotal</td>
                    <td>Remove</td>
                    {{-- <td>Edit</td> --}}
                </tr>
            </thead>

@foreach (Cart::getcontent() as $item)


            <tbody>
                <tr>
                    <td><img src="storage/{{$item->attributes->image}}" alt=""></td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->attributes->desc}}</td>
                    <td>{{$item->quantity}}</td>
                    <td>{{$item->price}}</td>
                    <td>{{$item->price * $item->quantity}}</td>

                        <!-- Remove any cart item  -->
                        <form action="{{url("destroy/$item->id")}}" method="post">
                            @csrf
                    <td><button type="submit"  class="btn btn-danger">Remove</button></td>
                        </form>



                    <td></td>

                </tr>
            </tbody>

            @endforeach
            <!-- confirm order  -->

            <td>
                <br><br>
                Total = {{Cart::getSubTotal()}} <br><br>
                <button type="submit" name="" class="btn btn-success">Confirm</button>
            </td>

        </table>
    </section>
    @else

    No Items

    @endif
    <!-- <section id="cart-add" class="section-p1">
        <div id="coupon">
            <h3>Coupon</h3>
            <input type="text" placeholder="Enter coupon code">
            <button class="normal">Apply</button>
        </div>
        <div id="subTotal">
            <h3>Cart totals</h3>
            <table>
                <tr>
                    <td>Subtotal</td>
                    <td>$118.25</td>
                </tr>
                <tr>
                    <td>Shipping</td>
                    <td>$0.00</td>
                </tr>
                <tr>
                    <td>Tax</td>
                    <td>$0.00</td>
                </tr>
                <tr>
                    <td><strong>Total</strong></td>
                    <td><strong>$118.25</strong></td>
                </tr>
            </table>
            <button class="normal">proceed to checkout</button>
        </div>
    </section> -->

    @endsection

