<h1>
    <?php
    for($i=1;$i<$num;$i++){
        
      if(substr($i,1)==1 || substr($i,1)==2 || substr($i,1)==4 || substr($i,1)==8 || $i ==1 || $i==2||$i==4||$i==8){
        echo "&nbsp;".$i;        
      } 
    }
?>
</h1>
