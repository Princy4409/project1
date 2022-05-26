<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<style>  
body {  
    background-image: url("https://www.travelleisuretips.com/wp-content/uploads/2019/11/taxi-1.jpg");
    height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 10px;
  /* background: linear-gradient(135deg, #71b7e6, #9b59b6); */
} 
input{
    border-radius: 4px;
    width:250px;
    height:50px;
    border: none;
    border-bottom: 2px solid red;

}
h1 {  
    color: red;  
    margin-left: 80px;  
}   
</style>  
<form>
    <input type="textbox" name="name" id="name" placeholder="Enter your name"/><br/><br/>
    <input type="textbox" name="amt" id="amt" placeholder="Enter amtount"/><br/><br/>
    <input type="button" name="btn" id="btn" value="Pay Now" onclick="pay_now()"/>
</form>

<script>
    function pay_now(){
        var name=jQuery('#name').val();
        var amt=jQuery('#amt').val();
        
         jQuery.ajax({
               type:'post',
               url:'payment_process.php',
               data:"amt="+amt+"&name="+name,
               success:function(result){
                   var options = {
                        "key": "rzp_test_bvh90XHl7CKu46", 
                        "amount": amt*100, 
                        "currency": "INR",
                        "name": "Acme Corp",
                        "description": "Test Transaction",
                        "image": "https://image.freepik.com/free-vector/logo-sample-text_355-558.jpg",
                        "handler": function (response){
                           jQuery.ajax({
                               type:'post',
                               url:'payment_process.php',
                               data:"payment_id="+response.razorpay_payment_id,
                               success:function(result){
                                   window.location.href="../../?p=booking_list";
                               }
                           });
                        }
                    };
                    var rzp1 = new Razorpay(options);
                    rzp1.open();
               }
           });
        
        
    }
</script>