@extends('admin1.mainteParent')

@section('content')
<div class="ui grid">
  <div class="four wide column">
    <div class="ui vertical fluid tabular menu">
      <div class="ui centered header">Maintenance</div>
        <a class="item" href="/supplier1">
          Supplier
        </a>
        <a class="item" href="/category1">
          Category
        </a>
        <a class="item" href="/item1">
          Item
        </a>
        <a class="item" href="/accountType1">
          Account Type
        </a>
        <a class="item" href="/discount1">
          Discount
        </a>
        <a class="active item" href="/shipment1">
          Shipment
        </a>
        <a class="item" href="/warehouse1">
          Warehouse
        </a>
    </div>
  </div>

  <div class="twelve wide column">
    <div class="ui top attached tabular menu">
      <a class="active item" data-tab="first">Company Courier</a>
      <a class="item" data-tab="second">Set price</a>
    </div>

    <!-- category -->
    <div class="ui bottom attached active tab segment" data-tab="first">
       provinces
    </div><!-- tab1 -->

    <!-- rewards -->
    <div class="ui bottom attached tab segment" data-tab="second">
       
    </div><!-- tab2 -->
  </div><!-- column -->
</div><!-- ui grid -->


<script>
  //cat
    //add modal
    $(document).ready(function(){
         $('#addBtn').click(function(){
            $('#addModal').modal('show');    
         });
    });

    //edit modal
    $(document).ready(function(){
         $('#editBtn').click(function(){
            $('#editModal').modal('show');    
         });
    });
  //subcat
    //add modal
    $(document).ready(function(){
         $('#addBtn1').click(function(){
            $('#addModal1').modal('show');    
         });
    });

    //edit modal
    $(document).ready(function(){
         $('#editBtn1').click(function(){
            $('#editModal1').modal('show');    
         });
    });

    //accounttype
    $('.ui.normal.dropdown')
    .dropdown();

  //message
  $('.message .close')
  .on('click', function() {
    $(this)
      .closest('.message')
      .transition('fade')
    ;
  })
;

  //tab
  $('.tabular.menu .item').tab();

</script>
@endsection