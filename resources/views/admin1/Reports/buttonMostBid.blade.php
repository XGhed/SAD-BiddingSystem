<form method="post" action="/mostBid" class="ui form">
<div class="inline fields">
            <div class="five wide field">
                <div class="ui sub header"> FROM: </div>
                <input type="date" name="start" id="start" required>
            </div>
            <div class="five wide field">
                <div class="ui sub header"> TO: </div>
                <input type="date" name="end" id="end" required>
            </div>
        <button type="submit" name="item" class="ui blue button">Per Item</button>
        <button type="submit" name="category" class="ui red button">Per Category</button>
</div>
</form>
<form method="post" action="/mostBid" class="ui form">
<button type="submit" name="list" class="ui green button">All Bids</button>
</form>