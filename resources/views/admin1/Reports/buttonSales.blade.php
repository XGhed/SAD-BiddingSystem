        
    <form method="post" action="/salesGraph" class="ui form">
        <div class="inline fields">
            <div class="five wide field">
                <div class="ui sub header"> FROM: </div>
                <input type="date" name="start" id="start" onchange="minEnd()" required>
            </div>
            <div class="five wide field">
                <div class="ui sub header"> TO: </div>
                <input type="date" name="end" id="end" required>
            </div>
        
            <div class="field">
                <div class="ui sub header"></div>
                 <button class="ui green button" type="submit" name="date">Go!</button>
            </div>
            <div class="field">
                <div class="ui sub header"></div>
                <button class="ui green button" type="submit" name="region">Per Region</button>
            </div>
        </div>
    </form>