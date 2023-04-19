 <p>
Heure : <span id="clock"></span>
 </p>

 <script>
     function timeCount() {
         var today = new Date();

         var hour = today.getHours();
         if (hour < 10) hour = "0" + hour;

         var minute = today.getMinutes();
         if (minute < 10) minute = "0" + minute;

         var second = today.getSeconds();
         if (second < 10) second = "0" + second;

         document.getElementById("clock").innerHTML =
             hour + ":" + minute + ":" + second;

         setTimeout(() => timeCount(), 1000);
     }

     timeCount()
 </script>
