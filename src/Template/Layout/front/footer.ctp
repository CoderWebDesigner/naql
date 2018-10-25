  <footer class="container-fluid" >
        <strong > <p class="footerp" style=" line-height: 5;  font-size: 20px;   color: black;" 

                     class="about"><a  href="/">اتصل&nbsp;بنا</a> | <a  href="#" rel="nofollow">Advertise&nbsp;with&nbsp;us</a> | <a href="#" rel="nofollow">الاستخدام&nbsp;شروط</a> | <a href="#" rel="nofollow"> Medical-appoint.com</a> | <a href="#" rel="nofollow"> خريطة الموقع</a></p></strong>


        <div style="margin:0; padding:0;font-size: 18px;   word-spacing: 5px;    font-family: cursive;" class="col-xs-12">

            <div style=" float: right;width: 31.333333%;" class="col-xs-4">
                <img style="width:150px;height:28px;border:0;float: left;" src="images/logo.png" alt="مواعيد طبية"></div>
            <div style=" float: right;    width: 52.333333%;" class="col-xs-4">
                <strong style="    margin-right: -16px;"> |</strong>
                <strong>   
                    المعلومات الطبية المتواجدة بموقع مواعيد طبية هي بمقابة معلومات فقط ولا يجوز<br>
                    اعتبارها استشارة طبيةاو توصية  لانه يجب عليك استشارة الطبيب في حالة لم <br>
                    <strong>  تختفي الاعراض</strong>

                </strong>

            </div>

        </div>
    </footer>


    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script>
                                    $(document).ready(function () {
                                        $("div.bhoechie-tab-menu>div.list-group>a").click(function (e) {
                                            e.preventDefault();
                                            $(this).siblings('a.active').removeClass("active");
                                            $(this).addClass("active");
                                            var index = $(this).index();
                                            $("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
                                            $("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).addClass("active");
                                        });
                                    });
    </script>

    <script type="text/javascript" src="js/js/jquery.smartTab.js"></script>
    <script type="text/javascript" src="js/js/myjq.js"></script>
    <script type="text/javascript" src="js/js/myjq-left.js"></script>
    <script type="text/javascript">
                                    $(document).ready(function () {
                                        // Smart Tab
                                        $('#tabs').smartTab({autoProgress: false, stopOnFocus: true, transitionEffect: 'vSlide'});
                                    });
    </script>


</body>
</html>
