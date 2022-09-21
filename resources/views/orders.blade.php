@extends('layouts.app')
@section('content')
<h2>Admin Orders Page</h2>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">order_id</th>
      <th scope="col">user_id</th>
      <th scope="col">product_id</th>
      <th scope="col">status</th>
      <th scope="col">sales_date</th>
      <th scope="col">sales_info</th>
    </tr>
  </thead>
  <tbody>
    @foreach($orders as $order)
    <tr>
      <td>{{$order->id}}</td>
      <td>{{$order->user_id}}</td>
      <td>{{$order->product_id}}</td>
      <td>{{$order->status}}</td>
      <td>{{$order->sales_date}}</td>
      <td>{{$order->sales_info}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection