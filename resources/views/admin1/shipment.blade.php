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
        <a class="item" href="/accountType">
          Account Type
        </a>
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
        <a class="item" data-tab="region4">Complete List</a>
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
                        <input type="checkbox" name="add_prov[]">
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
                        <input type="checkbox" name="add_prov[]">
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
                        <input type="checkbox" name="add_prov[]">
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
                        <input type="checkbox" name="add_prov[]">
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
                        <input type="checkbox" name="add_prov[]">
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
                        <input type="checkbox" name="add_prov[]">
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
                        <input type="checkbox" name="add_prov[]">
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
                        <input type="checkbox" name="add_prov[]">
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
                        <input type="checkbox" name="add_prov[]">
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
                        <input type="checkbox" name="add_prov[]">
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
                        <input type="checkbox" name="add_prov[]">
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
                        <input type="checkbox" name="add_prov[]">
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
                        <input type="checkbox" name="add_prov[]">
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
                        <input type="checkbox" name="add_prov[]">
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
                        <input type="checkbox" name="add_prov[]">
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
                        <input type="checkbox" name="add_prov[]">
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
                        <input type="checkbox" name="add_prov[]">
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

      <div class="ui bottom attached tab segment" data-tab="region4">
        <div class="ui five column grid">
          <div class="column">
            <div class="ui relaxed list">
              <div class="item">
                <div class="ui master checkbox">
                  <input type="checkbox" name="fruits">
                  <label>Region 1</label>
                </div>
                <div class="list">
                @foreach($provinces as $key => $province)
                  @if($province->region->RegionID == '1')
                  <div class="item">
                    <div class="ui child checkbox">
                      <input type="checkbox" name="add_prov[]">
                      <label>{{$province->ProvinceName}}</label>
                    </div>
                  </div>
                  @endif
                @endforeach
                </div>
              </div>
            </div>

            <div class="ui relaxed list">
              <div class="item">
                <div class="ui master checkbox">
                  <input type="checkbox" name="fruits">
                  <label>Region 5</label>
                </div>
                <div class="list">
                @foreach($provinces as $key => $province)
                  @if($province->region->RegionID == '5')
                  <div class="item">
                    <div class="ui child checkbox">
                      <input type="checkbox" name="add_prov[]">
                      <label>{{$province->ProvinceName}}</label>
                    </div>
                  </div>
                  @endif
                @endforeach
                </div>
              </div>
            </div>

            <div class="ui relaxed list">
              <div class="item">
                <div class="ui master checkbox">
                  <input type="checkbox" name="fruits">
                  <label>Region 10</label>
                </div>
                <div class="list">
                @foreach($provinces as $key => $province)
                  @if($province->region->RegionID == '10')
                  <div class="item">
                    <div class="ui child checkbox">
                      <input type="checkbox" name="add_prov[]">
                      <label>{{$province->ProvinceName}}</label>
                    </div>
                  </div>
                  @endif
                @endforeach
                </div>
              </div>
            </div>

            <div class="ui relaxed list">
              <div class="item">
                <div class="ui master checkbox">
                  <input type="checkbox" name="fruits">
                  <label>CAR</label>
                </div>
                <div class="list">
                @foreach($provinces as $key => $province)
                  @if($province->region->RegionID == '14')
                  <div class="item">
                    <div class="ui child checkbox">
                      <input type="checkbox" name="add_prov[]">
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
                  <label>Region 2</label>
                </div>
                <div class="list">
                @foreach($provinces as $key => $province)
                  @if($province->region->RegionID == '2')
                  <div class="item">
                    <div class="ui child checkbox">
                      <input type="checkbox" name="add_prov[]">
                      <label>{{$province->ProvinceName}}</label>
                    </div>
                  </div>
                  @endif
                @endforeach
                </div>
              </div>
            </div>

            <div class="ui relaxed list">
              <div class="item">
                <div class="ui master checkbox">
                  <input type="checkbox" name="fruits">
                  <label>Region 6</label>
                </div>
                <div class="list">
                @foreach($provinces as $key => $province)
                  @if($province->region->RegionID == '6')
                  <div class="item">
                    <div class="ui child checkbox">
                      <input type="checkbox" name="add_prov[]">
                      <label>{{$province->ProvinceName}}</label>
                    </div>
                  </div>
                  @endif
                @endforeach
                </div>
              </div>
            </div>

            <div class="ui relaxed list">
              <div class="item">
                <div class="ui master checkbox">
                  <input type="checkbox" name="fruits">
                  <label>Region 11</label>
                </div>
                <div class="list">
                @foreach($provinces as $key => $province)
                  @if($province->region->RegionID == '11')
                  <div class="item">
                    <div class="ui child checkbox">
                      <input type="checkbox" name="add_prov[]">
                      <label>{{$province->ProvinceName}}</label>
                    </div>
                  </div>
                  @endif
                @endforeach
                </div>
              </div>
            </div>

            <div class="ui relaxed list">
              <div class="item">
                <div class="ui master checkbox">
                  <input type="checkbox" name="fruits">
                  <label>ARMM</label>
                </div>
                <div class="list">
                @foreach($provinces as $key => $province)
                  @if($province->region->RegionID == '15')
                  <div class="item">
                    <div class="ui child checkbox">
                      <input type="checkbox" name="add_prov[]">
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
                  <label>Region 3</label>
                </div>
                <div class="list">
                @foreach($provinces as $key => $province)
                  @if($province->region->RegionID == '3')
                  <div class="item">
                    <div class="ui child checkbox">
                      <input type="checkbox" name="add_prov[]">
                      <label>{{$province->ProvinceName}}</label>
                    </div>
                  </div>
                  @endif
                @endforeach
                </div>
              </div>
            </div>

            <div class="ui relaxed list">
              <div class="item">
                <div class="ui master checkbox">
                  <input type="checkbox" name="fruits">
                  <label>Region 7</label>
                </div>
                <div class="list">
                @foreach($provinces as $key => $province)
                  @if($province->region->RegionID == '7')
                  <div class="item">
                    <div class="ui child checkbox">
                      <input type="checkbox" name="add_prov[]">
                      <label>{{$province->ProvinceName}}</label>
                    </div>
                  </div>
                  @endif
                @endforeach
                </div>
              </div>
            </div>

            <div class="ui relaxed list">
              <div class="item">
                <div class="ui master checkbox">
                  <input type="checkbox" name="fruits">
                  <label>Region 12</label>
                </div>
                <div class="list">
                @foreach($provinces as $key => $province)
                  @if($province->region->RegionID == '12')
                  <div class="item">
                    <div class="ui child checkbox">
                      <input type="checkbox" name="add_prov[]">
                      <label>{{$province->ProvinceName}}</label>
                    </div>
                  </div>
                  @endif
                @endforeach
                </div>
              </div>
            </div>

            <div class="ui relaxed list">
              <div class="item">
                <div class="ui master checkbox">
                  <input type="checkbox" name="fruits">
                  <label>Region 18</label>
                </div>
                <div class="list">
                @foreach($provinces as $key => $province)
                  @if($province->region->RegionID == '18')
                  <div class="item">
                    <div class="ui child checkbox">
                      <input type="checkbox" name="add_prov[]">
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
                  <label>Region 4A</label>
                </div>
                <div class="list">
                @foreach($provinces as $key => $province)
                  @if($province->region->RegionID == '4')
                  <div class="item">
                    <div class="ui child checkbox">
                      <input type="checkbox" name="add_prov[]">
                      <label>{{$province->ProvinceName}}</label>
                    </div>
                  </div>
                  @endif
                @endforeach
                </div>
              </div>
            </div>

            <div class="ui relaxed list">
              <div class="item">
                <div class="ui master checkbox">
                  <input type="checkbox" name="fruits">
                  <label>Region 8</label>
                </div>
                <div class="list">
                @foreach($provinces as $key => $province)
                  @if($province->region->RegionID == '8')
                  <div class="item">
                    <div class="ui child checkbox">
                      <input type="checkbox" name="add_prov[]">
                      <label>{{$province->ProvinceName}}</label>
                    </div>
                  </div>
                  @endif
                @endforeach
                </div>
              </div>
            </div>

            <div class="ui relaxed list">
              <div class="item">
                <div class="ui master checkbox">
                  <input type="checkbox" name="fruits">
                  <label>Region 13</label>
                </div>
                <div class="list">
                @foreach($provinces as $key => $province)
                  @if($province->region->RegionID == '16')
                  <div class="item">
                    <div class="ui child checkbox">
                      <input type="checkbox" name="add_prov[]">
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
                  <label>Region 4B</label>
                </div>
                <div class="list">
                @foreach($provinces as $key => $province)
                  @if($province->region->RegionID == '17')
                  <div class="item">
                    <div class="ui child checkbox">
                      <input type="checkbox" name="add_prov[]">
                      <label>{{$province->ProvinceName}}</label>
                    </div>
                  </div>
                  @endif
                @endforeach
                </div>
              </div>
            </div>

            <div class="ui relaxed list">
              <div class="item">
                <div class="ui master checkbox">
                  <input type="checkbox" name="fruits">
                  <label>Region 9</label>
                </div>
                <div class="list">
                @foreach($provinces as $key => $province)
                  @if($province->region->RegionID == '9')
                  <div class="item">
                    <div class="ui child checkbox">
                      <input type="checkbox" name="add_prov[]">
                      <label>{{$province->ProvinceName}}</label>
                    </div>
                  </div>
                  @endif
                @endforeach
                </div>
              </div>
            </div>

            <div class="ui relaxed list">
              <div class="item">
                <div class="ui master checkbox">
                  <input type="checkbox" name="fruits">
                  <label>NCR</label>
                </div>
                <div class="list">
                @foreach($provinces as $key => $province)
                  @if($province->region->RegionID == '13')
                  <div class="item">
                    <div class="ui child checkbox">
                      <input type="checkbox" name="add_prov[]">
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
       
       <!-- //////////////////////////////////// /////////////////////////////////////-->
       <form class="col s12" id="editForm" action="/updateShipmentFee" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div style="margin: 0 50px 0 50px;">
              <div class="row">
                <div class="col s12">Regions:
                  <ul class="tabs" onmouseover="showScroll(this)" onmouseout="hideScroll(this)" style="overflow-x:hidden">
                    <li class="tab "><a href="#1region1" class="black-text"> 1</a></li>
                    <li class="tab "><a href="#1region2" class="black-text"> 2</a></li>
                    <li class="tab "><a href="#1region3" class="black-text"> 3</a></li>
                    <li class="tab "><a href="#1region4A" class="black-text"> 4A</a></li>
                    <li class="tab "><a href="#1region4B" class="black-text"> 4B</a></li>
                    <li class="tab "><a href="#1region5" class="black-text"> 5</a></li>
                    <li class="tab "><a href="#1region6" class="black-text"> 6</a></li>
                    <li class="tab "><a href="#1region7" class="black-text"> 7</a></li>
                    <li class="tab "><a href="#1region8" class="black-text"> 8</a></li>
                    <li class="tab "><a href="#1region9" class="black-text"> 9</a></li>
                    <li class="tab "><a href="#1region10" class="black-text"> 10</a></li>
                    <li class="tab "><a href="#1region11" class="black-text"> 11</a></li>
                    <li class="tab "><a href="#1region12" class="black-text"> 12</a></li>
                    <li class="tab "><a href="#1regionNCR" class="black-text"> NCR</a></li>
                    <li class="tab "><a href="#1regionCAR" class="black-text"> CAR</a></li>
                    <li class="tab "><a href="#1regionARMM" class="black-text"> ARMM</a></li>
                    <li class="tab "><a href="#1region13" class="black-text"> 13</a></li>
                    <li class="tab "><a href="#1region18" class="black-text"> 18</a></li>
                  </ul>
                </div>

                <div id="1region1" class="col s12"><!--this-->
                  <div class="row"></div>
                  <div class="row">
                    <div class="col s3">
                      <input name="1" class="selectAll btn" type="button" id="selectAll" value="Select All" />
                    </div>
                    <div class="col s6">
                      <input name="1" class="deselectAll btn" type="button" id="deselectAll" value="Deselect All"/>
                    </div>
                  </div>
                  <table>
                    <thead>
                      <tr>
                          <th>province</th>
                          <th>Price</th>
                          <th>Company Deliver</th>
                      </tr>
                    </thead>

                    <tbody>
                      @foreach($provinces as $key => $province)
                      @if($province->region->RegionID == '1')
                      <tr>
                        <td>
                          <div class="row">
                              <div class="col s3">
                                @if(in_array($province->ProvinceID, $companyProvinces))
                                <input type="checkbox" name="add_prov[]" class="1 companyDeliver" id="{{$province->ProvinceID}}a" value="{{$province->ProvinceID}}" />
                                <label for="{{$province->ProvinceID}}a" class="black-text">{{$province->ProvinceName}}</label>
                                @else
                                <input type="checkbox" name="add_prov[]" class="1" id="{{$province->ProvinceID}}a" value="{{$province->ProvinceID}}" />
                                <label for="{{$province->ProvinceID}}a" class="black-text">{{$province->ProvinceName}}</label>
                                @endif
                              </div>
                          </div>
                        </td>
                        <td>
                          {{$province->shipment->ShipmentFee}}
                        </td>
                        <td>
                          @if(in_array($province->ProvinceID, $companyProvinces))
                            Yes
                          @else
                            No
                          @endif
                        </td>
                      </tr>
                      @endif
                      @endforeach
                    </tbody>
                  </table>
                </div><!-- Region1 -->

                <div id="1region2" class="col s12">
                  <div class="row"></div>
                  <div class="row">
                    <div class="col s3">
                      <input name="2" class="selectAll btn" type="button" id="selectAll" value="Select All" />
                    </div>
                    <div class="col s6">
                      <input name="2" class="deselectAll btn" type="button" id="deselectAll" value="Deselect All"/>
                    </div>
                  </div>
                  <table>
                    <thead>
                      <tr>
                          <th>province</th>
                          <th>Price</th>
                      </tr>
                    </thead>

                    <tbody>
                      @foreach($provinces as $key => $province)
                      @if($province->region->RegionID == '2')
                      <tr>
                        <td>
                          <div class="row">
                              <div class="col s3">
                                @if(in_array($province->ProvinceID, $companyProvinces))
                                <input type="checkbox" name="add_prov[]" class="2 companyDeliver" id="{{$province->ProvinceID}}a" value="{{$province->ProvinceID}}" />
                                <label for="{{$province->ProvinceID}}a" class="black-text">{{$province->ProvinceName}}</label>
                                @else
                                <input type="checkbox" name="add_prov[]" class="2" id="{{$province->ProvinceID}}a" value="{{$province->ProvinceID}}" />
                                <label for="{{$province->ProvinceID}}a" class="black-text">{{$province->ProvinceName}}</label>
                                @endif
                            </div>
                          </div>
                        </td>
                        <td>
                          {{$province->shipment->ShipmentFee}}
                        </td>
                        <td>
                          @if(in_array($province->ProvinceID, $companyProvinces))
                            Yes
                          @else
                            No
                          @endif
                        </td>
                      </tr>
                      @endif
                      @endforeach
                    </tbody>
                  </table>
                </div><!-- Region2 -->

                <div id="1region3" class="col s12">
                  <div class="row"></div>
                  <div class="row">
                    <div class="col s3">
                      <input name="3" class="selectAll btn" type="button" id="selectAll" value="Select All" />
                    </div>
                    <div class="col s6">
                      <input name="3" class="deselectAll btn" type="button" id="deselectAll" value="Deselect All"/>
                    </div>
                  </div>
                  <table>
                    <thead>
                      <tr>
                          <th>province</th>
                          <th>Price</th>
                      </tr>
                    </thead>

                    <tbody>
                      @foreach($provinces as $key => $province)
                      @if($province->region->RegionID == '3')
                      <tr>
                        <td>
                          <div class="row">
                              @if(in_array($province->ProvinceID, $companyProvinces))
                                <input type="checkbox" name="add_prov[]" class="3 companyDeliver" id="{{$province->ProvinceID}}a" value="{{$province->ProvinceID}}" />
                                <label for="{{$province->ProvinceID}}a" class="black-text">{{$province->ProvinceName}}</label>
                                @else
                                <input type="checkbox" name="add_prov[]" class="3" id="{{$province->ProvinceID}}a" value="{{$province->ProvinceID}}" />
                                <label for="{{$province->ProvinceID}}a" class="black-text">{{$province->ProvinceName}}</label>
                                @endif
                          </div>
                        </td>
                        <td>
                          {{$province->shipment->ShipmentFee}}
                        </td>
                        <td>
                          @if(in_array($province->ProvinceID, $companyProvinces))
                            Yes
                          @else
                            No
                          @endif
                        </td>
                      </tr>
                      @endif
                      @endforeach
                    </tbody>
                  </table>
                </div><!-- Region3 -->

                <div id="1region4A" class="col s12">
                  <div class="row"></div>
                  <div class="row">
                    <div class="col s3">
                      <input name="4A" class="selectAll btn" type="button" id="selectAll" value="Select All" />
                    </div>
                    <div class="col s6">
                      <input name="4A" class="deselectAll btn" type="button" id="deselectAll" value="Deselect All"/>
                    </div>
                  </div>
                  <table>
                    <thead>
                      <tr>
                          <th>province</th>
                          <th>Price</th>
                      </tr>
                    </thead>

                    <tbody>
                    @foreach($provinces as $key => $province)
                    @if($province->region->RegionID == '4')
                      <tr>
                        <td>
                          <div class="row">
                              <div class="col s3">
                                @if(in_array($province->ProvinceID, $companyProvinces))
                                <input type="checkbox" name="add_prov[]" class="4A companyDeliver" id="{{$province->ProvinceID}}a" value="{{$province->ProvinceID}}" />
                                <label for="{{$province->ProvinceID}}a" class="black-text">{{$province->ProvinceName}}</label>
                                @else
                                <input type="checkbox" name="add_prov[]" class="4A" id="{{$province->ProvinceID}}a" value="{{$province->ProvinceID}}" />
                                <label for="{{$province->ProvinceID}}a" class="black-text">{{$province->ProvinceName}}</label>
                                @endif
                              </div>
                          </div>
                        </td>
                        <td>
                          {{$province->shipment->ShipmentFee}}
                        </td>
                        <td>
                          @if(in_array($province->ProvinceID, $companyProvinces))
                            Yes
                          @else
                            No
                          @endif
                        </td>
                      </tr>
                      @endif
                      @endforeach
                    </tbody>
                  </table>
                </div><!-- Region4a -->

                <div id="1region4B" class="col s12">
                  <div class="row"></div>
                  <div class="row">
                    <div class="col s3">
                      <input name="4B" class="selectAll btn" type="button" id="selectAll" value="Select All" />
                    </div>
                    <div class="col s6">
                      <input name="4B" class="deselectAll btn" type="button" id="deselectAll" value="Deselect All"/>
                    </div>
                  </div>
                  <table>
                    <thead>
                      <tr>
                          <th>province</th>
                          <th>Price</th>
                      </tr>
                    </thead>

                    <tbody>
                    @foreach($provinces as $key => $province)
                    @if($province->region->RegionID == '17')
                      <tr>
                        <td>
                          <div class="row">
                              <div class="col s3">
                                @if(in_array($province->ProvinceID, $companyProvinces))
                                <input type="checkbox" name="add_prov[]" class="4B companyDeliver" id="{{$province->ProvinceID}}a" value="{{$province->ProvinceID}}" />
                                <label for="{{$province->ProvinceID}}a" class="black-text">{{$province->ProvinceName}}</label>
                                @else
                                <input type="checkbox" name="add_prov[]" class="4B" id="{{$province->ProvinceID}}a" value="{{$province->ProvinceID}}" />
                                <label for="{{$province->ProvinceID}}a" class="black-text">{{$province->ProvinceName}}</label>
                                @endif
                              </div>
                          </div>
                        </td>
                        <td>
                          {{$province->shipment->ShipmentFee}}
                        </td>
                        <td>
                          @if(in_array($province->ProvinceID, $companyProvinces))
                            Yes
                          @else
                            No
                          @endif
                        </td>
                      </tr>
                      @endif
                      @endforeach
                    </tbody>
                  </table>
                </div><!-- Region4B -->

                <div id="1region5" class="col s12">
                  <div class="row"></div>
                  <div class="row">
                    <div class="col s3">
                      <input name="5" class="selectAll btn" type="button" id="selectAll" value="Select All" />
                    </div>
                    <div class="col s6">
                      <input name="5" class="deselectAll btn" type="button" id="deselectAll" value="Deselect All"/>
                    </div>
                  </div>
                  <table>
                    <thead>
                      <tr>
                          <th>province</th>
                          <th>Price</th>
                      </tr>
                    </thead>

                    <tbody>
                    @foreach($provinces as $key => $province)
                    @if($province->region->RegionID == '5')
                      <tr>
                        <td>
                          <div class="row">
                      <div class="col s3">
                        @if(in_array($province->ProvinceID, $companyProvinces))
                                <input type="checkbox" name="add_prov[]" class="5 companyDeliver" id="{{$province->ProvinceID}}a" value="{{$province->ProvinceID}}" />
                                <label for="{{$province->ProvinceID}}a" class="black-text">{{$province->ProvinceName}}</label>
                                @else
                                <input type="checkbox" name="add_prov[]" class="5" id="{{$province->ProvinceID}}a" value="{{$province->ProvinceID}}" />
                                <label for="{{$province->ProvinceID}}a" class="black-text">{{$province->ProvinceName}}</label>
                                @endif
                      </div>
                          </div>
                        </td>
                        <td>
                          {{$province->shipment->ShipmentFee}}
                        </td>
                        <td>
                          @if(in_array($province->ProvinceID, $companyProvinces))
                            Yes
                          @else
                            No
                          @endif
                        </td>
                      </tr>
                      @endif
                      @endforeach
                    </tbody>
                  </table>
                </div><!-- Region5 -->

                <div id="1region6" class="col s12"> 
                  <div class="row"></div>
                  <div class="row">
                    <div class="col s3">
                      <input name="6" class="selectAll btn" type="button" id="selectAll" value="Select All" />
                    </div>
                    <div class="col s6">
                      <input name="6" class="deselectAll btn" type="button" id="deselectAll" value="Deselect All"/>
                    </div>
                  </div>
                  <table>
                    <thead>
                      <tr>
                          <th>province</th>
                          <th>Price</th>
                      </tr>
                    </thead>

                    <tbody>
                    @foreach($provinces as $key => $province)
                    @if($province->region->RegionID == '6')
                      <tr>
                        <td>
                          <div class="row">
                            <div class="col s3">
                              @if(in_array($province->ProvinceID, $companyProvinces))
                                <input type="checkbox" name="add_prov[]" class="6 companyDeliver" id="{{$province->ProvinceID}}a" value="{{$province->ProvinceID}}" />
                                <label for="{{$province->ProvinceID}}a" class="black-text">{{$province->ProvinceName}}</label>
                                @else
                                <input type="checkbox" name="add_prov[]" class="6" id="{{$province->ProvinceID}}a" value="{{$province->ProvinceID}}" />
                                <label for="{{$province->ProvinceID}}a" class="black-text">{{$province->ProvinceName}}</label>
                                @endif
                            </div>
                          </div>
                        </td>
                        <td>
                          {{$province->shipment->ShipmentFee}}
                        </td>
                        <td>
                          @if(in_array($province->ProvinceID, $companyProvinces))
                            Yes
                          @else
                            No
                          @endif
                        </td>
                      </tr>
                      @endif
                      @endforeach
                    </tbody>
                  </table>
                </div><!-- Region6 -->

                <div id="1region7" class="col s12"><!--this-->
                  <div class="row"></div>
                  <div class="row">
                    <div class="col s3">
                      <input name="7" class="selectAll btn" type="button" id="selectAll" value="Select All" />
                    </div>
                    <div class="col s6">
                      <input name="7" class="deselectAll btn" type="button" id="deselectAll" value="Deselect All"/>
                    </div>
                  </div>
                  <table>
                    <thead>
                      <tr>
                          <th>province</th>
                          <th>Price</th>
                      </tr>
                    </thead>

                    <tbody>
                    @foreach($provinces as $key => $province)
                    @if($province->region->RegionID == '7')
                      <tr>
                        <td>
                          <div class="row">
                            <div class="col s3">
                              @if(in_array($province->ProvinceID, $companyProvinces))
                                <input type="checkbox" name="add_prov[]" class="7 companyDeliver" id="{{$province->ProvinceID}}a" value="{{$province->ProvinceID}}" />
                                <label for="{{$province->ProvinceID}}a" class="black-text">{{$province->ProvinceName}}</label>
                                @else
                                <input type="checkbox" name="add_prov[]" class="7" id="{{$province->ProvinceID}}a" value="{{$province->ProvinceID}}" />
                                <label for="{{$province->ProvinceID}}a" class="black-text">{{$province->ProvinceName}}</label>
                                @endif
                            </div>
                          </div>
                        </td>
                        <td>
                          {{$province->shipment->ShipmentFee}}
                        </td>
                        <td>
                          @if(in_array($province->ProvinceID, $companyProvinces))
                            Yes
                          @else
                            No
                          @endif
                        </td>
                      </tr>
                      @endif
                      @endforeach
                    </tbody>
                  </table>
                </div><!-- Region7 -->

                <div id="1region8" class="col s12"><!--this-->
                  <div class="row"></div>
                  <div class="row">
                    <div class="col s3">
                      <input name="8" class="selectAll btn" type="button" id="selectAll" value="Select All" />
                    </div>
                    <div class="col s6">
                      <input name="8" class="deselectAll btn" type="button" id="deselectAll" value="Deselect All"/>
                    </div>
                  </div>
                  <table>
                    <thead>
                      <tr>
                          <th>province</th>
                          <th>Price</th>
                      </tr>
                    </thead>

                    <tbody>
                    @foreach($provinces as $key => $province)
                    @if($province->region->RegionID == '8')
                      <tr>
                        <td>
                          <div class="row">
                            <div class="col s3">
                              @if(in_array($province->ProvinceID, $companyProvinces))
                                <input type="checkbox" name="add_prov[]" class="8 companyDeliver" id="{{$province->ProvinceID}}a" value="{{$province->ProvinceID}}" />
                                <label for="{{$province->ProvinceID}}a" class="black-text">{{$province->ProvinceName}}</label>
                                @else
                                <input type="checkbox" name="add_prov[]" class="8" id="{{$province->ProvinceID}}a" value="{{$province->ProvinceID}}" />
                                <label for="{{$province->ProvinceID}}a" class="black-text">{{$province->ProvinceName}}</label>
                                @endif
                            </div>
                          </div>
                        </td>
                        <td>
                          {{$province->shipment->ShipmentFee}}
                        </td>
                        <td>
                          @if(in_array($province->ProvinceID, $companyProvinces))
                            Yes
                          @else
                            No
                          @endif
                        </td>
                      </tr>
                      @endif
                      @endforeach
                    </tbody>
                  </table>
                </div><!-- Region8 -->

                <div id="1region9" class="col s12"><!--this-->
                  <div class="row"></div>
                  <div class="row">
                    <div class="col s3">
                      <input name="9" class="selectAll btn" type="button" id="selectAll" value="Select All" />
                    </div>
                    <div class="col s6">
                      <input name="9" class="deselectAll btn" type="button" id="deselectAll" value="Deselect All"/>
                    </div>
                  </div>
                  <table>
                    <thead>
                      <tr>
                          <th>province</th>
                          <th>Price</th>
                      </tr>
                    </thead>

                    <tbody>
                    @foreach($provinces as $key => $province)
                    @if($province->region->RegionID == '9')
                      <tr>
                        <td>
                          <div class="row">
                            <div class="col s3">
                              @if(in_array($province->ProvinceID, $companyProvinces))
                                <input type="checkbox" name="add_prov[]" class="9 companyDeliver" id="{{$province->ProvinceID}}a" value="{{$province->ProvinceID}}" />
                                <label for="{{$province->ProvinceID}}a" class="black-text">{{$province->ProvinceName}}</label>
                                @else
                                <input type="checkbox" name="add_prov[]" class="9" id="{{$province->ProvinceID}}a" value="{{$province->ProvinceID}}" />
                                <label for="{{$province->ProvinceID}}a" class="black-text">{{$province->ProvinceName}}</label>
                                @endif
                            </div>
                          </div>
                        </td>
                        <td>
                          {{$province->shipment->ShipmentFee}}
                        </td>
                        <td>
                          @if(in_array($province->ProvinceID, $companyProvinces))
                            Yes
                          @else
                            No
                          @endif
                        </td>
                      </tr>
                      @endif
                      @endforeach
                    </tbody>
                  </table>
                </div><!-- Region9 -->

                <div id="1region10" class="col s12">
                  <div class="row"></div>
                    <div class="row">
                      <div class="col s3">
                        <input name="10" class="selectAll btn" type="button" id="selectAll" value="Select All"/>
                                    
                      </div>

                      <div class="col s6">
                        <input name="10" class="deselectAll btn" type="button" id="deselectAll" value="Deselect All"/>
                      </div>
                    </div>
                    <table>
                    <thead>
                      <tr>
                          <th>province</th>
                          <th>Price</th>
                      </tr>
                    </thead>

                    <tbody>
                    @foreach($provinces as $key => $province)
                    @if($province->region->RegionID == '10')
                      <tr>
                        <td>
                          <div class="row"><div class="col s3">
                            @if(in_array($province->ProvinceID, $companyProvinces))
                            <input type="checkbox" name="add_prov[]" class="10 companyDeliver" id="{{$province->ProvinceID}}a" value="{{$province->ProvinceID}}" />
                            <label for="{{$province->ProvinceID}}a" class="black-text">{{$province->ProvinceName}}</label>
                            @else
                            <input type="checkbox" name="add_prov[]" class="10" id="{{$province->ProvinceID}}a" value="{{$province->ProvinceID}}" />
                            <label for="{{$province->ProvinceID}}a" class="black-text">{{$province->ProvinceName}}</label>
                            @endif
                        </div>
                          </div>
                        </td>
                        <td>
                          {{$province->shipment->ShipmentFee}}
                        </td>
                        <td>
                          @if(in_array($province->ProvinceID, $companyProvinces))
                            Yes
                          @else
                            No
                          @endif
                        </td>
                      </tr>
                      @endif
                      @endforeach
                    </tbody>
                  </table>
                </div> <!-- Region 10 -->

                <div id="1region11" class="col s12">
                  <div class="row"></div>
                    <div class="row">
                      <div class="col s3">
                        <input name="11" class="selectAll btn" type="button" id="selectAll" value="Select All"/>           
                      </div>
                      <div class="col s6">
                        <input name="11" class="deselectAll btn" type="button" id="deselectAll" value="Deselect All"/>
                      </div>
                    </div>
                    <table>
                      <thead>
                        <tr>
                            <th>province</th>
                            <th>Price</th>
                        </tr>
                      </thead>

                      <tbody>
                      @foreach($provinces as $key => $province)
                      @if($province->region->RegionID == '11')
                        <tr>
                          <td>
                            <div class="col s3">
                              @if(in_array($province->ProvinceID, $companyProvinces))
                              <input type="checkbox" name="add_prov[]" class="11 companyDeliver" id="{{$province->ProvinceID}}a" value="{{$province->ProvinceID}}" />
                              <label for="{{$province->ProvinceID}}a" class="black-text">{{$province->ProvinceName}}</label>
                              @else
                              <input type="checkbox" name="add_prov[]" class="11" id="{{$province->ProvinceID}}a" value="{{$province->ProvinceID}}" />
                              <label for="{{$province->ProvinceID}}a" class="black-text">{{$province->ProvinceName}}</label>
                              @endif
                            </div>
                          </td>
                          <td>
                            {{$province->shipment->ShipmentFee}}
                          </td>
                          <td>
                            @if(in_array($province->ProvinceID, $companyProvinces))
                              Yes
                            @else
                              No
                            @endif
                          </td>
                        </tr>
                        @endif
                        @endforeach
                      </tbody>
                    </table>
                </div> <!-- Region 11 -->

                <div id="1region12" class="col s12">
                  <div class="row"></div>
                    <div class="row">
                      <div class="col s3">
                        <input name="12" class="selectAll btn" type="button" id="selectAll" value="Select All"/>     
                      </div>
                      <div class="col s6">
                        <input name="12" class="deselectAll btn" type="button" id="deselectAll" value="Deselect All"/>
                      </div>
                    </div>
                    <table>
                      <thead>
                        <tr>
                            <th>province</th>
                            <th>Price</th>
                        </tr>
                      </thead>

                      <tbody>
                    @foreach($provinces as $key => $province)
                      @if($province->region->RegionID == '12')
                        <tr>
                          <td>
                            <div class="col s3">
                              @if(in_array($province->ProvinceID, $companyProvinces))
                              <input type="checkbox" name="add_prov[]" class="12 companyDeliver" id="{{$province->ProvinceID}}a" value="{{$province->ProvinceID}}" />
                              <label for="{{$province->ProvinceID}}a" class="black-text">{{$province->ProvinceName}}</label>
                              @else
                              <input type="checkbox" name="add_prov[]" class="12" id="{{$province->ProvinceID}}a" value="{{$province->ProvinceID}}" />
                              <label for="{{$province->ProvinceID}}a" class="black-text">{{$province->ProvinceName}}</label>
                              @endif
                            </div>
                          </td>
                          <td>
                            {{$province->shipment->ShipmentFee}}
                          </td>
                            <td>
                            @if(in_array($province->ProvinceID, $companyProvinces))
                              Yes
                            @else
                              No
                            @endif
                          </td>
                        </tr>
                        @endif
                        @endforeach
                      </tbody>
                    </table>
                </div> <!-- Region 12 -->

                <div id="1regionNCR" class="col s12">
                  <div class="row"></div>
                    <div class="row">
                      <div class="col s3">
                        <input name="NCR" class="selectAll btn" type="button" id="selectAll" value="Select All"/>       
                      </div>
                      <div class="col s6">
                        <input name="NCR" class="deselectAll btn" type="button" id="deselectAll" value="Deselect All"/>
                      </div>
                    </div>
                    <table>
                      <thead>
                        <tr>
                            <th>province</th>
                            <th>Price</th>
                        </tr>
                      </thead>

                      <tbody>
                    @foreach($provinces as $key => $province)
                      @if($province->region->RegionID == '13')
                        <tr>
                          <td>
                            <div class="col s3">
                              @if(in_array($province->ProvinceID, $companyProvinces))
                              <input type="checkbox" name="add_prov[]" class="NCR companyDeliver" id="{{$province->ProvinceID}}a" value="{{$province->ProvinceID}}" />
                              <label for="{{$province->ProvinceID}}a" class="black-text">{{$province->ProvinceName}}</label>
                              @else
                              <input type="checkbox" name="add_prov[]" class="NCR" id="{{$province->ProvinceID}}a" value="{{$province->ProvinceID}}" />
                              <label for="{{$province->ProvinceID}}a" class="black-text">{{$province->ProvinceName}}</label>
                              @endif
                            </div>
                          </td>
                          <td>
                            {{$province->shipment->ShipmentFee}}
                          </td>
                            <td>
                            @if(in_array($province->ProvinceID, $companyProvinces))
                              Yes
                            @else
                              No
                            @endif
                          </td>
                        </tr>
                        @endif
                        @endforeach
                      </tbody>
                    </table>
                </div> <!-- Region NCR -->

                <div id="1regionCAR" class="col s12">
                  <div class="row"></div>
                    <div class="row">
                      <div class="col s3">
                        <input name="CAR" class="selectAll btn" type="button" id="selectAll" value="Select All"/>       
                      </div>
                      <div class="col s6">
                        <input name="CAR" class="deselectAll btn" type="button" id="deselectAll" value="Deselect All"/>
                      </div>
                    </div>
                    <table>
                      <thead>
                        <tr>
                            <th>province</th>
                            <th>Price</th>
                        </tr>
                      </thead>

                      <tbody>
                    @foreach($provinces as $key => $province)
                      @if($province->region->RegionID == '14')
                        <tr>
                          <td>
                            <div class="col s3">
                              @if(in_array($province->ProvinceID, $companyProvinces))
                                <input type="checkbox" name="add_prov[]" class="CAR companyDeliver" id="{{$province->ProvinceID}}a" value="{{$province->ProvinceID}}" />
                                <label for="{{$province->ProvinceID}}a" class="black-text">{{$province->ProvinceName}}</label>
                                @else
                                <input type="checkbox" name="add_prov[]" class="CAR" id="{{$province->ProvinceID}}a" value="{{$province->ProvinceID}}" />
                                <label for="{{$province->ProvinceID}}a" class="black-text">{{$province->ProvinceName}}</label>
                                @endif
                            </div>
                          </td>
                          <td>
                            {{$province->shipment->ShipmentFee}}
                          </td>
                          <td>
                            @if(in_array($province->ProvinceID, $companyProvinces))
                              Yes
                            @else
                              No
                            @endif
                          </td>
                        </tr>
                        @endif
                        @endforeach
                      </tbody>
                    </table>
                </div> <!-- Region CAR -->

                <div id="1regionARMM" class="col s12">
                  <div class="row"></div>
                    <div class="row">
                      <div class="col s3">
                        <input name="ARMM" class="selectAll btn" type="button" id="selectAll" value="Select All"/>        
                      </div>
                      <div class="col s6">
                        <input name="ARMM" class="deselectAll btn" type="button" id="deselectAll" value="Deselect All"/>
                      </div>
                    </div>
                    <table>
                      <thead>
                        <tr>
                            <th>province</th>
                            <th>Price</th>
                        </tr>
                      </thead>

                      <tbody>
                    @foreach($provinces as $key => $province)
                      @if($province->region->RegionID == '15')
                        <tr>
                          <td>
                            <div class="col s3">
                              @if(in_array($province->ProvinceID, $companyProvinces))
                                <input type="checkbox" name="add_prov[]" class="ARMM companyDeliver" id="{{$province->ProvinceID}}a" value="{{$province->ProvinceID}}" />
                                <label for="{{$province->ProvinceID}}a" class="black-text">{{$province->ProvinceName}}</label>
                                @else
                                <input type="checkbox" name="add_prov[]" class="ARMM" id="{{$province->ProvinceID}}a" value="{{$province->ProvinceID}}" />
                                <label for="{{$province->ProvinceID}}a" class="black-text">{{$province->ProvinceName}}</label>
                                @endif
                            </div>
                          </td>
                          <td>
                            {{$province->shipment->ShipmentFee}}
                          </td>
                          <td>
                            @if(in_array($province->ProvinceID, $companyProvinces))
                              Yes
                            @else
                              No
                            @endif
                          </td>
                        </tr>
                        @endif
                        @endforeach
                      </tbody>
                    </table>
                </div> <!-- Region ARMM -->

                <div id="1region13" class="col s12">
                  <div class="row"></div>
                    <div class="row">
                      <div class="col s3">
                        <input name="13" class="selectAll btn" type="button" id="selectAll" value="Select All"/>         
                      </div>
                      <div class="col s6">
                        <input name="13" class="deselectAll btn" type="button" id="deselectAll" value="Deselect All"/>
                      </div>
                    </div>
                    <table>
                      <thead>
                        <tr>
                            <th>province</th>
                            <th>Price</th>
                        </tr>
                      </thead>

                      <tbody>
                    @foreach($provinces as $key => $province)
                      @if($province->region->RegionID == '16')
                        <tr>
                          <td>
                            <div class="col s3">
                              @if(in_array($province->ProvinceID, $companyProvinces))
                                <input type="checkbox" name="add_prov[]" class="13 companyDeliver" id="{{$province->ProvinceID}}a" value="{{$province->ProvinceID}}" />
                                <label for="{{$province->ProvinceID}}a" class="black-text">{{$province->ProvinceName}}</label>
                                @else
                                <input type="checkbox" name="add_prov[]" class="13" id="{{$province->ProvinceID}}a" value="{{$province->ProvinceID}}" />
                                <label for="{{$province->ProvinceID}}a" class="black-text">{{$province->ProvinceName}}</label>
                                @endif
                            </div>
                          </td>
                          <td>
                            {{$province->shipment->ShipmentFee}}
                          </td>
                          <td>
                            @if(in_array($province->ProvinceID, $companyProvinces))
                              Yes
                            @else
                              No
                            @endif
                          </td>
                        </tr>
                        @endif
                        @endforeach
                      </tbody>
                    </table>
                </div> <!-- Region 13 -->

                <div id="1region18" class="col s12">
                  <div class="row"></div>
                    <div class="row">
                      <div class="col s3">
                        <input name="18" class="selectAll btn" type="button" id="selectAll" value="Select All"/>      
                      </div>
                      <div class="col s6">
                        <input name="18" class="deselectAll btn" type="button" id="deselectAll" value="Deselect All"/>
                      </div>
                    </div>
                    <table>
                      <thead>
                        <tr>
                            <th>province</th>
                            <th>Price</th>
                        </tr>
                      </thead>

                      <tbody>
                    @foreach($provinces as $key => $province)
                      @if($province->region->RegionID == '18')
                        <tr>
                          <td>
                            <div class="col s3">
                              @if(in_array($province->ProvinceID, $companyProvinces))
                                <input type="checkbox" name="add_prov[]" class="18 companyDeliver" id="{{$province->ProvinceID}}a" value="{{$province->ProvinceID}}" />
                                <label for="{{$province->ProvinceID}}a" class="black-text">{{$province->ProvinceName}}</label>
                                @else
                                <input type="checkbox" name="add_prov[]" class="18" id="{{$province->ProvinceID}}a" value="{{$province->ProvinceID}}" />
                                <label for="{{$province->ProvinceID}}a" class="black-text">{{$province->ProvinceName}}</label>
                                @endif
                            </div>
                          </td>
                          <td>
                            {{$province->shipment->ShipmentFee}}
                          </td>
                          <td>
                            @if(in_array($province->ProvinceID, $companyProvinces))
                              Yes
                            @else
                              No
                            @endif
                          </td>
                        </tr>
                        @endif
                        @endforeach
                      </tbody>
                    </table>
                </div> <!-- Region 18 -->
              </div><!--row-->
            </div>

              <div class="row">
                <div class="col s7 push-s4">
                  <div class="input-field col s7">
                    <input id="price" type="number" min="0" name="add_price" class="validate">
                    <label for="price">Price</label>
                  </div>
                </div>
              </div>

            <div class="row">
              <div class="center">
                  <button class="btn waves-effect waves-light blue darken-2 white-text" type="submit" name="add">
                  <i class="material-icons left">done</i>Confirm</button>
                <div class="row"></div><div class="row"></div>
              </div>
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