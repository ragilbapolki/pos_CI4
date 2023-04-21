<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-edit"></i> Edit Products</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('master/products/update_data', ['class' => 'form-edit']); ?>
            <?= csrf_field(); ?>
            <input type="hidden" name="id" value="<?= $records['id']; ?>">
            <div class="modal-body">
                <div class="form-group row">
                    <label for="barcode" class="col-sm-2 col-form-label">Barcode</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="barcode" name="barcode" value="<?= $records['barcode']; ?>" placeholder="type barcode here" title="Input Barcode">
                        <div class="invalid-feedback errorBarcode">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" name="name" placeholder="type name here" value="<?= $records['name']; ?>" title="Input Name">
                        <div class="invalid-feedback errorname">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="description" class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
                        <textarea name="description" id="description" cols="80" rows="2" class="form-control"  placeholder="type description here" title="Input Description"><?= $records['description']; ?></textarea>
                        <div class="invalid-feedback errordescription">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="price" class="col-sm-2 col-form-label">Price</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="price" name="price" readonly placeholder="type price here" value="<?= number_format($records['price']); ?>" title="Input Price">
                        <div class="invalid-feedback errorprice">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="stock" class="col-sm-2 col-form-label">Stock</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="stock" name="stock" readonly placeholder="type stock here" value="<?= $records['stock']; ?>" title="Input Stock">
                        <div class="invalid-feedback errorstock">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="category" class="col-sm-2 col-form-label">Category</label>
                    <div class="col-sm-10">
                        <select class="form-control select2" name="category" id="category" title="Select Category">
                            <?php foreach($data_category_products as $data_category){ ?>
                                <option value="<?php echo $data_category['id']; ?>"><?php echo $data_category['name']; ?></option>';
                            <?php } ?>
                        </select>
                        <div class="invalid-feedback errorcategory">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="unit" class="col-sm-2 col-form-label">Unit</label>
                    <div class="col-sm-10">
                        <select class="form-control select2" name="unit" id="unit" title="Select Unit">
                            <?php foreach($data_unit as $data_unit){ ?>
                                <option value="<?php echo $data_unit['id']; ?>"><?php echo $data_unit['name']; ?></option>';
                            <?php } ?>
                        </select>
                        <div class="invalid-feedback errorunit">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary btn-sm btn-update">Update</button>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        var val_category = <?= $records['category_id']; ?>;
        var val_unit     = <?= $records['unit_id']; ?>;
        $("#price").keyup(function(){
            val = $(this).val()
            $(this).val(number_separator(val))
        })
        $("#unit").select2({
            placeholder: 'Select Item',
            width: '100%'
        }).val(val_unit).trigger('change');
        $("#category").select2({
            placeholder: 'Select Item',
            width: '100%'
        }).val(val_category).trigger('change');
        $('.form-edit').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "post",
                url: $(this).attr('action'),
                data: $(this).serialize(),
                dataType: "json",
                beforeSend: function() {
                    $('.btn-update').attr('disable', 'disabled');
                    $('.btn-update').html('<i class="fas fa-spin fa-spinner"></i>');
                },
                complete: function() {
                    $('.btn-update').removeAttr('disable');
                    $('.btn-update').html('Update');
                },
                success: function(response) {
                    if (response.error) {
                        toastr.error('Please check your inputs')
                        $.each(response.error, function(key, value ) {
                            if (value) {
                                $('#'+key).addClass('is-invalid');
                                $('.error'+key).html(value);
                            } else {
                                $('#'+key).removeClass('is-invalid');
                                $('#'+key).html('');
                            }
                            if (response.error.select_unit) {
                                $('#unit + span').addClass('is-invalid');
                                $('.errorunit').html(response.error.select_unit);
                            } else {
                                $('#unit + span').removeClass('is-invalid');
                                $('.errorunit').html('');
                            }
                            if (response.error.select_category) {
                                $('#category + span').addClass('is-invalid');
                                $('.errorcategory').html(response.error.select_category);
                            } else {
                                $('#category + span').removeClass('is-invalid');
                                $('.errorcategory').html('');
                            }
                        });
                    } else {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: response.success,
                            showConfirmButton: false,
                            timer: 1800
                        })

                        $('#editModal').modal('hide');
                        getProducts();
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            });
            return false;
        });
    });
</script>