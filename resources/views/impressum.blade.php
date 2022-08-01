@extends('layouts.app')

@section('content')
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
           </script>
           <script>
              function getMessage() {
                 $.ajax({
                    type:'POST',
                    url:'/getmsg',
                    data:'_token = <?php echo csrf_token() ?>',
                    success:function(data) {
                       $("#msg").html(data.msg);
                    }
                 });
              }
           </script>


<script>
   document.getElementById("button").addEventListener("click", function() {
      var xhr = new XMLHttpRequest();
      xhr.open("POST", "/getmsg");
      xhr.setRequestHeader("Content-Type", "application/json");
      xhr.send(JSON.stringify({
         _token: '<?php echo csrf_token() ?>'
      }));
      xhr.onreadystatechange = function() {
         if (xhr.readyState == 4 && xhr.status == 200) {
            var data = JSON.parse(xhr.responseText);
            document.getElementById("msg").innerHTML = data.msg;
         }
                  }     );
</script>


<div class="container">
<div class="container">
     
     <div id="msg"></div>
            <button onclick="getMessage()">Ich stimme zu</button>
         
     <div class="container">
         <div class="row justify-content-center">
             <div class="col-md-8">
                         <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
                            Impressum
                            Ansprechperson: Ich bin ein Text
                               <br>
                             Kontakt: Hallo
                             <br>
     
                   </div>


<!--- write an event listener for the button -->
     
           <div id = 'msg'>Haben Sie das Impressum gelesen? 
              Bitte bestätigen Sie, dass Sie das Impressum gelesen haben.</div>
           <?php echo csrf_field(); ?>
             <button onclick="getMessage()">Ich stimme zu</button>
             </div>
         </div>   
     
        </div>
    </div>
</div>
@endsection
