<!-- quick add jquery -->
<script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>
    <script>
      $(document).ready(function(){
        //windows reloads every second and goes to update.php to check if the database has been updated
      //  window.setInterval(function(){
      //    $.ajax({
      //       url: 'http://localhost/GithubPHPList/OOP/api/update.php',
      //       success: function(data){
      //         // console.log(data);
      //       }
      //    })
      //  }, 3000)

        //this area is for load more button 
        var numberPerLoad = 10;
        var lastLoad = 0;
        //clicks will show 10 at a time on click and will be removed once it hits 100. 
        $( "#btn-load-more" ).click(function() {
          var repoList = $('.box-row');
          var upToLoad = lastLoad + numberPerLoad;

          for(var i = lastLoad; i < upToLoad; i++){
            $(repoList[i]).show();
            hideButton();
          }

          lastLoad = upToLoad;
        });

        //function to hide events on page load so only 10 show at a time. 
        function hideEvents(){
          var repoList = $('.box-row');
          var totalRepos = repoList.length;

          if(totalRepos > numberPerLoad){
            lastLoad = numberPerLoad;
            for(var i = numberPerLoad; i < totalRepos; i++){
              $(repoList[i]).hide();
            }
          }          
        }

        function hideButton(){
          if($('.box-row').length == $('.box-row:visible').length) {
            $('.btn-wrap').hide();
          }
        }

        hideEvents();
    })

    </script>
    </body>
</html>