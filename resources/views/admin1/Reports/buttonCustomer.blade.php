<form method="post" action="/customer" class="ui form">
<div class="inline fields">
            <div class="five wide field">
                <div class="ui sub header"> FROM: </div>
                <input type="date" name="start" id="start" onchange="minEnd()" required>
            </div>
            <div class="five wide field">
                <div class="ui sub header"> TO: </div>
                <input type="date" name="end" id="end" required>
            </div>
        <button type="submit" name="area" class="ui blue button">Per Area</button>
        <button type="submit" name="region" class="ui red button">Per Region</button>
</div>
</form>
<form method="post" action="/customer" class="ui form">
<button type="submit" name="list" class="ui green button">All Approved Customer</button>
</form>