<style>
    .lists *,
    .controls * {
        box-sizing: border-box;
    }

    .lists {
        width: 210px;
        height: 260px;
        margin: auto;
        overflow: hidden;
        position: relative;
    }

    .lists .po {
        width: 100%;
        text-align: center;
        display: none;
    }

    .po img,
    .icon img {
        width: 100%;
        border: 2px solid white;
        position: absolute;
    }

    .controls {
        display: flex;
        margin: auto;
        width: 100%;
        align-items: center;
        justify-content: space-evenly;
    }

    .icons {
        display: flex;
        width: 320px;
        height: 110px;
        overflow: hidden;
        font-size: 12px;
    }

    .icon {
        width: 80px;
        /* flex-grow 是膨脹，flex-shrink 是縮小 */
        flex-shrink: 0;
        padding: 5px;
        position: relative;
    }

    .left {
        border-top: 20px solid transparent;
        border-right: 25px solid black;
        border-bottom: 20px solid transparent;
        /* border-left: 20px solid; */
        cursor: pointer;
    }

    .right {
        border-top: 20px solid transparent;
        /* border-right: 20px solid; */
        border-bottom: 20px solid transparent;
        border-left: 25px solid black;
        cursor: pointer;
    }
</style>
<div class="half" style="vertical-align:top;">
    <h1>預告片介紹</h1>
    <div class="rb tab" style="width:95%;">
        <!-- 解題用不到id故刪除 -->
        <div>
            <div class="lists">
                <?php
                $pos = $Poster->all(" WHERE `sh`=1 ORDER BY `rank`");
                foreach ($pos as $key => $po) {
                    echo "<div class='po' data-ani='{$po['ani']}'>";
                    echo "<img src='img/{$po['path']}'>";
                    echo $po['name'];
                    echo "</div>";
                }
                ?>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
            <div class="controls">
                <div class="left"></div>
                <div class="icons">
                    <div class="icon"></div>
                    <div class="icon"></div>
                    <div class="icon"></div>
                    <div class="icon"></div>
                </div>
                <div class="right"></div>
            </div>
        </div>
    </div>
</div>

<script>
    $(".po").eq(0).show();
    let i = 0;
    // 獲取.po的個數
    let all = $(".po").length;
    let slides = setInterval(() => {
        // console.log($(".po").eq(i).data('ani'));
        i++;
        if (i > all - 1) {
            i = 0;
        }
        ani(i);
    }, 1000);

    function ani(n) {
        // data-ani的值
        let ani = $(".po").eq(n).data('ani');
        // 目前.po中可見的物件
        let now=$(".po:visiable");
        // .po第n個物件
        let next=$(".po").eq(n);

        switch (ani) {
            case '1':
                //淡入淡出
                now.fadeOut(1000);
                next.fadeIn(1000);
                break;
            case '2':
                // 縮放，確定縮完成再放
                now.hide(1000,function(){
                    next.show(1000);
                });
                break;
            case '3':
                // 滑入滑出，確定滑出完成再滑入
                now.slideUp(1000,function(){
                    next.slideDown(1000);
                });
                break;
        }
    }
    let p=0;
    $(".left, .right").on("click",function(){
        // 判定物件是否有class="left"
        if($(this).hasClass('left')){
            if(p-1>=0){
                p--;
            }else{
                if(p+1<=all-4){
                    p++;
                }
            }
        }
        // .icon向右滑動p*80px，用500毫秒
        $(".icon").animate({right:p*80},500);
    })

    $(".icon").on("click",function(){
        // 停止來自之前setInterval()的定時函式
        // 然後以按下的物件的index為參數執行一次ani
        clearInterval(slides);
        let idx=$(this).index();
        ani(idx);

        // 直接從切換後的物件開始輪播
        i=idx;
        slides=setInterval(() => {
           i++; 
           if(i>all-1){
               i=0;
           }
           ani(i);
        }, 1000);
    })
</script>