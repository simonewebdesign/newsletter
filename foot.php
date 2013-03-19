
<script>
var deleteAnchors = document.querySelectorAll(".delete");
var sendAnchors = document.querySelectorAll(".send");
var i = 0;

for (i = 0; i < deleteAnchors.length; i++) {

  deleteAnchors[i].addEventListener('click', function(ev) {
  
    if ( !confirm('Sei sicuro/a di voler cancellare?') ) {
      ev.preventDefault();
    }
  });
}

for (i = 0; i < sendAnchors.length; i++) {

  sendAnchors[i].addEventListener('click', function(ev) {
  
    if ( !confirm('Sei sicuro/a di voler inviare la newsletter?') ) {
      ev.preventDefault();
    }
  });
}
</script>

<footer>
  <small>Copyright &copy; 2012 - <?=date('Y') ." ". $cfg['site_name']?>. All rights reserved.</small>
</footer>

</body>
</html>