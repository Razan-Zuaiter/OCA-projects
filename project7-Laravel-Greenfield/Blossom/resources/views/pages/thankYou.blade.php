@extends('layouts.shopTemp')

@section('shop_content')



<div class="jumbotron text-center">
    <h4 class="display-4" style=" font-family: Great Vibes, cursive !important;">Thank you for your shopping</h1>
        <p class="display-5" style=" font-family: Great Vibes, cursive !important;">Check you <a href="account">order in your profile</a></p>

        <img src="https://images.pexels.com/photos/1233442/pexels-photo-1233442.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" />

        <br>
        <br>
        <br>



</div>


<script>
    setTimeout(() => {
        window.location.href = "index";
    }, 5000);
</script>';
</body>

</html>

@endsection