@extends("layouts.app")
@section('content')
@include('admin.menus.adminmenus')

<div class="row">
    <div class="col-12">
        <table class="table">
            <thead>
                <tr>
                
                <th scope="col">Item Stocked</th>
                <th scope="col">Stock Quantity</th>
                <th scope="col">Stock Amount</th>
                <th scope="col">Stock Price</th>
                <th scope="col">Sales Price</th>
                <th scope="col">Profits</th>
                <th scope="col"> <a href="--{{url('initiate')}}--"> <button class="btn btn-block btn-success">Initiate</button> </a></th>
                <th scope="col"> <button class="btn btn-block btn-success" data-bs-toggle="modal" data-bs-target="#addstock">Add Stock </button></th>
                </tr>
            </thead>

            
            <tbody>
                @foreach($stocks as $stock)
                    <tr>
                        
                        <th>{{$stock->itemstocked}}</th>
                        <td>{{$stock->stockquantity}}</td>
                        <td>{{$stock->stockamount}}</td>
                        <td>{{$stock->stockprice}}</td>
                        <td>{{$stock->salesprice}}</td>
                        <td>{{$stock->profits}}</td>
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-------ADD CAPITAL MODAL---->

<div class="modal" tabindex="-1" id="addstock">
  <div class="modal-dialog modal-lg" >
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Stock</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
        <form action="{{url('/addstock')}}" method="GET" enctype="multipart/form-data">

            {{csrf_field()}}
            <div class="modal-body">
                <input class="form-control mb-2 " type="text" name="stockitem" placeholder="Enter Stock Item">

                <input  type="number" name="quantity" class="form-control mb-2" min='0' placeholder="Input Stock Quantity">

                <input  type="number" name="stockprice" class="form-control mb-2" min='0' placeholder="Input Stock Price">

                <input  type="number" name="salesprice" class="form-control mb-2" min='0' placeholder="Input Sales Price">
                    
                
            </div>
            <div class="modal-footer">
                <button class="btn btn-success modal-sm" type="submit">Add Stock</button>
        
            </div>

        </form>
    </div>
  </div> 
 

@endsection