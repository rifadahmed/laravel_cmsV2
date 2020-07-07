<script>
    $x=document.getElementById('options')
  $y=document.getElementsByClassName("checkboxes")
  $flag=true;
  $x.addEventListener('click',function(){
  
          for($i=0;$i<$y.length;$i++){   
              $y[$i].checked=$flag;
              }
              ($flag==true? $flag=false:$flag=true)
  
      })
  </script>