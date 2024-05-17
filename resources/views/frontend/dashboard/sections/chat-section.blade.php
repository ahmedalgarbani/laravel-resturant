<div class="tab-pane fade" id="v-pills-settings" role="tabpanel"
     aria-labelledby="v-pills-settings-tab">
    <div class="fp_dashboard_body fp__change_password">
        <div class="fp__message">
            <h3>Message</h3>
            <div class="fp__chat_area">
                <div class="fp__chat_body">
                </div>
                <form class="fp__single_chat_bottom chat_input" action="" method="post">
                    @csrf
                    <label for="select_file"><i class="far fa-file-medical"
                                                aria-hidden="true"></i></label>
                    <input id="select_file" type="file" hidden="">
                    <input type="text" class="fp_send_message" placeholder="Type a message..." name="message">\
                    <input type="hidden" value="1" name="receiver_id">
                    <button class="fp__massage_btn"><i class="fas fa-paper-plane"
                                                       aria-hidden="true"></i></button>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $(document).ready(function (){
            var userId = "{{auth()->user()->id}}"
            function scrollbuttom(){
                let chatContent = $('.fp__chat_body')
                chatContent.scrollTop(chatContent.prop("scrollHeight"))
            }

            $('.fp_chat_message').on('click',function (){
                let senderId = 1
                $('#receiver_id').val(senderId)
                $.ajax({
                    method:'GET',
                    url:'{{route('chat.get-conversation',':senderId')}}'.replace(':senderId',senderId),
                    beforeSend:function (){

                    },
                    success:function (response){
                        $('.fp__chat_body').empty()
                        $.each(response,function (index,message){
                            // let avatar = "{{asset(':avatar')}}".replace(':avatar',message.sender.avatar)
                            let html =`
                             <div class="fp__chating ${message.sender_id == userId?'tf_chat_right':''}">
                        <div class="fp__chating_img">
                            <img src="images/service_provider.png" alt="person"
                                class="img-fluid w-100">
                        </div>
                        <div class="fp__chating_text ">
                            <p  class="${message.sender_id == userId?'bg-primary text-white':''}">${message.message}</p>
                            <span>sender...</span>
                        </div>
                    </div>
                            `
                            $('.fp__chat_body').append(html)
                        })
                        scrollbuttom()
                    },
                    error:function (){

                    }
                })


            })

            $('.chat_input').on('submit',function (e){
                e.preventDefault()
                let dataForm = $(this).serialize()

                $.ajax({
                    method:'POST',
                    url:'{{route('chat.send-message')}}',
                    data:dataForm,
                    beforeSend:function (){
                        let message = $('.fp_send_message').val()
                        let html = `
                         <div class="fp__chating tf_chat_right">
                        <div class="fp__chating_img">
                          <img src="{{asset(auth()->user()->avatar)}}" style="border-radius:50% " alt="person"
                                 class="img-fluid w-100">
                        </div>
                        <div class="fp__chating_text ">
                            <p  class="bg-primary text-white">${message}</p>
                            <span>sender...</span>
                        </div>
                    </div>
                    `
                        let test =`<div class="fp__chating chat-right">
                        <div class="fp__chating_img">
                            <img src="{{asset(auth()->user()->avatar)}}" style="border-radius:50% " alt="person"
                                 class="img-fluid w-100">
                        </div>
                        <div class="fp__chating_text">
                            <p class="${message.sender_id == userId?'bg-primary text-white':''}">${message}
                            </p>
                            <span>sender....</span>
                        </div>
                    </div>`
                        $('.fp__chat_body').append(html)

                        $('.fp_send_message').val('')

                    },
                    success:function (){

                    },
                    error:function (xhr,status,error){
                        let errorMessage = xhr.responseJSON.error
                    }
                })

            })
        })
    </script>

@endpush
