@extends('pages.layout')

@section('title')
    Shop
@endsection

@section('body')


    @include('success')


    <section id="product1" class="section-p1">
        <h2>Featured Products</h2>
        <p>Summer Collection New Modren Desgin</p>

        <div class="pro-container">

            @foreach ($products as $product)


            <div class="pro">

            <form action="{{url("addToCart/$product->id")}}" method="post" >
                @csrf
            <img src="storage\{{$product->image}}" alt="p1" />
                <div class="des">
                <h2>{{$product->title}}</h2>
                    <h5>{{$product->description}}</h5>
                    <div class="star ">
                        <i class="fas fa-star "></i>
                        <i class="fas fa-star "></i>
                        <i class="fas fa-star "></i>
                        <i class="fas fa-star "></i>
                        <i class="fas fa-star "></i>
                    </div>
                    <h4>{{$product->price}}</h4>
                    <input type="number" name="quantity">

                    {{-- <input type="hidden"  name="id" value="{{$product->id}}" >
                    <input type="hidden"  name="title" value="{{$product->title}}" >
                    <input type="hidden"  name="description" value="{{$product->description}}" >
                    <input type="hidden"  name="price" value="{{$product->price}}" >
                    <input type="hidden"  name="image" value="storage\{{$product->image}}" > --}}

                    <button type="submit"><a class="cart "><i class="fas fa-shopping-cart "></i></a></button>



                </div>
            </form>
            </div>



            @endforeach


        </div>
    </section>

        {{$products->links()}}

    {{-- <section id="pagenation" class="section-p1">
    <nav aria-label="Page navigation example" >
  <ul class="pagination">
    <li class="page-item">
      <a class="page-link" href="shop.php" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
        <span class="sr-only">Previous</span>
      </a>
    </li>
    <li class="page-item"><a class="page-link" href="#">1 of 2 </a></li>

    <li class="page-item">
      <a class="page-link" href="shop.php?" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
        <span class="sr-only">Next</span>
      </a>
    </li>
  </ul>
</nav>

    </section> --}}

    <section id="newsletter" class="section-p1 section-m1">
        <div class="newstext ">
            <h4>Sign Up For Newletters</h4>
            <p>Get E-mail Updates about our latest shop and <span class="text-warning ">Special Offers.</span></p>
        </div>
        <div class="form ">
            <input type="text " placeholder="Enter Your E-mail... ">
            <button class="normal ">Sign Up</button>
        </div>
    </section>

@endsection


