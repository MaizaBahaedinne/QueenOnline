


  <footer class="main-footer text-sm">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 1.0.0-Beta
    </div>
    <strong>Copyright © 2020- <a href="https://www.facebook.com/maiza.koussai">Maiza Bahaedinne</a>.</strong> All rights reserved.
  </footer>

  
<!-- ./wrapper -->

      <!-- jQuery -->
      <script src="<?php echo base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
      <!-- Bootstrap 4 -->
      <script src="<?php echo base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
      <!-- AdminLTE App -->
      <script src="<?php echo base_url() ?>assets/dist/js/adminlte.min.js"></script>
      <!-- AdminLTE for demo purposes -->
      <script src="<?php echo base_url() ?>assets/dist/js/demo.js"></script>

      <!-- SweetAlert2 -->
      <script src="<?php echo base_url() ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
      <!-- Toastr -->
      <script src="<?php echo base_url() ?>assets/plugins/toastr/toastr.min.js"></script>

      <script type="text/javascript">

                $(function() {
            var Toast = Swal.mixin({
              toast: true,
              position: 'top-end',
              showConfirmButton: false,
              timer: 3000
            });  
            
            $('.swalDefaultSuccess').click(function() {
            Toast.fire({
              icon: 'success',
              title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
            })
          });
      </script>
      <!-- DataTables -->
      <script src="<?php echo base_url() ?>assets/plugins/datatables/jquery.dataTables.js"></script>
      <script src="<?php echo base_url() ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
      <script src="<?php echo base_url() ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
      <script src="<?php echo base_url() ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
      <script type="text/javascript">
        $(function () {
          $('#table').DataTable(  {
          "language": {
              "sEmptyTable":     "Aucune donnée disponible dans le tableau",
              "sInfo":           "Affichage de l'élément _START_ à _END_ sur _TOTAL_ éléments",
              "sInfoEmpty":      "Affichage de l'élément 0 à 0 sur 0 élément",
              "sInfoFiltered":   "(filtré à partir de _MAX_ éléments au total)",
              "sInfoPostFix":    "",
              "sInfoThousands":  ",",
              "sLengthMenu":     "Afficher _MENU_ éléments",
              "sLoadingRecords": "Chargement...",
              "sProcessing":     "Traitement...",
              "sSearch":         "Rechercher :",
              "sZeroRecords":    "Aucun élément correspondant trouvé",
              "oPaginate": {
                  "sFirst":    "Premier",
                  "sLast":     "Dernier",
                  "sNext":     "Suivant",
                  "sPrevious": "Précédent"
              },
              "oAria": {
                  "sSortAscending":  ": activer pour trier la colonne par ordre croissant",
                  "sSortDescending": ": activer pour trier la colonne par ordre décroissant"
              },
              "select": {
                      "rows": {
                          "_": "%d lignes sélectionnées",
                          "0": "Aucune ligne sélectionnée",
                          "1": "1 ligne sélectionnée"
            } 
          }
        }
        } );
    } );
    
      </script>

<script  src="<?php echo base_url() ?>assets/plugins/chart.js/Chart.min.js"></script>




      <script type="text/javascript">
              var windowURL = window.location.href;
              pageURL = windowURL.substring(0, windowURL.lastIndexOf('/'));
              var x= $('a[href="'+pageURL+'"]');
                  x.addClass('active');
                  x.parent().addClass('active');
              var y= $('a[href="'+windowURL+'"]');
                  y.addClass('active');
                  y.parent().addClass('active');
      </script>



      <script src="<?php echo base_url() ?>assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- Page Script -->
<script>
  $(function () {
    //Add text editor
    $('#compose-textarea').summernote()
  })
</script>



  </body>
</html>