@extends('layouts.master')

@section('content')
<div style="height: 120px;"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-2 d-none"></div>
        	<div class="col-md-7 mx-auto">
            <div class="card bg-main">
                <div class="card-heading text-center pt-4 mb-4"><h5 class="text-white">Ticket Booking </h5></div>
                <h6 class="text-center text-white">You are booking a ticket to watch {{$screening->movie->title}} at {{$screening->location}} on {{$screening->date}}</h6>
                <div class="card-body text-center">
                    <!--form-->
                    <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="no_tickets">No. of tickets</label>
                          <input type="number" name="no_tickets" placeholder="No. of tickets" v-model="no_tickets">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="type">Payment Type</label>
                          <select class="form-control" name="type" id="type" v-model="type">
                              <option value="Card">Card</option>
                              <option value="Paypal">Paypal</option>
                          </select>
                        </div>
                        <div class="form-group col-md-3">
                              <label for="amount">Amount: E12</label>
                        </div>
                    </div>
                    <form method="post" @submit.prevent="validateBookCardSubmit" id="booking-card-form" action="/complete/booking/{{$screening->slug}}" files="true" enctype="multipart/form-data" v-if="type == 'Card'">
                         {{ csrf_field() }}       
                          @if(checkPermission(['Student']))
                            <input type="text" name="persontype" value="Student" hidden>
                         @else
                            <input type="text" name="persontype" value="Staff" hidden>
                         @endif
                         <input type="text" name="paytype" value="Card" hidden>
                      <div class="form-row">
                        <div class="form-group col-md-6" :class="{'has-error': errors.has('card') }">
                          <label for="inputCity">Card No.</label>
                          <input type="text" v-model="card" v-validate.initial="card" name="card" data-vv-rules="required|credit_card" class="form-control" id="inputCity" placeholder="Enter Card No">
                          <p class="text-danger" v-if="errors.has('card')">@{{ errors.first('card') }}</p>
                        </div>
                        <div class="form-group col-md-4" :class="{'has-error': errors.has('ccv') }">
                          <label for="inputState">Ccv</label>
                          <input type="text" v-model="ccv" v-validate.initial="ccv" name="ccv" data-vv-rules="required|digits:3" class="form-control" id="inputCity" placeholder="Enter Ccv">
                          <p class="text-danger" v-if="errors.has('ccv')">@{{ errors.first('ccv') }}</p>
                        </div>
                        <div class="form-group col-md-22 invisible">
                          <input type="email" class="form-control" placeholder="Enter Email">
                        </div>
                        <div class="form-group col-md-2 d-none">
                          <label for="inputZip">Zip</label>
                          <input type="text" class="form-control" id="inputZip">
                        </div>
                      </div>
                       <div class="form-row">
                        <div class="form-group col-md-2">
                          <label for="no_tickets">Total (E):</label>
                        </div>
                        <div class="form-group col-md-6">
                          <input type="number" placeholder="No. of tickets" v-model="total_tickets" disabled>
                        </div>
                    </div>
                      <button type="submit" class="btn btn-success text-white mx-auto">Complete Booking</button>
                    </form>

                      <form method="post" @submit.prevent="validateBookPaypalSubmit" id="booking-paypal-form" action="/complete/booking/{{$screening->slug}}" files="true" enctype="multipart/form-data" v-if="type == 'Paypal'">
                         {{ csrf_field() }}       
                         @if(checkPermission(['Student']))
                            <input type="text" name="persontype" value="Student" hidden>
                         @else
                            <input type="text" name="persontype" value="Staff" hidden>
                         @endif
                         <input type="text" name="paytype" value="Paypal" hidden>
                      <div class="form-row">
                        <div class="form-group col-md-12" >
                          <label for="inputCity">Paypal Address</label>
                          <input type="email" name="email" class="form-control" placeholder="Enter Email">
                        </div>
                      </div>
                      <div class="form-row" :class="{'has-error': errors.has('password') }">
                        <div class="form-group col-md-12" >
                          <label for="inputCity">Password</label>
                          <input type="password" name="password" v-model="password" v-validate.initial="password" data-vv-rules="required|alpha_num|min:8" class="form-control" placeholder="Type Password">
                           <p class="text-danger" v-if="errors.has('password')">@{{ errors.first('password') }}</p>
                        </div>
                      </div>
                       <div class="form-row">
                          <div class="form-group col-md-2">
                            <label for="no_tickets">Total (E):</label>
                          </div>
                          <div class="form-group col-md-6">
                            <input type="number" placeholder="No. of tickets" v-model="total_tickets" disabled>
                          </div>
                      </div>
                      <button type="submit" class="btn btn-success text-white mx-auto">Complete Booking</button>
                    </form>
                    <!--form-->
                    <a href="/complete/booking/{{$screening->slug}}" class="btn btn-success text-white d-none">Complete Booking</a>
                </div>
            </div>
            
        </div>
		</div>	
	</div>
@endsection