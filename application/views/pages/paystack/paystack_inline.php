<?php
/**
 * Created By Trimmytech
 * Fiverr Handle : @trimmytech
 * Date: 4/14/2018
 * Time: 9:29 PM
 */
?>
<!DOCTYPE html>
<html>
<head>
    <title>Pay for Pay My Bill - Paystack</title>

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>front/css/bootstrap/bootstrap.min.css">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>back/assets/css/style.css">
    <!--font awesome css-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--font css-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>front/css/fonts.css">
    <style>
        ul > li{margin-right:25px;font-weight:lighter;cursor:pointer}
        li.active{border-bottom:3px solid silver;}

        .item-photo{display:flex;justify-content:center;align-items:center;border-right:1px solid #f6f6f6;}
        .menu-items{list-style-type:none;font-size:11px;display:inline-flex;margin-bottom:0;margin-top:20px}
        .btn-success{width:100%;border-radius:0;}
        .section{width:100%;margin-left:-15px;padding:2px;padding-left:15px;padding-right:15px;background:#f8f9f9}
        .title-price{margin-top:30px;margin-bottom:0;color:black}
        .title-attr{margin-top:0;margin-bottom:0;color:black;}
        .btn-minus{cursor:pointer;font-size:7px;display:flex;align-items:center;padding:5px;padding-left:10px;padding-right:10px;border:1px solid gray;border-radius:2px;border-right:0;}
        .btn-plus{cursor:pointer;font-size:7px;display:flex;align-items:center;padding:5px;padding-left:10px;padding-right:10px;border:1px solid gray;border-radius:2px;border-left:0;}
        div.section > div {width:100%;display:inline-flex;}
        div.section > div > input {margin:0;padding-left:5px;font-size:10px;padding-right:5px;max-width:18%;text-align:center;}
        .attr,.attr2{cursor:pointer;margin-right:5px;height:20px;font-size:10px;padding:2px;border:1px solid gray;border-radius:2px;}
        .attr.active,.attr2.active{ border:1px solid orange;}

        @media (max-width: 426px) {
            .container {margin-top:0px !important;}
            .container > .row{padding:0 !important;}
            .container > .row > .col-xs-12.col-sm-5{
                padding-right:0 ;
            }
            .container > .row > .col-xs-12.col-sm-9 > div > p{
                padding-left:0 !important;
                padding-right:0 !important;
            }
            .container > .row > .col-xs-12.col-sm-9 > div > ul{
                padding-left:10px !important;

            }
            .section{width:104%;}
            .menu-items{padding-left:0;}
        }
    </style>
</head>
<body>
    <div class="container" style="max-width: 500px; text-align: center; margin-top: 100px">
        <div class="card divcenter" style="text-align: center">
            <div class="card-header py-3">
                <!-- Datos del vendedor y titulo del producto -->
                <div style="padding-bottom:30px;">
                    <i class="fa fa-align-left" style="font-size:48px;color:blue"></i>
                </div>
                <div style="padding-bottom:30px;">
                    <h2 class="font-body">Pay My Bill</h2>
                </div>
                <div style="padding-bottom:20px;">
                    <h4 class="wp-caption">BY PAY MY BILLS CLUB</h4>
                </div>
                
            </div>
            <div class="card-body py-3">
               <!-- Precios -->
                <div style="padding-bottom:20px;"><h5 class="title-price"><strong>Offer Price(&#8358)*</strong></h5></div>
                <div class="entry-meta" style="padding-bottom:20px;"><h3><strong>N</strong><?php echo $amount;?></h3></div>
            </div>
            <!-- <div class="card-footer py-5"> -->
            <div class="card-footer py-5">
                <?php echo form_open();?>
                <button type="button" onclick="payWithPaystack()" class="btn btn-success"><span style="margin-right:20px" class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Pay Now</button>
                        <!-- Pay With Paystack  -->
                <script>
                    function payWithPaystack(){
                        var handler = PaystackPop.setup({
                            key: <?php echo $key;?>,
                            name: '<?php echo $name;?>',
                            email: '<?php echo $email;?>',
                            phone: '<?php echo $phone;?>',
                            amount: <?php echo intval($amount);?> * 100,
                            ref: ''+Math.floor((Math.random() * 1000000000) + 1),
                            callback: function(response){
                                //alert('success. transaction ref is ' + response.reference);
                                window.location.replace("https://paystack.com/pay/zk9bqahifm"+response.reference);
                                // window.location.replace("<?php echo base_url().'paystack/verify_payment/'; ?>"+response.reference);
                            },
                            // onClose: function(){
                            //     alert('Window Closed. Payment Cancelled !!!!');
                            // }
                        });
                        handler.openIframe();
                    }
                </script>
            </div>
        </div>
    </div>
    <footer>
        <script src="<?php echo base_url('front/js/jquery-3.4.1.min.js');?>"></script>
        <script src="<?php echo base_url('front/js/bootstrap/bootstrap.min.js');?>"></script>
        <script src="https://js.paystack.co/v1/inline.js"></script>
        <script>
            $(document).ready(function(){
                //-- Click on detail
                $("ul.menu-items > li").on("click",function(){
                    $("ul.menu-items > li").removeClass("active");
                    $(this).addClass("active");
                })

                $(".attr,.attr2").on("click",function(){
                    var clase = $(this).attr("class");

                    $("." + clase).removeClass("active");
                    $(this).addClass("active");
                })

            })
        </script>
    </footer>
</body>
</html>



