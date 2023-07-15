
$( document ).ready(function() {
    $('.datepicker-input').datepicker();
});
/** show data on popup-modal third party credentials */
$(".meta-value").on('click',function(){
    var meta = $(this).attr('data-value')
    $(".meta-data").remove();
    var strs = "<p class='meta-data' style='word-break: break-all;'>"+ meta +"</p>";
    $(".modal-body").append(strs)
    $("#metaValueModal").modal('show')
});

/** read notification */
$(".read-notification").on('click',function(){
    var id = $(this).data('id')
    $("#noti-id").val(id);
    $("#read-noti-form").submit();
});

/** submit data list search form */
$( ".selected-data-form" ).change(function() {
    var value = $(this).val();
    var identifier = $(this).attr('data-selected');
    $(".record-search-form-selected").val(identifier);
    $(".record-search-form-value").val(value);
    $("#search-data-form").submit();
});

/** view api secret */
$("#api_secret").on('click',function(){
    var api = $("#apiSecret").val();
    alert(api);
});

/** change user role using ajax */
$(".edit-role").on('change',function(e){
    e.preventDefault();
    var user = $(this).attr('data-user')
    var form = "update-role-" + user;
    $("#update-role-"+user).submit()
});

/** highlight current day on calendar */
$( document ).ready(function() {
    var aajaDate = new Date();
    var startDay = aajaDate.setUTCHours(0,0,0,0);
    var attr = "[data-date="+  startDay +"]";
    $(attr).addClass('active');
});

/** display add integration modal */
$(".add-integration").on("click",function(e){
    e.preventDefault();
    $("#addIntegration").modal("show")
});



/** display add user modal */
$(".add-user").on("click",function(e){
    e.preventDefault();
    $("#adduser").modal("show")
});

/** display add whats where modal */
$(".add-whats-where").on("click",function(e){
    e.preventDefault();
    $("#addwhatswhere").modal("show")
});

/** display add shopping modal */
$(".add-shopping").on("click",function(e){
    e.preventDefault();
    $("#addShopping").modal("show")
});

/** display add shopping modal */
$(".add-subscription").on("click",function(e){
    e.preventDefault();
    $("#addSubscription").modal("show")
});

/** read notification  */
$(".read-notification").on('click',function(e){
    e.preventDefault();
    var id = $(this).attr('data-id');
    $('#notificationID').val(id);
    $("#read-notification-form").submit();
})

/** delete subscriptions */
$(".delete-subs-btn").on('click',function(e){
    e.preventDefault();
    var id = $(this).attr('data-id');
    $('#subsID').val(id);
    $("#delete-subscription").submit();
})

$(".add-renewal").on('click',function(e){
    e.preventDefault();
    var id = $(this).attr('data-id');
    $("#addRenewal").modal("show")
    $('#renewal-id').val(id);
});

