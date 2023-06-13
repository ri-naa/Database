<html>

    <head>
    <title>환자 검색</title>
</head>
    <body>

    <style>
        .background{
            margin-top:30;
            margin-bottom:30;
            padding-top: 20;
            padding-bottom:20;
            background-color:#0E7447;
            font-weight :600;
        }
    </style>

<style>
        .button{
            background-color:#0E7447;
            color: white;
            border-radius: 5px;
            border-color: white;
            padding-right:20; padding-left:20; padding-top:3; padding-bottom:3;
        }
</style>

    <div style ="margin-top:20">

        <div style = "text-align:center">
        <img src="/img/이화여대3.jpg"><h1 style="text-align:center;">이화 병원</h1>
        </div>
        
    </div>

    <div>

        <div style = "text-align:center; margin-bottom:50; padding-top:15; padding-bottom:15;" class="background">
        <font size=5 color=white>Database 10조</font>
        </div>

        
        <div style="margin-bottom:50; text-align:center;">
            <button class="button" onClick="location.href='doctor.php'" style="margin-right:15; font-size:18">의료진 연락처</button>
            <button class="button" onClick="location.href='count.php'" style="margin-left:15; font-size:18">진료과 별 현황</button>
        </div>


        <form action="welcome2.php" method="post">
            <h3 style="text-align:center">환자 이름을 검색하세요</h3>
            <div style="text-align:center">
                <input type="text" name="name">
                <input type="submit" class="button"/>
            </div>


    </div>



    </body>
</html>