<style media="screen">
  .profile-content{
    width:800px;
    margin:0 auto;
  }

    #img_preview{
      width: 200px;
      height: auto;
    }
  </style>

<div class="profile-content">
    <div class="row">
        <div class="col-md-12">
            <div class="portlet light" style="margin-top: 50px;">
                <div class="portlet-title tabbable-line">
                    <div class="caption caption-md">
                        <i class="icon-globe theme-font hide"></i>
                        <span class="caption-subject font-blue-madison bold uppercase">Profile Booking</span>
                    </div>
                </div>
                <form id="formbookingdetail" class="" action="<?php echo $action?>" method="post" enctype="multipart/form-data">
                  <div class="portlet-body">
                    <div class="tab-content">
                        <!-- PERSONAL INFO TAB -->
                      <div class="form-group">
                          <label class="control-label">Nama</label>
                          <input type="text" placeholder="" class="form-control" value="<?php echo $customer->customer_name?>" readonly/>
                          <input type="hidden" name="customer_id" value="<?php echo $customer->customer_id?>"/>
                      </div>
                      <div class="form-group">
                          <label class="control-label">Email</label>
                          <input type="email" placeholder="" class="form-control" value="<?php echo $customer->customer_email?>" readonly/>
                      </div>
                      <div class="form-group">
                          <label class="control-label">Alamat</label>
                          <input type="text" placeholder="" class="form-control" value="<?php echo $customer->customer_address?>" readonly/>
                      </div>
                      <div class="form-group">
                          <label class="control-label">GOR</label>
                          <input type="text"
                          class="form-control" value="<?php echo $customer->branch_id?>" readonly/>
                      </div>
                      <div class="form-group">
                          <label class="control-label">Lapangan</label>
                          <input type="text" class="form-control" value="<?php echo $customer->building_name?>" readonly/>
                      </div>
                      <div class="form-group">
                          <label class="control-label">Tanggal</label>
                          <input type="text" class="form-control" value="<?php echo $customer->building_booking_date_for?>" readonly/>
                      </div>
                      <div class="form-group">
                        <label for="">Jam Booking</label>
                        <div class="row">
                          <div class="col-md-6">
                            <input type="text" class="form-control" value="<?php echo $customer->building_booking_time_1?>.00" readonly/>
                          </div>
                          <div class="col-md-6">
                            <input type="text" class="form-control" value="<?php echo $customer->building_booking_time_2?>.00" readonly/>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="">Upload Image Bukti Pembayaran</label>
                        <br>
                        <?php $img = isset($building_details->building_img ) ? $building_details->building_img : "img_not_found.png";?>
                        <img name="i_img" src="<?php echo base_url('assets/img/buildings/'.$img)?>" alt="" id="img_preview">
                        <input type="file" id="i_img" name="i_img" value="" onchange="readURL(this);">
                      </div>
                      <div class="modal-footer">
                        <div class="margin-top-10">
                            <button type="submit" class="btn green"> Submit </button>
                            <button type="button" class="btn default" onclick="cancelform()"> Cancel </button>
                        </div>
                      </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#img_preview').empty();
            $('#img_preview').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("#formbookingdetail").submit(function(e) {
var formData = new FormData($(this)[0]);
  data.append('file', file);
    $.ajax({
           type: "POST",
           url: "<?php echo base_url()?>Booking-detail/savebuktipembayaran",
           data: formData, // serializes the form's elements.
           dataType:"json",
           enctype: 'multipart/form-data',
           contentType: false,
           processData: false,
           success: function(data)
           {
               alert("Bukti Pembayaran Telah Disimpan"); // show response from the php script.
              //  window.close();
           }
         });

    e.preventDefault(); // avoid to execute the actual submit of the form.
});

function cancelform()
{
  close();
}

</script>
