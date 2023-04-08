<?php
if (!empty($_POST)) {
    $fullname = getPost('fullname');
    $email = getPost('email');
    $phone_number = getPost('phone');
	$subject_name = getPost('subject_name');
    $note = getPost('note');

    $created_at = $updated_at = date('Y-m-d H:i:s');

    $sql = "insert into feedback(fullname, email, phone_number, subject_name, note, status, created_at, updated_at) values('$fullname', '$email', '$phone_number', '$subject_name', '$note', 0, '$created_at', '$updated_at')";
	execute($sql);
}

?>
<section class="bg-img1 txt-center p-lr-15 p-tb-92 mt-[100px]" style="background-image: url('public/images/bg-01.jpg');">
    <h2 class="ltext-105 cl0 txt-center">
        Contact
    </h2>
</section>


<!-- Content page -->
<section class="bg0 p-t-104 p-b-50">
    <div class="container">
        <div class="flex-w flex-tr">
            <div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
                <form method="post">
                    <h4 class="mtext-105 cl2 txt-center p-b-30">
                        Send Us A Message
                    </h4>

                    <div class="bor8 m-b-20 how-pos4-parent">
                        <input class="stext-111 cl2 plh3 size-116 p-l-12 p-r-30" type="text" name="fullname" placeholder="Nhập tên của bạn">
                    </div>
                    <div class="bor8 m-b-20 how-pos4-parent">
                        <input class="stext-111 cl2 plh3 size-116 p-l-12 p-r-30" type="text" name="email" placeholder="Email">
                    </div>
                    <div class="bor8 m-b-20 how-pos4-parent">
                        <input class="stext-111 cl2 plh3 size-116 p-l-12 p-r-30" type="text" name="phone" placeholder="Số điện thoại">
                    </div>
                    <div class="bor8 m-b-20 how-pos4-parent">
                        <input class="stext-111 cl2 plh3 size-116 p-l-12 p-r-30" type="text" name="subject_name" placeholder="Chủ đề">
                    </div>

                    <div class="bor8 m-b-30">
                        <textarea class="stext-111 cl2 plh3 size-120 p-lr-28 p-tb-25" name="note" placeholder="Chúng tôi có thể giúp gì cho bạn ?"></textarea>
                    </div>

                    <button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
                        Submit
                    </button>
                </form>
            </div>

            <div class="size-210 bor10 flex-w p-lr-93 p-tb-30 p-lr-15-lg w-full-md">
                <div class="flex-w w-full mt-[100px]">
                    <span class="fs-18 cl5 txt-center size-211">
                        <span class="lnr lnr-map-marker"></span>
                    </span>

                    <div class="size-212 p-t-2">
                        <span class="mtext-110 cl2">
                            Address
                        </span>

                        <p class="stext-115 cl6 size-213 p-t-18">
                            Trinh Van Bo - Ha noi
                        </p>
                    </div>
                </div>

                <div class="flex-w w-full">
                    <span class="fs-18 cl5 txt-center size-211">
                        <span class="lnr lnr-phone-handset"></span>
                    </span>

                    <div class="size-212 p-t-2">
                        <span class="mtext-110 cl2">
                            Lets Talk
                        </span>

                        <p class="stext-115 cl1 size-213 p-t-18">
                            +84 99999999
                        </p>
                    </div>
                </div>

                <div class="flex-w w-full">
                    <span class="fs-18 cl5 txt-center size-211">
                        <span class="lnr lnr-envelope"></span>
                    </span>

                    <div class="size-212 p-t-2">
                        <span class="mtext-110 cl2">
                            Sale Support
                        </span>

                        <p class="stext-115 cl1 size-213 p-t-18">
                            tuanlaph19427@fpt.edu.vn
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Map -->
<div class="w-full">
<iframe class="mb-2" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13630.438176665219!2d105.74701270149235!3d21.029386308480973!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313454b991d80fd5%3A0x53cefc99d6b0bf6f!2zVHLGsOG7nW5nIENhbyDEkeG6s25nIEZQVCBQb2x5dGVjaG5pYw!5e0!3m2!1svi!2s!4v1680760881902!5m2!1svi!2s" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>



<!-- Footer -->