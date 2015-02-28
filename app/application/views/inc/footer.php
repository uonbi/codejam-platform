
<img class="sponsors" src="<?php echo base_url(); ?>assets/img/sponsors.gif"></img>
</div>
<div class="footer">
	&copy; 2015 <a href="http://sci.uonbi.ac.ke/" target="_blank">School of Computing &amp; Informatics</a>, <a href="http://www.uonbi.ac.ke/" target="_blank">University of Nairobi</a> &bull; Engineered with <i class="fa fa-heart"></i> by 
	<a href="http://github.com/uonbi" target="_blank">Nerds @ SCI</a>.
</div>



    <script src="<?php echo base_url();?>assets/js/jquery-2.1.1.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
    <?php if(isset($date_picker)):?>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.js"></script>

    <script>
      $('.date-picker').datepicker(
        {
          format:'yyyy-mm-dd'
        }
      );
    </script>
    
	<?php endif; ?>
    <script src="<?php echo base_url(); ?>assets/js/main.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="<?php echo base_url(); ?>assets/js/ie10-viewport-bug-workaround.js"></script>

    <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-60087022-1', 'auto');
  ga('send', 'pageview');

</script>
  </body>
</html>