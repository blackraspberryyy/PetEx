<center>
    <h2>
        <?php
        $firstHalf = array();
        $divided = $length / 2;
        $secondHalf = array();
        $soulmate = 0;
        
        for ($i = 0; $i < $divided;$i++) {
            $firstHalf[] = $i;
        }
        for ($j = $divided; $j < $length;$j++) {
            $secondHalf[] = $j;
        }
        $count = count($firstHalf);
        for($k=0;$k<$count;$k++){
            echo $firstHalf[$k]." = ".$secondHalf[$k]."<br>";
        }
        
       
        echo "<hr style='border-width:5px; border-color:grey'>";
        echo "Length&nbsp;&nbsp;&nbsp;&nbsp;Partner&nbsp;&nbsp;&nbsp;&nbsp;Soulmate";
        echo "<hr style='border-width:5px; border-color:grey'>";
        echo $length."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$partner
                ."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$secondHalf[$partner];
        ?>
    </h2>
</center>