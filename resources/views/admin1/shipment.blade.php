@extends('admin1.mainteParent')

@section('content')
<div class="ui grid">
  <div class="four wide column">
    <div class="ui vertical fluid tabular menu">
      <div class="ui centered header">Maintenance</div>
        <a class="item" href="/supplier">
          Supplier
        </a>
        <a class="item" href="/category">
          Category
        </a>
        <a class="item" href="/item">
          Item
        </a>
        <!-- <a class="item" href="/accountType">
          Account Type
        </a> -->
        <a class="item" href="/discount">
          Discount
        </a>
        <a class="active item" href="/shipment1">
          Shipment
        </a>
        <a class="item" href="/warehouse">
          Warehouse
        </a>
    </div>
  </div>

  <div class="twelve wide column">
    <div class="ui top attached tabular menu" id="shit">
      <a class="active item" data-tab="first">Company Courier</a>
      <a class="item" data-tab="second">Set price</a>
    </div>

    <!-- company courier -->
    <div class="ui bottom attached active tab segment" data-tab="first">
      <form class="col s12" id="addForm" action="/updateShipment" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

      <div class="ui top attached tabular menu" id="nigguh">
        <a class="active item" data-tab="region1">Region 1 - 5</a>
        <a class="item" data-tab="region2">Region 6 - 11</a>
        <a class="item" data-tab="region3">Region 13 - 18</a>
      </div>

      <div class="ui bottom attached tab segment active" data-tab="region1">
        <div class="ui three column grid">
          <div class="row">
            <div class="column">
              <div class="ui relaxed list">
                <div class="item">
                  <div class="ui master checkbox">
                    <input type="checkbox" name="fruits">
                    <label style="font-weight: bold; font-size: 20px"><ins>Region 1</label>
                  </div>
                  <div class="list">
                  @foreach($provinces as $key => $province)
                    @if($province->region->RegionID == '1')
                    <div class="item">
                      <div class="ui child checkbox">
                        <input type="checkbox" name="add_prov[]" value="{{$province->ProvinceID}}">
                        @if(in_array($province->ProvinceID, $companyProvinces))
                          <input type="checkbox" checked="checked" name="add_prov[]" value="{{$province->ProvinceID}}">
                        @else
                          <input type="checkbox" name="add_prov[]" value="{{$province->ProvinceID}}">
                        @endif
                        <label>{{$province->ProvinceName}}</label>
                      </div>
                    </div>
                    @endif
                  @endforeach
                  </div>
                </div>
                 <div class="item">
                  <div class="ui master checkbox">
                    <input type="checkbox" name="fruits">
                    <label style="font-weight: bold; font-size: 20px"><ins>Region 2</label>
                  </div>
                  <div class="list">
                  @foreach($provinces as $key => $province)
                    @if($province->region->RegionID == '2')
                    <div class="item">
                      <div class="ui child checkbox">
                        @if(in_array($province->ProvinceID, $companyProvinces))
                          <input type="checkbox" checked="checked" name="add_prov[]" value="{{$province->ProvinceID}}">
                        @else
                          <input type="checkbox" name="add_prov[]" value="{{$province->ProvinceID}}">
                        @endif
                        <label>{{$province->ProvinceName}}</label>
                      </div>
                    </div>
                    @endif
                  @endforeach
                  </div>
                </div>
              </div>
            </div>
            <div class="column">
              <div class="ui relaxed list">
                <div class="item">
                  <div class="ui master checkbox">
                    <input type="checkbox" name="fruits">
                    <label style="font-weight: bold; font-size: 20px"><ins>Region 3</label>
                  </div>
                  <div class="list">
                  @foreach($provinces as $key => $province)
                    @if($province->region->RegionID == '3')
                    <div class="item">
                      <div class="ui child checkbox">
                        @if(in_array($province->ProvinceID, $companyProvinces))
                          <input type="checkbox" checked="checked" name="add_prov[]" value="{{$province->ProvinceID}}">
                        @else
                          <input type="checkbox" name="add_prov[]" value="{{$province->ProvinceID}}">
                        @endif
                        <label>{{$province->ProvinceName}}</label>
                      </div>
                    </div>
                    @endif
                  @endforeach
                  </div>
                </div>
                 <div class="item">
                  <div class="ui master checkbox">
                    <input type="checkbox" name="fruits">
                    <label style="font-weight: bold; font-size: 20px"><ins>Region 4A</label>
                  </div>
                  <div class="list">
                  @foreach($provinces as $key => $province)
                    @if($province->region->RegionID == '4')
                    <div class="item">
                      <div class="ui child checkbox">
                        @if(in_array($province->ProvinceID, $companyProvinces))
                          <input type="checkbox" checked="checked" name="add_prov[]" value="{{$province->ProvinceID}}">
                        @else
                          <input type="checkbox" name="add_prov[]" value="{{$province->ProvinceID}}">
                        @endif
                        <label>{{$province->ProvinceName}}</label>
                      </div>
                    </div>
                    @endif
                  @endforeach
                  </div>
                </div>
              </div>
            </div>
            <div class="column">
              <div class="ui relaxed list">
                <div class="item">
                  <div class="ui master checkbox">
                    <input type="checkbox" name="fruits">
                    <label style="font-weight: bold; font-size: 20px"><ins>Region 4B</label>
                  </div>
                  <div class="list">
                  @foreach($provinces as $key => $province)
                    @if($province->region->RegionID == '17')
                    <div class="item">
                      <div class="ui child checkbox">
                        @if(in_array($province->ProvinceID, $companyProvinces))
                          <input type="checkbox" checked="checked" name="add_prov[]" value="{{$province->ProvinceID}}">
                        @else
                          <input type="checkbox" name="add_prov[]" value="{{$province->ProvinceID}}">
                        @endif
                        <label>{{$province->ProvinceName}}</label>
                      </div>
                    </div>
                    @endif
                  @endforeach
                  </div>
                </div>
                 <div class="item">
                  <div class="ui master checkbox">
                    <input type="checkbox" name="fruits">
                    <label style="font-weight: bold; font-size: 20px"><ins>Region 5</label>
                  </div>
                  <div class="list">
                  @foreach($provinces as $key => $province)
                    @if($province->region->RegionID == '5')
                    <div class="item">
                      <div class="ui child checkbox">
                        @if(in_array($province->ProvinceID, $companyProvinces))
                          <input type="checkbox" checked="checked" name="add_prov[]" value="{{$province->ProvinceID}}">
                        @else
                          <input type="checkbox" name="add_prov[]" value="{{$province->ProvinceID}}">
                        @endif
                        <label>{{$province->ProvinceName}}</label>
                      </div>
                    </div>
                    @endif
                  @endforeach
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="ui bottom attached tab segment" data-tab="region2">
        <div class="ui three column grid">
          <div class="row">
            <div class="column">
              <div class="ui relaxed list">
                <div class="item">
                  <div class="ui master checkbox">
                    <input type="checkbox" name="fruits">
                    <label style="font-weight: bold; font-size: 20px"><ins>Region 6</label>
                  </div>
                  <div class="list">
                  @foreach($provinces as $key => $province)
                    @if($province->region->RegionID == '6')
                    <div class="item">
                      <div class="ui child checkbox">
                        @if(in_array($province->ProvinceID, $companyProvinces))
                          <input type="checkbox" checked="checked" name="add_prov[]" value="{{$province->ProvinceID}}">
                        @else
                          <input type="checkbox" name="add_prov[]" value="{{$province->ProvinceID}}">
                        @endif
                        <label>{{$province->ProvinceName}}</label>
                      </div>
                    </div>
                    @endif
                  @endforeach
                  </div>
                </div>
                 <div class="item">
                  <div class="ui master checkbox">
                    <input type="checkbox" name="fruits">
                    <label style="font-weight: bold; font-size: 20px"><ins>Region 7</label>
                  </div>
                  <div class="list">
                  @foreach($provinces as $key => $province)
                    @if($province->region->RegionID == '7')
                    <div class="item">
                      <div class="ui child checkbox">
                        @if(in_array($province->ProvinceID, $companyProvinces))
                          <input type="checkbox" checked="checked" name="add_prov[]" value="{{$province->ProvinceID}}">
                        @else
                          <input type="checkbox" name="add_prov[]" value="{{$province->ProvinceID}}">
                        @endif
                        <label>{{$province->ProvinceName}}</label>
                      </div>
                    </div>
                    @endif
                  @endforeach
                  </div>
                </div>
              </div>
            </div>
            <div class="column">
              <div class="ui relaxed list">
                <div class="item">
                  <div class="ui master checkbox">
                    <input type="checkbox" name="fruits">
                    <label style="font-weight: bold; font-size: 20px"><ins>Region 8</label>
                  </div>
                  <div class="list">
                  @foreach($provinces as $key => $province)
                    @if($province->region->RegionID == '8')
                    <div class="item">
                      <div class="ui child checkbox">
                        @if(in_array($province->ProvinceID, $companyProvinces))
                          <input type="checkbox" checked="checked" name="add_prov[]" value="{{$province->ProvinceID}}">
                        @else
                          <input type="checkbox" name="add_prov[]" value="{{$province->ProvinceID}}">
                        @endif
                        <label>{{$province->ProvinceName}}</label>
                      </div>
                    </div>
                    @endif
                  @endforeach
                  </div>
                </div>
                 <div class="item">
                  <div class="ui master checkbox">
                    <input type="checkbox" name="fruits">
                    <label style="font-weight: bold; font-size: 20px"><ins>Region 9</label>
                  </div>
                  <div class="list">
                  @foreach($provinces as $key => $province)
                    @if($province->region->RegionID == '9')
                    <div class="item">
                      <div class="ui child checkbox">
                        @if(in_array($province->ProvinceID, $companyProvinces))
                          <input type="checkbox" checked="checked" name="add_prov[]" value="{{$province->ProvinceID}}">
                        @else
                          <input type="checkbox" name="add_prov[]" value="{{$province->ProvinceID}}">
                        @endif
                        <label>{{$province->ProvinceName}}</label>
                      </div>
                    </div>
                    @endif
                  @endforeach
                  </div>
                </div>
              </div>
            </div>
            <div class="column">
              <div class="ui relaxed list">
                <div class="item">
                  <div class="ui master checkbox">
                    <input type="checkbox" name="fruits">
                    <label style="font-weight: bold; font-size: 20px"><ins>Region 10</label>
                  </div>
                  <div class="list">
                  @foreach($provinces as $key => $province)
                    @if($province->region->RegionID == '10')
                    <div class="item">
                      <div class="ui child checkbox">
                        @if(in_array($province->ProvinceID, $companyProvinces))
                          <input type="checkbox" checked="checked" name="add_prov[]" value="{{$province->ProvinceID}}">
                        @else
                          <input type="checkbox" name="add_prov[]" value="{{$province->ProvinceID}}">
                        @endif
                        <label>{{$province->ProvinceName}}</label>
                      </div>
                    </div>
                    @endif
                  @endforeach
                  </div>
                </div>
                 <div class="item">
                  <div class="ui master checkbox">
                    <input type="checkbox" name="fruits">
                    <label style="font-weight: bold; font-size: 20px"><ins>Region 11</label>
                  </div>
                  <div class="list">
                  @foreach($provinces as $key => $province)
                    @if($province->region->RegionID == '11')
                    <div class="item">
                      <div class="ui child checkbox">
                        @if(in_array($province->ProvinceID, $companyProvinces))
                          <input type="checkbox" checked="checked" name="add_prov[]" value="{{$province->ProvinceID}}">
                        @else
                          <input type="checkbox" name="add_prov[]" value="{{$province->ProvinceID}}">
                        @endif
                        <label>{{$province->ProvinceName}}</label>
                      </div>
                    </div>
                    @endif
                  @endforeach
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="ui bottom attached tab segment" data-tab="region3">
        <div class="ui three column grid">
          <div class="row">
            <div class="column">
              <div class="ui relaxed list">
                <div class="item">
                  <div class="ui master checkbox">
                    <input type="checkbox" name="fruits">
                    <label style="font-weight: bold; font-size: 20px"><ins>Region 12</label>
                  </div>
                  <div class="list">
                  @foreach($provinces as $key => $province)
                    @if($province->region->RegionID == '12')
                    <div class="item">
                      <div class="ui child checkbox">
                        @if(in_array($province->ProvinceID, $companyProvinces))
                          <input type="checkbox" checked="checked" name="add_prov[]" value="{{$province->ProvinceID}}">
                        @else
                          <input type="checkbox" name="add_prov[]" value="{{$province->ProvinceID}}">
                        @endif
                        <label>{{$province->ProvinceName}}</label>
                      </div>
                    </div>
                    @endif
                  @endforeach
                  </div>
                </div>
                 <div class="item">
                  <div class="ui master checkbox">
                    <input type="checkbox" name="fruits">
                    <label style="font-weight: bold; font-size: 20px"><ins>Region 13</label>
                  </div>
                  <div class="list">
                  @foreach($provinces as $key => $province)
                    @if($province->region->RegionID == '16')
                    <div class="item">
                      <div class="ui child checkbox">
                        @if(in_array($province->ProvinceID, $companyProvinces))
                          <input type="checkbox" checked="checked" name="add_prov[]" value="{{$province->ProvinceID}}">
                        @else
                          <input type="checkbox" name="add_prov[]" value="{{$province->ProvinceID}}">
                        @endif
                        <label>{{$province->ProvinceName}}</label>
                      </div>
                    </div>
                    @endif
                  @endforeach
                  </div>
                </div>
              </div>
            </div>
            <div class="column">
              <div class="ui relaxed list">
                <div class="item">
                  <div class="ui master checkbox">
                    <input type="checkbox" name="fruits">
                    <label style="font-weight: bold; font-size: 20px"><ins>NCR</label>
                  </div>
                  <div class="list">
                  @foreach($provinces as $key => $province)
                    @if($province->region->RegionID == '13')
                    <div class="item">
                      <div class="ui child checkbox">
                        @if(in_array($province->ProvinceID, $companyProvinces))
                          <input type="checkbox" checked="checked" name="add_prov[]" value="{{$province->ProvinceID}}">
                        @else
                          <input type="checkbox" name="add_prov[]" value="{{$province->ProvinceID}}">
                        @endif
                        <label>{{$province->ProvinceName}}</label>
                      </div>
                    </div>
                    @endif
                  @endforeach
                  </div>
                </div>
                 <div class="item">
                  <div class="ui master checkbox">
                    <input type="checkbox" name="fruits">
                    <label style="font-weight: bold; font-size: 20px"><ins>CAR</label>
                  </div>
                  <div class="list">
                  @foreach($provinces as $key => $province)
                    @if($province->region->RegionID == '14')
                    <div class="item">
                      <div class="ui child checkbox">
                        @if(in_array($province->ProvinceID, $companyProvinces))
                          <input type="checkbox" checked="checked" name="add_prov[]" value="{{$province->ProvinceID}}">
                        @else
                          <input type="checkbox" name="add_prov[]" value="{{$province->ProvinceID}}">
                        @endif
                        <label>{{$province->ProvinceName}}</label>
                      </div>
                    </div>
                    @endif
                  @endforeach
                  </div>
                </div>
              </div>
            </div>
            <div class="column">
              <div class="ui relaxed list">
                 <div class="item">
                  <div class="ui master checkbox">
                    <input type="checkbox" name="fruits">
                    <label style="font-weight: bold; font-size: 20px"><ins>ARMM</label>
                  </div>
                  <div class="list">
                  @foreach($provinces as $key => $province)
                    @if($province->region->RegionID == '15')
                    <div class="item">
                      <div class="ui child checkbox">
                        @if(in_array($province->ProvinceID, $companyProvinces))
                          <input type="checkbox" checked="checked" name="add_prov[]" value="{{$province->ProvinceID}}">
                        @else
                          <input type="checkbox" name="add_prov[]" value="{{$province->ProvinceID}}">
                        @endif
                        <label>{{$province->ProvinceName}}</label>
                      </div>
                    </div>
                    @endif
                  @endforeach
                  </div>
                </div>

                <div class="item">
                  <div class="ui master checkbox">
                    <input type="checkbox" name="fruits">
                    <label style="font-weight: bold; font-size: 20px"><ins>Region 18</label>
                  </div>
                  <div class="list">
                  @foreach($provinces as $key => $province)
                    @if($province->region->RegionID == '18')
                    <div class="item">
                      <div class="ui child checkbox">
                        @if(in_array($province->ProvinceID, $companyProvinces))
                          <input type="checkbox" checked="checked" name="add_prov[]" value="{{$province->ProvinceID}}">
                        @else
                          <input type="checkbox" name="add_prov[]" value="{{$province->ProvinceID}}">
                        @endif
                        <label>{{$province->ProvinceName}}</label>
                      </div>
                    </div>
                    @endif
                  @endforeach
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="ui center aligned basic segment">
        <button class="ui basic green button center" type="submit" name="add">
          <i class="checkmark icon"></i>
          Confirm
        </button>
      </div>
      </form>
    </div><!-- tab1 -->

    <!-- price -->
    <div class="ui bottom attached tab segment" data-tab="second">
      <form class="ui form" id="editForm" action="/updateShipmentFee" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

      <div class="ui top attached tabular menu" id="setprice">
        <a class="active item" data-tab="nigguh1">Region 1-5</a>
        <a class="item" data-tab="nigguh2">Second</a>
        <a class="item" data-tab="nigguh3">Third</a>
      </div>


      <div class="ui bottom attached active tab segment" data-tab="nigguh1">

        <div class="ui equal width grid">

          <div class="column">
            <h3>REGION 1</h3>
            <table class="ui collapsing basic table">
              <thead>
                <tr>
                  <th></th>
                  <th>Province</th>
                  <th>Price</th>
                  <th>Company Deliver</th>
                </tr>
              </thead>
              <tbody>
                @foreach($provinces as $key => $province)
                  @if($province->region->RegionID == '1')
                <tr>
                  <td>
                     @if(in_array($province->ProvinceID, $companyProvinces))
                      <input type="checkbox" name="add_prov[]" class="1 companyDeliver" id="{{$province->ProvinceID}}a" value="{{$province->ProvinceID}}" />
                      @else
                      <input type="checkbox" name="add_prov[]" class="1" id="{{$province->ProvinceID}}a" value="{{$province->ProvinceID}}" />
                    @endif
                  </td>
                  <td>
                      <label for="{{$province->ProvinceID}}a" class="black-text">{{$province->ProvinceName}}</label>
                  </td>
                  <td>
                    {{$province->shipment->ShipmentFee}}
                  </td>
                  <td>
                    @if(in_array($province->ProvinceID, $companyProvinces))
                      <i class="large green checkmark icon"></i>
                    @else
                      <i class="large red remove icon"></i>
                    @endif
                  </td>
                </tr>
                  @endif
                @endforeach
              </tbody>
            </table>
            <div class="ui divider"></div>
            <h3>REGION 2</h3>
            <table class="ui collapsing basic table">
              <thead>
                <tr>
                  <th></th>
                  <th>Province</th>
                  <th>Price</th>
                  <th>Company Deliver</th>
                </tr>
              </thead>
              <tbody>
                @foreach($provinces as $key => $province)
                  @if($province->region->RegionID == '2')
                <tr>
                  <td>
                     @if(in_array($province->ProvinceID, $companyProvinces))
                      <input type="checkbox" name="add_prov[]" class="1 companyDeliver" id="{{$province->ProvinceID}}a" value="{{$province->ProvinceID}}" />
                      @else
                      <input type="checkbox" name="add_prov[]" class="1" id="{{$province->ProvinceID}}a" value="{{$province->ProvinceID}}" />
                    @endif
                  </td>
                  <td>
                      <label for="{{$province->ProvinceID}}a" class="black-text">{{$province->ProvinceName}}</label>
                  </td>
                  <td>
                    {{$province->shipment->ShipmentFee}}
                  </td>
                  <td>
                    @if(in_array($province->ProvinceID, $companyProvinces))
                      <i class="large green checkmark icon"></i>
                    @else
                      <i class="large red remove icon"></i>
                    @endif
                  </td>
                </tr>
                  @endif
                @endforeach
              </tbody>
            </table>
            <h3>REGION 3</h3>
            <table class="ui collapsing basic table">
              <thead>
                <tr>
                  <th></th>
                  <th>Province</th>
                  <th>Price</th>
                  <th>Company Deliver</th>
                </tr>
              </thead>
              <tbody>
                @foreach($provinces as $key => $province)
                  @if($province->region->RegionID == '3')
                <tr>
                  <td>
                     @if(in_array($province->ProvinceID, $companyProvinces))
                      <input type="checkbox" name="add_prov[]" class="1 companyDeliver" id="{{$province->ProvinceID}}a" value="{{$province->ProvinceID}}" />
                      @else
                      <input type="checkbox" name="add_prov[]" class="1" id="{{$province->ProvinceID}}a" value="{{$province->ProvinceID}}" />
                    @endif
                  </td>
                  <td>
                      <label for="{{$province->ProvinceID}}a" class="black-text">{{$province->ProvinceName}}</label>
                  </td>
                  <td>
                    {{$province->shipment->ShipmentFee}}
                  </td>
                  <td>
                    @if(in_array($province->ProvinceID, $companyProvinces))
                      <i class="large green checkmark icon"></i>
                    @else
                      <i class="large red remove icon"></i>
                    @endif
                  </td>
                </tr>
                  @endif
                @endforeach
              </tbody>
            </table>
          </div>

          <div class="column">
            <h3>REGION 4A</h3>
            <table class="ui collapsing basic table">
              <thead>
                <tr>
                  <th></th>
                  <th>Province</th>
                  <th>Price</th>
                  <th>Company Deliver</th>
                </tr>
              </thead>
              <tbody>
                @foreach($provinces as $key => $province)
                  @if($province->region->RegionID == '4')
                <tr>
                  <td>
                     @if(in_array($province->ProvinceID, $companyProvinces))
                      <input type="checkbox" name="add_prov[]" class="1 companyDeliver" id="{{$province->ProvinceID}}a" value="{{$province->ProvinceID}}" />
                      @else
                      <input type="checkbox" name="add_prov[]" class="1" id="{{$province->ProvinceID}}a" value="{{$province->ProvinceID}}" />
                    @endif
                  </td>
                  <td>
                      <label for="{{$province->ProvinceID}}a" class="black-text">{{$province->ProvinceName}}</label>
                  </td>
                  <td>
                    {{$province->shipment->ShipmentFee}}
                  </td>
                  <td>
                    @if(in_array($province->ProvinceID, $companyProvinces))
                      <i class="large green checkmark icon"></i>
                    @else
                      <i class="large red remove icon"></i>
                    @endif
                  </td>
                </tr>
                  @endif
                @endforeach
              </tbody>
            </table>
            <div class="ui divider"></div>
            <h3>REGION 4B</h3>
            <table class="ui collapsing basic table">
              <thead>
                <tr>
                  <th></th>
                  <th>Province</th>
                  <th>Price</th>
                  <th>Company Deliver</th>
                </tr>
              </thead>
              <tbody>
                @foreach($provinces as $key => $province)
                  @if($province->region->RegionID == '17')
                <tr>
                  <td>
                     @if(in_array($province->ProvinceID, $companyProvinces))
                      <input type="checkbox" name="add_prov[]" class="1 companyDeliver" id="{{$province->ProvinceID}}a" value="{{$province->ProvinceID}}" />
                      @else
                      <input type="checkbox" name="add_prov[]" class="1" id="{{$province->ProvinceID}}a" value="{{$province->ProvinceID}}" />
                    @endif
                  </td>
                  <td>
                      <label for="{{$province->ProvinceID}}a" class="black-text">{{$province->ProvinceName}}</label>
                  </td>
                  <td>
                    {{$province->shipment->ShipmentFee}}
                  </td>
                  <td>
                    @if(in_array($province->ProvinceID, $companyProvinces))
                      <i class="large green checkmark icon"></i>
                    @else
                      <i class="large red remove icon"></i>
                    @endif
                  </td>
                </tr>
                  @endif
                @endforeach
              </tbody>
            </table>
            <div class="ui divider"></div>
            <h3>REGION 5</h3>
            <table class="ui collapsing basic table">
              <thead>
                <tr>
                  <th></th>
                  <th>Province</th>
                  <th>Price</th>
                  <th>Company Deliver</th>
                </tr>
              </thead>
              <tbody>
                @foreach($provinces as $key => $province)
                  @if($province->region->RegionID == '5')
                <tr>
                  <td>
                     @if(in_array($province->ProvinceID, $companyProvinces))
                      <input type="checkbox" name="add_prov[]" class="1 companyDeliver" id="{{$province->ProvinceID}}a" value="{{$province->ProvinceID}}" />
                      @else
                      <input type="checkbox" name="add_prov[]" class="1" id="{{$province->ProvinceID}}a" value="{{$province->ProvinceID}}" />
                    @endif
                  </td>
                  <td>
                      <label for="{{$province->ProvinceID}}a" class="black-text">{{$province->ProvinceName}}</label>
                  </td>
                  <td>
                    {{$province->shipment->ShipmentFee}}
                  </td>
                  <td>
                    @if(in_array($province->ProvinceID, $companyProvinces))
                      <i class="large green checkmark icon"></i>
                    @else
                      <i class="large red remove icon"></i>
                    @endif
                  </td>
                </tr>
                  @endif
                @endforeach
              </tbody>
            </table>
          </div>

        </div><!-- two column grid -->


        
      </div>


      <div class="ui bottom attached tab segment" data-tab="nigguh2">
        Second
      </div>


      <div class="ui bottom attached tab segment" data-tab="nigguh3">
        Third
      </div>
            
      <div class="ui center aligned basic segment">
        <input id="price" type="number" min="0" name="add_price" class="validate">
        <label for="price">Price</label>

        <button class="ui basic green button center" type="submit" name="add">
          <i class="checkmark icon"></i>
          Confirm
        </button>
      </div>
       </form> 
       <!-- //////////////////////////////////// /////////////////////////////////////-->
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
  $('#shit .item').tab();
  $('#nigguh .item').tab();
  $('#setprice .item').tab();


  ///////////////////
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