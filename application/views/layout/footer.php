<footer>
  <div class="footer clearfix text-muted">
    <div class="float-start">
      <p>2022 &copy; SIPEDES</p>
    </div>
    <div class="float-end">
      <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by SIPEDES</a></p>
    </div>
  </div>
</footer>
</div>
</div>
<script src="<?= base_url(); ?>/assets/js/bootstrap.js"></script>
<script src="<?= base_url(); ?>/assets/js/app.js"></script>
<script src="<?= base_url(); ?>/assets/extensions/jquery/jquery.min.js"></script>
<script src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>
<script src="<?= base_url(); ?>/assets/js/pages/datatables.js"></script>

<script>
  window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function() {
      $(this).remove();
    });
  }, 3000);
</script>

</body>

</html>