@extends('admin1.mainteParent')

@section('content')
<div class="ui grid">
  <div class="four wide column">
    <div class="ui vertical fluid tabular menu">
      <div class="ui centered header">Transaction</div>
        <a class="item" href="/orderedItem">
          Ordered Items
        </a>
        <a class="active item"href="/itemInbound">
          Item Inbound
        </a>
        <a class=" item" href="/inventory">
          Inventory
        </a>
        <a class="item" href="/biddingEvent1">
          Bidding Event
        </a>
    </div>
  </div>

  <div class="twelve wide stretched column">
    <div class="ui segment">
       <div class="ui celled relaxed list">
       <div class="ui centered header">Ordered Items</div>

         <!-- message -->
         <div class="ui icon message">
          <i class="info icon"></i>
          <div class="content">
            <div class="header">
              Info
            </div>
            <p>Check the items that arrived.</p>
          </div>
        </div>

        <div class="item">
          <div class="ui master checkbox">
            <input type="checkbox" name="fruits">
            <label>All</label>
          </div>
          <div class="list">
            <div class="item">
              <div class="ui child checkbox">
                <input type="checkbox" name="apple">
                <label>Apple</label>
              </div>
            </div>
            <div class="item">
              <div class="ui child checkbox">
                <input type="checkbox" name="orange">
                <label>Orange</label>
              </div>
            </div>
            <div class="item">
              <div class="ui child checkbox">
                <input type="checkbox" name="pear">
                <label>Pear</label>
              </div>
            </div>
          </div>
        </div>
        <div class="ui button">Confirm</div>
      </div>

    </div><!-- segment -->
  </div><!-- twelve wide column -->
</div><!-- ui grid -->


<script>
  $('.list .master.checkbox')
  .checkbox({
    // check all children
    onChecked: function() {
      var
        $childCheckbox  = $(this).closest('.checkbox').siblings('.list').find('.checkbox')
      ;
      $childCheckbox.checkbox('check');
    },
    // uncheck all children
    onUnchecked: function() {
      var
        $childCheckbox  = $(this).closest('.checkbox').siblings('.list').find('.checkbox')
      ;
      $childCheckbox.checkbox('uncheck');
    }
  })
;

$('.list .child.checkbox')
  .checkbox({
    // Fire on load to set parent value
    fireOnInit : true,
    // Change parent state on each child checkbox change
    onChange   : function() {
      var
        $listGroup      = $(this).closest('.list'),
        $parentCheckbox = $listGroup.closest('.item').children('.checkbox'),
        $checkbox       = $listGroup.find('.checkbox'),
        allChecked      = true,
        allUnchecked    = true
      ;
      // check to see if all other siblings are checked or unchecked
      $checkbox.each(function() {
        if( $(this).checkbox('is checked') ) {
          allUnchecked = false;
        }
        else {
          allChecked = false;
        }
      });
      // set parent checkbox state, but dont trigger its onChange callback
      if(allChecked) {
        $parentCheckbox.checkbox('set checked');
      }
      else if(allUnchecked) {
        $parentCheckbox.checkbox('set unchecked');
      }
      else {
        $parentCheckbox.checkbox('set indeterminate');
      }
    }
  })
;
</script>
@endsection