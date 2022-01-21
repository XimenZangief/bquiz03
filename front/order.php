<style>
    #order {
        width: 50%;
        margin: auto;
    }

    .row {
        display: flex;
        width: 100%;
    }

    .row .first {
        width: 15%;
        text-align: right;
    }

    .row .sec {
        width: 85%;
        text-align: left;
    }

    .sec select {
        width: 100%;
    }

    #booking{
        width: 540px;
        height: 370px;
        margin: auto;
        background: url('icon/03D04.png');
        background-position: top;
    }
</style>

<h3 class='ct'>線上訂票</h3>
<div id="order">
    <div class="row">
        <div class="first">電影:</div>
        <div class="sec">
            <select name="movie" id="movie">

            </select>
        </div>
    </div>
    <div class="row">
        <div class="first">日期:</div>
        <div class="sec">
            <select name="date" id="date">

            </select>
        </div>
    </div>
    <div class="row">
        <div class="first">場次:</div>
        <div class="sec">
            <select name="session" id="session">

            </select>
        </div>
    </div>
    <div class="row">
        <div class="ct" style="width:100%">
            <button onclick="booking()">確定</button>
            <button onclick="reset()">重置</button>
        </div>
    </div>
</div>

<div id="booking" style="display:none"></div>
<script>
    
    // 從網址取得id的值
    let id=(new URL(location)).searchParams.get('id');
    getMovies(id);

    // #movie有內容有變動，執行getDays
    $("#movie").on("change",()=>{getDays()});

    function booking(){
        $("#order, #booking").toggle();

        let order={ id:$("#movie").val(),
                    date:$("#date").val(),
                    session:$("#session").val()
        }
        $.get("api/booking.php",order,(booking)=>{
            $("#booking").html(booking);
        })
    }

    function reset(){
        getMovies(id);
    }

    // 回上一步，關閉#order, #booking並清空booking內容
    function prev(){
        $("#order, #booking").toggle();
        $("#booking").html("");
    }

    // 取得電影清單
    function getMovies(id){
        $.get("api/get_movies.php",{id},(movies)=>{
        $("#movie").html(movies);
        getDays();
        })
    }
    
    // 取得日期
    function getDays(){
        let id=$("#movie").val();
        $.get("api/get_days.php",{id},(days)=>{
        $("#date").html(days);
        getSessions();
    })
    }

    // 取得場次資料
    function getSessions(){
        let id=$("#movie").val();
    let date=$("#date").val();
    $.get("api/get_sessions.php",{id,date},(sessions)=>{
        $("#session").html(sessions)
    })
    }
</script>