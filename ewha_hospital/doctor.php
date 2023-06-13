<html>
    <body>
    <head>
        <title>의사 간호사 연락 방법</title>

        <style>
            tr, td {padding:5;}
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

        <?php
        $query1 = "SELECT 간호사.간호사ID, 간호사.성명, 간호사.연락처, 진료과목.과이름, 진료과목.과전화번호
        FROM 간호사, 진료과목
        WHERE 간호사.담당진료 = 진료과목.과이름";

        $query2 = "SELECT 의사.의사ID, 의사.성명, 의사.연락처, 진료과목.과이름, 진료과목.과전화번호
        FROM 의사, 진료과목
        WHERE 의사.담당진료 = 진료과목.과이름";

        $result1=mysqli_query($conn, $query1);
        $result2=mysqli_query($conn, $query2);

        ?>

        <div style="margin-top:10; margin-left:30; float:left;">
            <h2 style="margin-left:50;"><의사 연락처></h2>
            <table border=1, style="margin-left:30;">
                <TR>
                    <TD bgcolor="#0E7447", style="text-align:center"><font color=white>성명</font></TD>
                    <TD bgcolor="#0E7447", style="text-align:center"><font color=white>의사ID</font></TD>
                    <TD bgcolor="#0E7447", style="text-align:center"><font color=white>연락처</font></TD>
                    <TD bgcolor="#0E7447", style="text-align:center"><font color=white>과 이름</font></TD>
                    <TD bgcolor="#0E7447", style="text-align:center"><font color=white>과 전화번호</font></TD>
                </TR>
                <?php
                while($row=mysqli_fetch_array($result2))
                {
                ?>
                    <TR>
                        <TD><?=$row['성명']?></TD>
                        <TD><?=$row['의사ID']?></TD>
                        <TD><?=$row['연락처']?></TD>
                        <TD><?=$row['과이름']?></TD>
                        <TD><?=$row['과전화번호']?></TD>
                    </TR>
            
                <?php } ?>
            </table>
        </div>


        <div style="margin-top:10; margin-left:30; margin-bottom:30; float:left;">
            <h2 style="margin-left:50"><간호사 연락처></h2>
            <table border=1, style="margin-left:30;">
                <TR>
                <TD bgcolor="#0E7447", style="text-align:center"><font color=white>성명</font></TD>
                    <TD bgcolor="#0E7447", style="text-align:center"><font color=white>간호사ID</font></TD>
                    <TD bgcolor="#0E7447", style="text-align:center"><font color=white>연락처</font></TD>
                    <TD bgcolor="#0E7447", style="text-align:center"><font color=white>과 이름</font></TD>
                    <TD bgcolor="#0E7447", style="text-align:center"><font color=white>과 전화번호</font></TD>
                </TR>
                <?php
                while($row=mysqli_fetch_array($result1))
                {
                ?>
                    <TR>
                        <TD><?=$row['성명']?></TD>
                        <TD><?=$row['간호사ID']?></TD>
                        <TD><?=$row['연락처']?></TD>
                        <TD><?=$row['과이름']?></TD>
                        <TD><?=$row['과전화번호']?></TD>
                    </TR>
            
                <?php } ?>
            </table>
        </div>

        
        

        <?php
        mysqli_free_result($result1);
        mysqli_free_result($result2);
        mysqli_close($conn);
        ?>
        

    </body>

</html>