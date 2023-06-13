<HTML>
    <HEAD>
        <TITLE>
            과별 의사, 간호사, 진료 수
        </TITLE>

        <style>
            tr, td {padding:5;}
            </style>
    </HEAD>

    <BODY>
        <div style="margin-top:40; margin-left:30;">
        <h2 style="margin-left:40"><의사, 간호사, 진료 수></h2>
        <?php
        $conn = mysqli_connect("localhost","web","web_admin","hospital");
        if(mysqli_connect_errno()) {
            echo "Could not connect: " . mysqli_connect_error();
            exit();
        }
        
        $query1 = "SELECT 담당진료, COUNT(*) AS 의사수 FROM 의사 GROUP BY 담당진료";
        $query2 = "SELECT COUNT(*) AS 간호사수 FROM 간호사 GROUP BY 담당진료";
        $query3 = "SELECT COUNT(*) AS 진료수 FROM 진료, 의사 WHERE 진료.의사ID = 의사.의사ID GROUP BY 담당진료";
        $result1 = mysqli_query($conn, $query1);
        $result2 = mysqli_query($conn, $query2);
        $result3 = mysqli_query($conn, $query3);
        ?>

        <TABLE BORDER=1, style="margin-left:30">
            <TR>
                <TD bgcolor="#0E7447", style="text-align:center"><font color=white>진료 과</font></TD>
                <TD bgcolor="#0E7447", style="text-align:center"><font color=white>의사 수</font></TD>
                <TD bgcolor="#0E7447", style="text-align:center"><font color=white>간호사 수</font></TD>
                <TD bgcolor="#0E7447", style="text-align:center"><font color=white>진료 수</font></TD>
            </TR>

        <?php
        $row2=mysqli_fetch_array($result2);
        $row3=mysqli_fetch_array($result3);
        while($row1=mysqli_fetch_array($result1))
        {
        ?>
            <TR>
                <TD><?=$row1['담당진료']?></TD>
                <TD><?=$row1['의사수']?></TD>
                <TD><?=$row2['간호사수']?></TD>
                <TD><?=$row3['진료수']?></TD>
            </TR>
        <?php  }   ?>

    </TABLE>
    </FORM>
    <?php
    mysqli_free_result($result1);
    mysqli_free_result($result2);
    mysqli_free_result($result3);
    mysqli_close($conn);
    ?>
    </BODY>
</HTML>