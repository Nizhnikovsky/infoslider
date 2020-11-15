<div class="slim_modal" id="examplePlain">
    <div class="sm_content">
        <div class="sm_icon_menu">
            <ul>
                <li class="sm_close"><i class="fa fa-times fa-fw "></i></li>
            </ul>
        </div>
        <div class="sm_content_inner_wrap">
            <div class="sm_area_bottom">
                <h3>Форма обратной связи</h3>
                <form class="vanilla vanilla-form" novalidate="novalidate" id="myModalForm">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-field">
                                <label>
                                    <input class="modal-form" type="text" name="name" placeholder="Your name" id="modalName" required>
                                </label>
                            </div>
                            <!--/.form-field -->
                        </div>
                        <!--/column -->
                        <div class="col-sm-12">
                            <div class="form-field">
                                <label>
                                    <input class="modal-form" type="email" name="email" placeholder="Your e-mail" id="modalEmail" required>
                                </label>
                            </div>
                            <!--/.form-field -->
                        </div>
                        <!--/column -->
                        <div class="col-sm-12">
                            <div class="form-field">
                                <label>
                                    <input class="modal-form" type="tel" name="phone" placeholder="Phone" id="modalPhone" required>
                                </label>
                            </div>
                            <!--/.form-field -->
                        </div>
                        <!--/column -->
                    </div>
                    <!--/.row -->
                    <div class="message-field">
                        <textarea class="modal-form" name="message" placeholder="Type your message here..." id="modalMessage" required></textarea>
                    </div>
                </form>
                <footer class="notification-box" >
                    <div class="alert" id="alertMessage" hidden style="font-weight: bolder;font-style: oblique">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                    </div>
                </footer>
            </div>
            <input type="button" class="btn" value="Send" id="modalButton">
        </div>
    </div>
</div>
