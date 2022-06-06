@extends("layouts.app")
@section('content')
@include('admin.menus.adminmenus')

<div class="row">
    <div class="col-12">
        <table class="table">
            <thead>
                <tr>
                
                <th scope="col">Item Sold</th>
                <th scope="col">Quantity Sold</th>
                <th scope="col">Amount Sold</th>
                <th scope="col">Expenditure Purpose</th>
                <th scope="col">Expenditure Amount</th>
                <th scope="col">Total </th>
                
                <th scope="col"> <button class="btn btn-block btn-warning" data-bs-toggle="modal" data-bs-target="#addsales">Make Sales </button></th>
                </tr>
            </thead>

            
            <tbody>
                @foreach($sales as $sale)
                    <tr>
                        
                        <th>{{$sale->itemsold}}</th>
                        <td>{{$sale->quantitysold}}</td>
                        <td>{{$sale->amountsold}}</td>
                        <td>{{$sale->expenditure}}</td>
                        <td>{{$sale->expenditureamount}}</td>
                        <td>{{$sale->totalprice}}</td>
                
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-------ADD CAPITAL MODAL---->

<div class="modal" tabindex="-1" id="addsales">
  <div class="modal-dialog modal-lg" >
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Sell Product</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
        <form action="{{url('/addsales')}}" method="POST" enctype="multipart/form-data">

            {{csrf_field()}}
            <div class="modal-body">
                <input class="form-control mb-2 " type="text" name="itemsold" placeholder="Enter Sold Item">

                <input  type="number" name="quantitysold" class="form-control mb-2" min='0' placeholder="Input Sold Quantity">

                <input  type="number" name="salesprice" class="form-control mb-2" min='0' placeholder="Input sales Price">

                <input  type="number" name="expenditureamount" class="form-control mb-2" min='0' placeholder="Input Expenditure Amount">

                <input type="text" name="expenditure" class="form-control mb-2" min='0' placeholder="Enter Expenditure Purpose">
                    
                
            </div>
            <div class="modal-footer">
                <button class="btn btn-success modal-sm" type="submit">Sell</button>
        
            </div>

        </form>
    </div>
  </div> 
 

@endsection