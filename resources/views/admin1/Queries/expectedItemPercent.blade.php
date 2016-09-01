@extends('admin1.mainteParent')

@section('content')
<div class="ui grid">
  @include('admin1.Queries.sideNav')

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