<h1>
    <?php
        $add = 0;
        for($i = 1;$i<=$num; $i++){
            if($add == 2){
                $add +=1;
            }else if($add == 4){
                $add = 0;
            }
            echo "&nbsp;".$i;
            $i += $add;
           $add = $add + 1;
        }
    ?>
</h1>
