 <div class="table-responsive">
     <table class="table table-bordered" id="getCategory" width="100%" cellspacing="0">
         <thead>
             <tr>
                 <th>Name</th>
                 <th>Description</th>
                 <th>Code</th>
                 <th>Action</th>
             </tr>
         </thead>
         <tbody>
             <?php 
                foreach ($data_category_products as $datas) : ?>
                 <tr>
                     <td><?= esc($datas['name']); ?></td>
                     <td><?= esc($datas['description']); ?></td>
                     <td><?= esc($datas['code']); ?></td>
                     <td class="text-center" width="20%">
                         <button class="btn btn-success btn-sm mb-1" onclick="edit('<?= $datas['id']; ?>')">
                            <i class="fas fa-pencil-alt"></i>
                         </button>

                         <button class="btn btn-danger btn-sm mb-1" onclick="deletes('<?= $datas['id']; ?>')">
                            <i class="fas fa-trash"></i>    
                         </button>
                     </td>
                 </tr>
             <?php endforeach; ?>
         </tbody>
     </table>
 </div>

 <script>
     $(document).ready(function() {
         $('#getCategory').DataTable();
     });

     edit = (id) => {
         $.ajax({
             type: "post",
             url: "<?= base_url('master/category_products/get_modal_edit'); ?>",
             data: {
                 id: id
             },
             dataType: "json",
             success: function(response) {
                 if (response.output) {
                     $('.view-modal').html(response.output).show();
                     $('#editModal').modal('show');
                 }
             },
             error: function(xhr, ajaxOptions, thrownError) {
                 alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
             }
         });
     }

     deletes = (id) => {
         Swal.fire({
             title: 'Are you sure?',
             text: `You won't be able to revert this!`,
             icon: 'question',
             showCancelButton: true,
             confirmButtonColor: '#d33',
             cancelButtonColor: '#3085d6',
             confirmButtonText: 'Yes, delete it!',
             cancelButtonText: 'Cancel'
         }).then((result) => {
             if (result.value) {
                 $.ajax({
                     type: "post",
                     url: "<?= base_url('master/category_products/delete_data'); ?>",
                     data: {
                         id: id
                     },
                     dataType: "json",
                     success: function(response) {
                         if (response.output) {
                             Swal.fire({
                                 icon: 'success',
                                 title: 'Deleted',
                                 text: response.output,
                             });
                             getCategory();
                         }
                     },
                     error: function(xhr, ajaxOptions, thrownError) {
                         alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                     }
                 });
             }
         });
     }
 </script>