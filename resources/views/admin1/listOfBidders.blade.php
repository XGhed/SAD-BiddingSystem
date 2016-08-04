@extends('admin1.mainteParent')

@section('content')
<div class="ui grid">
  <div class="four wide column">
    <div class="ui vertical fluid tabular menu">
      <div class="ui centered header">Queries</div>
        <a class=" active item" href="/supplier">
          List of Bidders
        </a>
    </div>
  </div>

  <div class="twelve wide stretched column">
    <div class="ui segment">

      <table class="ui celled table">
        <thead>
          <tr><th>Header</th>
          <th>Header</th>
          <th>Header</th>
        </tr></thead>
        <tbody>
          <tr>
            <td>Cell</td>
            <td>Cell</td>
            <td>Cell</td>
          </tr>
        </tbody>
      </table>

    </div>
  </div>
</div>


<script>

</script>
@endsection