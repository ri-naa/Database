<html>
    <head>
        <title>환자 검색</title>

        <style>
            tr, td {padding:5;}

            .background {
            margin-top: 30px;
            margin-bottom: 30px;
            padding-top: 20px;
            padding-bottom: 20px;
            background-color: #0E7447;
            font-weight: 600;
            }

            .button {
            background-color: #0E7447;
            color: white;
            border-radius: 5px;
            }

            .logo-container {
            display: flex;
            align-items: center;
            justify-content: center;
            }

        </style>
    </head>

    <body>
        
        <?php
        $conn = mysqli_connect("localhost","web","web_admin","hospital");
        if(mysqli_connect_error()){
            echo "Could not connect: ".mysqli_connect_error();
            exit();
        }
        ?>


        
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
            <button class="button" onClick="location.href='count.php'" style="margin-right:15; font-size:18">진료과 별 현황</button>
        </div>


        <form action="welcome2.php" method="post">
            <h3 style="text-align:center">환자 이름을 검색하세요</h3>
            <div style="text-align:center">
                <input type="text" name="name">
                <input type="submit" class="button"/>
            </div>

    </div>



        <?php
        $name = $_POST["name"];
        $query1="SELECT  환자.이름, 환자.환자ID, 환자.담당의사, 환자.담당간호사, 환자.주민번호, 환자.성별, 환자.주소, 환자.연락처, 환자.이메일, 환자.직업, 보호자.성명, 보호자.연락처 
        FROM 환자 LEFT OUTER JOIN 보호자 ON 환자.환자ID=보호자.환자ID
        WHERE 환자.이름 = '$name'";
        $result1=mysqli_query($conn, $query1);

        $query2="SELECT 환자.이름, 진료.진료ID, 진료.의사ID, 진료.환자ID, 진료.진료내용, 진료.진료날짜
        FROM 진료, 환자
        WHERE 진료.환자ID = 환자.환자ID AND 환자.이름 = '$name'";
        $result2=mysqli_query($conn, $query2);

        $query3="SELECT 환자.이름, 차트.차트ID, 차트.의사ID, 차트.간호사ID, 차트.환자ID, 차트.진료ID, 차트.의사소견
        FROM 차트, 환자
        WHERE 환자.환자ID=차트.환자ID AND 환자.이름 = '$name'";
        $result3=mysqli_query($conn, $query3);

        ?>

        <div style="margin-top:70">

        <div>
        <h2 style="margin-left:120"><환자 정보></h2>
        <table border=1, style="margin-left:110">
            <TR>
                <TD bgcolor="#0E7447", style="text-align:center"><font color=white>이름</font></TD>
                <TD bgcolor="#0E7447", style="text-align:center"><font color=white>환자ID</font></TD>
                <TD bgcolor="#0E7447", style="text-align:center"><font color=white>담당의사</font></TD>
                <TD bgcolor="#0E7447", style="text-align:center"><font color=white>담당간호사</font></TD>
                <TD bgcolor="#0E7447", style="text-align:center"><font color=white>주민번호</font></TD>
                <TD bgcolor="#0E7447", style="text-align:center"><font color=white>성별</font></TD>
                <TD bgcolor="#0E7447", style="text-align:center"><font color=white>주소</font></TD>
                <TD bgcolor="#0E7447", style="text-align:center"><font color=white>연락처</font></TD>
                <TD bgcolor="#0E7447", style="text-align:center"><font color=white>이메일</font></TD>
                <TD bgcolor="#0E7447", style="text-align:center"><font color=white>직업</font></TD>
                <TD bgcolor="#0E7447", style="text-align:center"><font color=white>보호자 이름</font></TD>
                <TD bgcolor="#0E7447", style="text-align:center"><font color=white>보호자 연락처</font></TD>
            </TR>
            <?php
            while($row1=mysqli_fetch_array($result1))
            {
            ?>
                <TR>
                    <TD><?=$row1['이름']?></TD>
                    <TD><?=$row1['환자ID']?></TD>
                    <TD><?=$row1['담당의사']?></TD>
                    <TD><?=$row1['담당간호사']?></TD>
                    <TD><?=$row1['주민번호']?></TD>
                    <TD><?=$row1['성별']?></TD>
                    <TD><?=$row1['주소']?></TD>
                    <TD><?=$row1['연락처']?></TD>
                    <TD><?=$row1['이메일']?></TD>
                    <TD><?=$row1['직업']?></TD>
                    <TD><?=$row1['성명']?></TD>
                    <TD><?=$row1['연락처']?></TD>
                </TR>
        
            <?php } ?>
        </table>
        </div>
        
        <div style="margin-top:50">
        <h2 style="margin-left:120"><진료 정보></h2>
        <table border=1, style="margin-left:110;">
            <TR>
                <TD bgcolor="#0E7447", style="text-align:center"><font color=white>진료ID</font></TD>
                <TD bgcolor="#0E7447", style="text-align:center"><font color=white>이름</font></TD>
                <TD bgcolor="#0E7447", style="text-align:center"><font color=white>의사ID</font></TD>
                <TD bgcolor="#0E7447", style="text-align:center"><font color=white>환자ID</font></TD>
                <TD bgcolor="#0E7447", style="text-align:center"><font color=white>진료내용</font></TD>
                <TD bgcolor="#0E7447", style="text-align:center"><font color=white>진료날짜</font></TD>
            </TR>
            <?php
            while($row2=mysqli_fetch_array($result2))
            {
            ?>
                <TR>
                    <TD><?=$row2['이름']?></TD>
                    <TD><?=$row2['진료ID']?></TD>
                    <TD><?=$row2['의사ID']?></TD>
                    <TD><?=$row2['환자ID']?></TD>
                    <TD><?=$row2['진료내용']?></TD>
                    <TD><?=$row2['진료날짜']?></TD>
                </TR>
        
            <?php } ?>
        </table>
        </div>
        
        
        <div style="margin-top:50; margin-bottom:50;">
        <h2 style="margin-left:120"><차트 정보></h2>
        <table border=1, style="margin-left:110;">
            <TR>
                <TD bgcolor="#0E7447", style="text-align:center"><font color=white>이름</font></TD>
                <TD bgcolor="#0E7447", style="text-align:center"><font color=white>차트ID</font></TD>
                <TD bgcolor="#0E7447", style="text-align:center"><font color=white>의사ID</font></TD>
                <TD bgcolor="#0E7447", style="text-align:center"><font color=white>간호사ID</font></TD>
                <TD bgcolor="#0E7447", style="text-align:center"><font color=white>환자ID</font></TD>
                <TD bgcolor="#0E7447", style="text-align:center"><font color=white>진료ID</font></TD>
                <TD bgcolor="#0E7447", style="text-align:center"><font color=white>의사소견</font></TD>
            </TR>
            <?php
            while($row3=mysqli_fetch_array($result3))
            {
            ?>
                <TR>
                    <TD><?=$row3['이름']?></TD>
                    <TD><?=$row3['차트ID']?></TD>
                    <TD><?=$row3['의사ID']?></TD>
                    <TD><?=$row3['간호사ID']?></TD>
                    <TD><?=$row3['환자ID']?></TD>
                    <TD><?=$row3['진료ID']?></TD>
                    <TD><?=$row3['의사소견']?></TD>
                </TR>
        
            <?php } ?>
        </table>
        </div>        
        

        


        <?php
        mysqli_free_result($result1);
        mysqli_free_result($result2);
        mysqli_free_result($result3);
        mysqli_close($conn);
        ?>
    </div>
    </body>

</html>